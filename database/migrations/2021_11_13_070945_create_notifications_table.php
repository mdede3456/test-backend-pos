<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->enum("type",["store","cabang","request"]);
            $table->enum("for",["owner","kasir","admin"])->default("owner");
            $table->unsignedBigInteger("user_id")->nullable();
            $table->unsignedBigInteger("store_id")->nullable();
            $table->string("name");
            $table->text("description")->nullable();
            $table->enum("status",["read","no"])->default("no");
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
        Schema::dropIfExists('notifications');
    }
}
