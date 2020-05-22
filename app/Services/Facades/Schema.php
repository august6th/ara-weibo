<?php

namespace App\Services\Facades;

use App\Services\Database\Blueprint;
use Illuminate\Database\Connection;
use Illuminate\Database\Schema\Builder;

class Schema extends \Illuminate\Support\Facades\Schema
{
    /**
     * Get a schema builder instance for a connection.
     *
     * @param  string|null  $name
     * @return \Illuminate\Database\Schema\Builder
     */
    public static function connection($name)
    {
        /**
         * @var $builder Builder
         * @var $connection Connection
         */
        $connection = static::$app['db']->connection($name);
        $builder = $connection->getSchemaBuilder();
        $builder->blueprintResolver(function($table, $callback) {
            return new Blueprint($table, $callback);
        });

        return $builder;
    }

    /**
     * Get a schema builder instance for the default connection.
     *
     * @return \Illuminate\Database\Schema\Builder
     */
    protected static function getFacadeAccessor()
    {
        /**
         * @var $builder Builder
         * @var $connection Connection
         */
        $connection = static::$app['db']->connection();
        $builder = $connection->getSchemaBuilder();
        $builder->blueprintResolver(function($table, $callback) {
            return new Blueprint($table, $callback);
        });

        return $builder;
    }
}
