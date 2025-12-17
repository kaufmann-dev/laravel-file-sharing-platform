<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('USER_has_FILES_JT', function (Blueprint $table) {
            $table->unsignedBigInteger('USER_ID')->index();
            $table->foreign('USER_ID')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('FILE_ID')->index();
            $table->foreign('FILE_ID')->references('id')->on('files')->onDelete('cascade');
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
        Schema::dropIfExists('USER_has_FILES_JT');
    }
};
