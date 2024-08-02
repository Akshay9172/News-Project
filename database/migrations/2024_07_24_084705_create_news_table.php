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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->longText('title');
            $table->longText('slug')->nullable();
            $table->longText('description');
            $table->longText('img')->nullable();
            $table->string('news_type');
            $table->foreignId('reporter_id')->constrained('users'); // assuming you have a users table for reporters
            $table->foreignId('category_id')->constrained('categories');
            $table->enum('status', ['draft', 'published', 'rejected'])->default('draft');
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
        Schema::dropIfExists('news');
    }
};
