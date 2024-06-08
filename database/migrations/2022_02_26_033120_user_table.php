<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('98_user', function (Blueprint $table) {
            $table->string('id', 40)->primary()->index();
            $table->string('email')->unique();
            $table->string('phone_number')->unique();
            $table->string('type_user')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('role_id', 40)->nullable();
            $table->rememberToken()->nullable();
            $table->char('active', 1)->default(1);
            $table->string('created_by', 40);
            $table->string('updated_by', 40);
            $table->timestamps();
            $table->softDeletes();
            $table->index(['id', 'role_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('98_users');
    }
}
