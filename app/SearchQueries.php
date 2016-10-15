<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
/**
 * Class SearchQueries
 * @package App
 */
class SearchQueries extends Model
{
    /**
     * @var string
     */
    protected $table    = 'search_queries';
    /**
     * @var array
     */
    protected $fillable = ['search_string'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
