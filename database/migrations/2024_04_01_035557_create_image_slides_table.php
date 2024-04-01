<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImageSlidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_slides', function (Blueprint $table) {
            $table->id('ImageId'); // Mã hình ảnh
            $table->string('ImageUrl', 512)->nullable(false); // Đường dẫn ảnh
            $table->string('Link', 512)->nullable(); // Liên kết
            $table->string('Description', 256)->nullable(); // Mô tả
            $table->integer('ImageStatus'); // Trạng thái
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
        Schema::dropIfExists('image_slides');
    }
}
