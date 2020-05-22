<?php

namespace App\Services\Database;

class Blueprint extends \Illuminate\Database\Schema\Blueprint
{
    public function rememberToken()
    {
        return $this->string('remember_token', 100);
    }

    public function dateTimes($precision = 0)
    {
        $this->dateTime('created_at', $precision)->comment('创建时间');
        $this->dateTime('updated_at', $precision)->comment('更新时间');
    }
}
