<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
//THIS IS ANAK
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academics', function (Blueprint $table) {
            $table->id();
            $table->string('category', 255);
            $table->string('name', 255);
            $table->string('fileupload', 100);
            $table->bigInteger('applicant_id')->nullable()->unsigned();
            $table->foreign('applicant_id')->references('id')->on('applicants')->onDelete('cascade'); //refer id in applicants table
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
        Schema::dropIfExists('academics');
    }
};
