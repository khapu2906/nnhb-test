<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu', function (Blueprint $table) {
            $table->integer('id');
            $table->string('name',55);
            $table->integer('parent_id');
            $table->integer('left');
            $table->integer('right');
            $table->integer('level');
            $table->integer('quantum_child');
            $table->text('slug');
            $table->timestamps();
            $table->unique('slug');
            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu');
    }
}
