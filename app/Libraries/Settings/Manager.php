<?php

namespace App\Libraries\Settings;

use PDO;
use Psr\SimpleCache\CacheInterface;

class Manager
{
    private $pdo;
    private $config;
    private $cache;

    public function __construct(array $config = [], CacheInterface $cache, PDO $pdo)
    {
        $this->pdo = $pdo;
        $this->cache = $cache;
        $this->config = new SettingsRepository($config);
    }

    public function get($key, $default = null)
    {
        $data = $this->all();

        return array_key_exists($key, $data) ? $data[$key] : $default;
    }

    public function all()
    {
        $settings = $this->cache->get($this->cacheKey(), null);
        if (is_null($settings))
        {
            $settings = $this->loadSettings();
        }

        return $settings;
    }

    private function loadSettings()
    {
        $tableName = $this->config->get('database.table');

        $data = $this->pdo->query("SELECT * FROM {{$tableName}}")->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }

    private function cacheKey()
    {
        return implode('_', [$this->config->get('cache.prefix'), $this->config->get('cache.key')]);
    }
}
