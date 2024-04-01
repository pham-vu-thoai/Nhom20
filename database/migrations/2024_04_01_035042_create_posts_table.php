<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id('PostId'); // Mã bài viết
            $table->string('Title', 256); // Tiêu đề
            $table->string('BriefContent', 1024); // Mô tả ngắn
            $table->text('Content')->nullable(); // Nội dung
            $table->string('Picture', 512)->nullable(); // Ảnh đại diện
            $table->integer('OrderNo')->nullable(); // Thứ tự
            $table->string('TagSearch', 256)->nullable(); // Thẻ tìm kiếm
            $table->integer('PostStatus'); // Trạng thái
            $table->integer('PostType'); // Loại bài viết
            $table->uuid('AccountId'); // Mã tài khoản tạo
            $table->foreign('AccountId')->references('AccountId')->on('accounts');
            $table->uuid('AccountModify')->nullable(); // Mã tài khoản sửa
            $table->foreign('AccountModify')->references('AccountId')->on('accounts');
            $table->dateTime('CreateDate'); // Ngày tạo
            $table->dateTime('LastModify')->nullable(); // Ngày sửa
            $table->string('KeywordSEO', 512)->nullable(); // Từ khóa seo
            $table->string('DescriptionSEO', 1024)->nullable(); // Mô tả seo
            $table->unsignedBigInteger('ParentId')->nullable(); // Mã bài viết cha
            $table->foreign('ParentId')->references('PostId')->on('posts');
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
        Schema::dropIfExists('posts');
    }
}
