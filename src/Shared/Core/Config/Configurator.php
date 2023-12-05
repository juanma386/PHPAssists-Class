<?php

namespace PHPAssists\Shared;

class Configurator
{
    private static array $config = [];

    public static function setConfig(array $configData)
    {
        self::$config = array_merge(self::$config, $configData);
    }

    public static function getConfig()
    {
        return self::$config;
    }

    public static function clearConfig()
    {
        self::$config = [];
    }
}
