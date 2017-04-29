<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('customers', function(Blueprint $table)
      {
          $table->increments('id');
          $table->string('name');
          $table->string('sex');
          $table->string('birthday');
          $table->string('guardian_name');
          $table->integer('age');
          $table->string('relation');
          $table->string('profession');
          $table->string('address');
          $table->string('mobile');
          $table->string('pregnancy');
          $table->string('pregnancy_activity');
          $table->integer('father_age');
          $table->integer('mother_age');
          $table->string('feed');
          $table->string('feed_old');
          $table->string('sports');
          $table->string('sports_time');
          $table->string('sports_car');
          $table->string('safe_person');
          $table->string('safe_mother');
          $table->string('safe_things');
          $table->string('safe_bite');
          $table->string('bring_father_method');
          $table->string('bring_mother_method');
          $table->string('bring_communicate_time');
          $table->string('bring_intimate');
          $table->string('bring_communicate_method');
          $table->string('bring_relation');
          $table->string('lange');
          $table->string('behavior');
          $table->string('emotion');
          $table->text('puzzled');
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
