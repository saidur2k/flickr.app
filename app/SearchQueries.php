<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SearchQueries extends Model
{
    protected $table = 'search_queries';
    protected $fillable = ['user_id' , 'search_string'];

}
