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
        Schema::create('issued_books', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('stu_id');
            $table->unsignedBigInteger('book_id');
            $table->boolean('is_returned')->default(false);
            $table->dateTime('date_return')->nullable();
            $table->timestamps();

            $table->foreign('stu_id')->references('id')->on('students');
            $table->foreign('book_id')->references('id')->on('books');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('issued_books');
    }
};
