@extends('layouts.app')

@section('content')
<div class="container">
    <h1>My Search History</h1>

    <ul class="Search-Queries">
    @foreach($history as $search)
        <li class="Search-Queries__query">
            <a href="/search/{{ $search->search_string }}/page/1/">{{ $search->search_string  }}
                <small>{{ $search->updated_at->diffForHumans() }}</small>
            </a>
        </li>
    @endforeach
    </ul>

    {{ $history->links() }}
</div>
@endsection
