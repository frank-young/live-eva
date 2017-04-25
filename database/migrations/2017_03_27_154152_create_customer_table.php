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
          $table->string('user_token');
          $table->string('ip');
          $table->string('name');
          $table->string('birthday');
          $table->string('guardian_name');
          $table->string('age');
          $table->string('relation');
          $table->string('profession');
          $table->string('address');
          $table->string('mobile');
          $table->integer('pregnancy');
          $table->integer('pregnancy_activity');
          $table->string('father_age');
          $table->string('mother_age');
          $table->integer('feed');
          $table->integer('feed_old');
          $table->integer('sports');
          $table->string('sports_time');
          $table->integer('sports_car');
          $table->string('safe_person');
          $table->integer('safe_mother');
          $table->integer('safe_things');
          $table->integer('safe_bite');
          $table->integer('bring_father_method');
          $table->integer('bring_mother_method');
          $table->integer('bring_communicate_time');
          $table->integer('bring_intimate');
          $table->integer('bring_communicate_method');
          $table->string('bring_relation');
          $table->integer('lange');
          $table->integer('behavior');
          $table->integer('emotion');
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
