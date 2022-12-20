<?php

namespace App\Services;

interface AppManagerInterface
{
    /**
     * Get an OAuth provider implementation.
     *
     * @param  string  $driver
     * @return \App\Services\Apps\AppInterface
     */
    public function driver($driver = null);

    public function getEnabledApps();
}
