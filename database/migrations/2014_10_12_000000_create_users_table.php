<?php

use Illuminate\Database\Migrations\Migration;
use App\Services\Database\Blueprint;
use App\Services\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id()->comment('主键id');
            $table->string('name', 50)->comment('用户名');
            $table->string('email', 50)->comment('邮箱地址')->unique();
            $table->dateTime('email_verified_at')->comment('邮箱验证时间');
            $table->string('password', 100)->comment('密码');
            $table->rememberToken()->comment('记住我');
            $table->dateTimes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
