<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlbumGalleryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('album_gallery', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('filename');
            $table->text('resized_name');
            $table->text('original_name');
            $table->unsignedBigInteger('album_id');
            $table->unsignedBigInteger('upload_by')->nullable();
            $table->foreign('album_id')->references('id')->on('albums')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('upload_by')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('album_gallery');
    }
}
