<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todolists', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);//colstring name and size
            $table->text('description');//coltext
            $table->integer('status')->unsigned()->default(1);//colint
            //relation ship start
            $table->bigInteger('user_id')->unsigned(); //define
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');//cascade when parent delete dia pun terdelete


            $table->timestamps();//masa kena create data
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('todolists');
    }
};
