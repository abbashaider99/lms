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
        Schema::create('fines', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('stu_id');
            $table->unsignedBigInteger('issued_book_id');
            $table->unsignedBigInteger('days');
            $table->unsignedBigInteger('fine_amount');
            $table->timestamps();

            $table->foreign('stu_id')->references('id')->on('students');
            $table->foreign('issued_book_id')->references('id')->on('issued_books');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fines');
    }
};
