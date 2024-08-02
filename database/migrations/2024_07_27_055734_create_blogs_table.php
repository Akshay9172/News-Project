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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Column for the title
            $table->foreignId('category_id')->constrained('categories');
            $table->string('img'); // Column for the image URL
            $table->text('description'); // Column for the description
            // $table->string('slug')->unique()->default('default-slug');
            $table->string('slug')->unique()->default(''); // Set default value to empty string

            $table->timestamps();
            $table->tinyInteger('status')->default(0); // Add status column with default value 0

            // Optionally, add foreign key constraints if you have a categories table
            // $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
};
