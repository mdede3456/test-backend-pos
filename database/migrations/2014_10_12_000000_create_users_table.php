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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->unsignedBigInteger("store_id")->nullable();
            $table->unsignedBigInteger("cabang_id")->nullable();
            $table->string("jabatan")->nullable();
            $table->string("photo")->default("uploads/image.jpg");
            $table->timestamp('email_verified_at')->nullable();
            $table->enum("role",["admin","kasir","owner"])->default("owner"); 
            $table->string('password');
            $table->softDeletes();
            $table->rememberToken();
            $table->timestamps();
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
