<?php

namespace App\Services\Apps;

interface AppInterface {

    /**
     * Redirect the user to the authentication page for the provider.
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function redirect();

    public function getAuthValidationRules();
}
