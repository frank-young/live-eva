<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
  protected $fillable = [
    'name',
    'sex',
    'birthday',
    'guardian_name',
    'age',
    'relation',
    'profession',
    'address',
    'mobile',
    'pregnancy',
    'pregnancy_activity',
    'father_age',
    'mother_age',
    'feed',
    'feed_old',
    'sports',
    'sports_time',
    'sports_car',
    'safe_person',
    'safe_mother',
    'safe_things',
    'safe_bite',
    'bring_father_method',
    'bring_mother_method',
    'bring_communicate_time',
    'bring_intimate',
    'bring_communicate_method',
    'bring_relation',
    'lange',
    'behavior',
    'emotion',
    'puzzled'
  ];
}
