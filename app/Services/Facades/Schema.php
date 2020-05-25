<?php

namespace App\Services\Facades;

use App\Services\Database\Schema\Blueprint;
use Illuminate\Database\Connection;
use Illuminate\Database\MySqlConnection;
use Illuminate\Database\Schema\Builder;
use App\Services\Database\Schema\Grammars\MySqlGrammar;

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
        $connection = static::$app['db']->connection($name);

        return static::customBuild($connection);
    }

    /**
     * Get a schema builder instance for the default connection.
     *
     * @return Builder
     */
    protected static function getFacadeAccessor()
    {
        $connection = static::$app['db']->connection();

        return static::customBuild($connection);
    }

    /**
     * 自定义返回构建器
     * @author heng.li 2020/5/25
     * @param Connection $connection
     * @return Builder
     */
    protected static function customBuild(Connection $connection)
    {
        if ($connection instanceof MySqlConnection) {
            $grammar = $connection->withTablePrefix(new MySqlGrammar);
            $connection->setSchemaGrammar($grammar);
        }
        $builder = $connection->getSchemaBuilder();
        $builder->blueprintResolver(function($table, $callback) {
            return new Blueprint($table, $callback);
        });

        return $builder;
    }
}
