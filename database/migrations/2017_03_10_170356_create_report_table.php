<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('reports', function(Blueprint $table)
      {
          $table->increments('id');
          $table->string('report_name');
          $table->text('report_body');
          $table->integer('module_id');
          $table->integer('min_score');
          $table->integer('max_score');
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
