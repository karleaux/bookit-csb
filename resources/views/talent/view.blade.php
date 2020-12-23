@extends('layouts.app')

@section('content')
<div class="container" style="padding-bottom:10vh;">
    <br/>
    <div class="row">
        <h1 class="col-11">{{$talent->talent_name}}</h1>
        <div class="alert alert-primary col-1 text-right">
            <i class="fas fa-star mr-2"></i>{{ $faved[0] }}
        </div>
    </div>
    <div class="card-img-top" style="
        background:url('{{ $talent->image_url }}');
        background-size:cover;
        background-position:center;
        width:100%;
        height:512px;
    "></div>
    <hr/>
    <h3>About this talent</h3>
    {!!$talent->description!!}
    <hr/>
    This service costs <b>${{$talent->price}}</b>.
    <hr/>
    @auth
    @if (Auth::user()->user_id != $talent->user_id)
        @if ($faved[1] =='true')
            <form class="d-inline-block" method="POST" action="/remove/{{$talent->talent_id}}/{{ Auth::user()->user_id }}">
                @csrf
                <button type="submit" class="btn btn-warning">
                    <i class="fas fa-star-half-alt mr-3"></i>Unfavorite
                </button>
            </form>
        @else
            <form class="d-inline-block" method="POST" action="/store/{{$talent->talent_id}}/{{ Auth::user()->user_id }}">
                @csrf
                <button type="submit" class="btn btn-warning">
                    <i class="fas fa-star mr-3"></i>Favorite
                </button>
            </form>   
        @endif
        <a href="/offer/add/{{$talent->talent_id}}" class="btn btn-primary d-inline-block">
            <i class="fas fa-shopping-bag mr-3"></i>
            Avail service
        </a>
    @endif
    @endauth
</div>
@endsection