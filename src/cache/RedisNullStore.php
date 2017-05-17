<?php

namespace Liugj\Providers\Cache;

use Illuminate\Cache\NullStore;

class RedisNullStore extends NullStore
{
    /**
     * __call.
     *
     * @param mixed $method
     * @param mixed $parameters
     *
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        if (in_array($method, ['mget', 'smembers'])) {
            return [];
        }
    }
}
