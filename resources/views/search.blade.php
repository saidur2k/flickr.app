@extends('layouts.app')

@section('content')
    <div class="container">

        @include('partials.searchform')

        <div class="row">
            @if( isset($searchResults) )
            @foreach(  $searchResults as $photo)
                <h3>{{ $photo['title'] }}</h3>
                <a href="{{ $photoBuilder::getFullPhotoUrl($photo) }}" target="_blank">
                    <img src="{{ $photoBuilder::getThumbnailPhotoUrl($photo) }}"></img>
                </a>
                <hr/>
            @endforeach
            @endif
        </div>

    @if( isset($results) )
    @foreach ($results as $result)
            <p>{{ $result }}</p>
    @endforeach

    <?php echo $results->render(); ?>
    @endif
@endsection
