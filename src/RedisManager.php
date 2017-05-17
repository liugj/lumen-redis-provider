<?php

namespace Liugj\Providers;

use Illuminate\Redis\RedisManager as Manager;

class RedisManager extends Manager
{
    /**
     * Create a new Redis manager instance.
     *
     * @param string $driver
     * @param array  $config
     */
    public function __construct($driver, array $config)
    {
        parent :: __construct($driver, $config);
    }

    /**
     * Get a Redis connection by name.
     *
     * @param string $name
     *
     * @return \Illuminate\Redis\Connections\Connection
     */
    public function connection($name = null)
    {
        $name = $name ?: 'default';

        if (isset($this->connections[$name])) {
            return $this->connections[$name];
        }

        $connection = $this->resolve($name);

        try {
            $connection->ping();
        } catch (\Predis\Connection\ConnectionException $e) {
            \Log :: error($e->getMessage());
            $connection = new Cache\RedisNullStore();
        }

        return $this->connections[$name] = $connection;
    }
}
