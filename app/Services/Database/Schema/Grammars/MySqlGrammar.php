<?php

namespace App\Services\Database\Schema\Grammars;

use Illuminate\Support\Fluent;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Connection;

class MySqlGrammar extends \Illuminate\Database\Schema\Grammars\MySqlGrammar
{
    public function compileCreate(Blueprint $blueprint, Fluent $command, Connection $connection)
    {
        $sql = parent::compileCreate($blueprint, $command, $connection);

        return $this->compileCreateTableComment($sql, $blueprint);
    }

    protected function compileCreateTableComment($sql, Blueprint $blueprint)
    {
        $comment = method_exists($blueprint, 'getComment') ? $blueprint->getComment() : '';
        if (!empty($comment)) {
            $comment = addslashes($comment);
            $sql .= " comment = '{$comment}'";
        }

        return $sql;
    }
}
