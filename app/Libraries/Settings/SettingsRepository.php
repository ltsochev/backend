<?php

namespace App\Libraries\Settings;

class SettingsRepository
{
    private $userSettings = [];

    public function __construct(array $config = [])
    {
        $this->userSettings = $this->parseSettings($config);
    }

    public function get($key)
    {

    }

    private function parseSettings(array $config)
    {
        $output = [];

        foreach ($config as $key => $value)
        {
            $keys = explode('.', $key);

            if (count($keys) == 1)
            {
                $output[$key] = $value;
            }
        }

        dd($output);
    }
}
