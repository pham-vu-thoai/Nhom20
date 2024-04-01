<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resources', function (Blueprint $table) {
            $table->id('ResourceId'); // Mã tài nguyên
            $table->string('ResourceUrl', 512)->nullable(false); // Url của tài nguyên
            $table->integer('ResourceType'); // Loại tài nguyên
            $table->uuid('AccountId'); // Mã tài khoản tạo
            $table->foreign('AccountId')->references('AccountId')->on('accounts');
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
        Schema::dropIfExists('resources');
    }
}
