<?php

namespace App\Services\Apps\Ecommerce;

use App\Services\Apps\AbstractApp;
use App\Services\Apps\Ecommerce\EcommerceAppInterface;
use App\Services\Apps\AppInterface;
use App\Services\Apps\User;
use GuzzleHttp\RequestOptions;
use Illuminate\Support\Arr;

class TrayApp extends AbstractApp implements AppInterface {

    /**
     * Unique Provider Identifier.
     */
    public const IDENTIFIER = 'TRAY';

    protected function getUserByToken($token) {

        $response = $this->getHttpClient()->post($this->trayUrl('/web_api/users'), [
            RequestOptions::QUERY => ['access_token' => $token]
        ]);

        return json_decode($response->getBody(), true);
    }

    /**
     * {@inheritdoc}
     */
    protected function mapUserToObject(array $user)
    {
        return (new User)->setRaw($user)->map([
            'id' => $user['id'],
            'nickname' => $user['username'],
            'name' => $user['name'],
            'email' => $user['email'],
            'avatar' => $user['avatar_url'],
        ]);
    }

    private function getAdmUser() {
        return $this->request->input('adm_user');
    }

    /**
     * Work out the tray domain based on either the
     * `store url` config setting or the current request.
     *
     * @param string $uri URI to append to the domain
     *
     * @return string The fully qualified url
     */
    private function trayUrl($uri = null)
    {
        if (!empty($this->parameters['url'])) {
            return $this->parameters['url'] . $uri;
        }

        return $this->request->get('url') . $uri;
    }

    /**
     * {@inheritdoc}
     */
    protected function getAuthUrl($state)
    {
        return $this->buildAuthUrlFromBase($this->trayUrl('/auth.php'), $state);
    }

    /**
     * {@inheritdoc}
     */
    protected function getTokenUrl()
    {
        return $this->trayUrl('/web_api/auth');
    }

    /** {@inheritDoc}
     *
    */
    protected function getTokenFields($code)
    {
        return array_merge(parent::getTokenFields($code), [
            'consumer_key' => $this->clientId,
            'consumer_secret' => $this->clientSecret
        ]);
    }

    /** {@inheritDoc}
     *
    */
    protected function getCodeFields($state = null)
    {
        return array_merge(parent::getCodeFields($state), [
            'consumer_key' => $this->clientId,
            'callback' => $this->redirectUrl
        ]);
    }

    /** {@inheritDoc}
     *
    */
    public function getAuthValidationRules()
    {
        return [
            'url' => ['required']
        ];
    }

    /** {@inheritDoc}
     *
    */
    protected function parseExpiresIn($body)
    {
        return Arr::get($body, 'date_expiration_access_token');
    }
}
