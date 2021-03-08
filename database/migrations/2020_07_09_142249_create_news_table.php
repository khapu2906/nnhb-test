<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new', function (Blueprint $table) {
            $table->integer('id');
            $table->string('name',55);
            $table->text('image');
            $table->text('short_content');
            $table->text('slug');
            $table->text('content');
            $table->integer('category_new_id');
            $table->timestamps();
            $table->primary('id');
           // $table->foreignId('category_new_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('new');
    }
}
