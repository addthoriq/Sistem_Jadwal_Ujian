<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table){
            $table->char('kode_permission', 3)->primary();
            $table->string('nama_permission', 30);
            $table->string('slug', 30);
            $table->timestamps();
        });
        Schema::create('roles', function (Blueprint $table) {
            $table->char('kode_role', 3)->primary();
            $table->string('nama_role', 30);
            $table->string('slug', 30);
            $table->timestamps();
        });
        Schema::create('role_permissions', function (Blueprint $table) {
            $table->char('kode_role', 3);
            $table->char('kode_permission', 3);
            $table->timestamps();
            $table->primary(['kode_role', 'kode_permission']);
            $table->foreign('kode_role')->references('kode_role')->on('roles');
            $table->foreign('kode_permission')->references('kode_permission')->on('permissions');
        });
        Schema::create('users', function (Blueprint $table) {
            $table->char('kode_user', 5)->primary();
            $table->char('kode_role', 3);
            $table->string('nama_user', 30);
            $table->string('email', 20)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('kode_role')->references('kode_role')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissions');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('role_permissions');
        Schema::dropIfExists('users');
    }
}
