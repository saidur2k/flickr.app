<div class="search container">
    <div class="row">
        <div class="col-md-6">
            <h2>Search Flickr</h2>
            <div classs="row">
                <form method="POST" action="/search/store" class="col-md-6">
                    {{ csrf_field() }}
                    <input name="search_string" type="value" required></input>
                    <button>Search</button>
                </form>
            </div>
        </div>
    </div>
</div>

@if(Session::has('message'))
    <div class="alert alert-info">
        {{Session::get('message')}}
    </div>
@endif