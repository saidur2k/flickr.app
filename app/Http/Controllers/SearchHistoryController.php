<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;


class SearchHistoryController extends Controller
{
    public function index()
    {
        $currentUser = User::find(Auth::user()->id);
        $history = $currentUser->searchHistory()->latest('created_at')->paginate(5);
        return view('history', compact('history'));
    }
}
