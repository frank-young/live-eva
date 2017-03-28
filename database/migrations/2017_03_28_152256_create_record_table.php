<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('records', function(Blueprint $table)
      {
          $table->increments('id');
          $table->integer('customer_id');
          $table->integer('paper_id');
          $table->string('paper_name');
          $table->integer('module_id');
          $table->string('module_name');
          $table->integer('question_id');
          $table->string('question_name');
          $table->integer('answer_id');
          $table->string('answer_name');
          $table->integer('score');
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
        //
    }
}
