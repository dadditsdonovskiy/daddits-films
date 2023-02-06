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
        Schema::create('director_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('director_id');
            $table->string('url');
            $table->smallInteger('type');
            $table->decimal('file_size', 30, 8)->nullable();
            $table->timestamps();
            $table->foreign('director_id')->references('id')->on('directors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('director_images');
    }
};
