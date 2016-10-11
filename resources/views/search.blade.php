@extends('layouts.app')
@section('content')
    <div class="container">

        @include('partials.searchform')

        <div class="row">
            @if( isset($photos) )
            @foreach($photos['photo'] as $photo)
                <h3>{{ $photo['title'] }}</h3>
                <a href="{{ $photoBuilder::getFullPhotoUrl($photo) }}" target="_blank">
                    <img src="{{ $photoBuilder::getThumbnailPhotoUrl($photo) }}"></img>
                </a>
                <hr/>
            @endforeach
                @endif
        </div>

        <div class="row">
            <ul class="pagination">
                @if( isset($pagination))
                @foreach($pagination as $item)
                    <li><a href="/search/{{ $tag }}/page/{{ $item->getValue() }}">{{ $item->getKey() }}</a></li>
                @endforeach

                @endif
            </ul>
        </div>
    </div>
@endsection
