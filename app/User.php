<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\SearchQueries;
use Illuminate\Http\Request;
use Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function searchHistory()
    {
        return $this->hasMany(SearchQueries::class);
    }

    public function getCurrentUserId()
    {
        return $this->id;
    }

    //store the search string and return search string
    public function saveSearch(SearchObject $search)
    {
        $userSearchHistory = $this->searchHistory();
        $userSearchHistory->create(['search_string' => $search->getTag() , 'user_id' => $this->getCurrentUserId()]);
    }
}
