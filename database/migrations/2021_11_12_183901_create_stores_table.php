<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id")->index();
            $table->string("phone")->nullable();
            $table->text("address")->nullable();
            $table->string("name");
            $table->string("join");
            $table->string("masa_active");
            $table->string("kota")->nullable();
            $table->string("provinsi")->nullable();
            $table->integer("limit")->default(1);
            $table->enum("status",["active","tidak"])->default("tidak");
            $table->softDeletes();
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
        Schema::dropIfExists('stores');
    }
}
