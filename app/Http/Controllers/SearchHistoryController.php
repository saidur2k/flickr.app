<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SearchQueries;
use App\Http\Requests;
use Auth;

class SearchHistoryController extends Controller
{
    public function index()
    {
        $history = SearchQueries::where('user_id', Auth::user()->id)->latest('created_at')->paginate(5);
        return view('history', compact('history'));
    }
}
