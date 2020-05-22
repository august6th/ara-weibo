<?php

namespace App\Services\Database;

use Illuminate\Support\Facades\DB;

class Blueprint extends \Illuminate\Database\Schema\Blueprint
{
    public function string($column, $length = null)
    {
        $column = parent::string($column, $length);
        return $column->default('');
    }

    public function rememberToken()
    {
        return $this->string('remember_token', 100);
    }

    public function dateTimes($precision = 0)
    {
        $this->dateTime('created_at', $precision)->useCurrent()->comment('创建时间');
        $this->dateTime('updated_at', $precision)
            ->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'))
            ->comment('更新时间');
    }

    public function dateTime($column, $precision = 0, $default = '1970-01-01 00:00:00')
    {
        $column = parent::dateTime($column, $precision);
        return $column->default($default);
    }
}
