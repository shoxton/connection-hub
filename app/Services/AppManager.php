<?php

namespace App\Services;

use App\Services\Apps\Ecommerce\TrayApp;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Manager;
use InvalidArgumentException;

class AppManager extends Manager implements AppManagerInterface {

    public function getEnabledApps() {
        return [
            TrayApp::IDENTIFIER
        ];
    }

    /**
     * Get a driver instance.
     *
     * @param  string  $driver
     * @return mixed
     */
    public function with($driver)
    {
        return $this->driver($driver);
    }

    /**
     * Create an instance of the specified driver.
     *
     * @return \App\Services\Apps\AbstractApp
     */
    protected function createTrayDriver()
    {
        $config = $this->config->get('services.apps.tray');

        return $this->buildConnection(
            TrayApp::class, $config
        );
    }

    /**
     * Build an OAuth 2 provider instance.
     *
     * @param  string  $provider
     * @param  array  $config
     * @return \App\Services\Apps\AbstractApp
     */
    public function buildConnection($driver, $config)
    {
        return new $driver(
            $this->container->make('request'), $config['client_id'],
            $config['client_secret'], $this->formatRedirectUrl($config),
            Arr::get($config, 'guzzle', [])
        );
    }

    /**
     * Format the callback URL, resolving a relative URI if needed.
     *
     * @param  array  $config
     * @return string
     */
    protected function formatRedirectUrl(array $config)
    {
        $redirect = value($config['redirect']);

        return Str::startsWith($redirect, '/')
                    ? $this->container->make('url')->to($redirect)
                    : $redirect;
    }

    /**
     * Get the default driver name.
     *
     * @return string
     *
     * @throws \InvalidArgumentException
     */
    public function getDefaultDriver()
    {
        throw new InvalidArgumentException('No driver was specified.');
    }


}
