@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h1 class="col-6">
            {{ $user->firstname }} {{ $user->lastname }}
        </h1>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-4">
            <div style="
                    background:url('{{ $user->imageurl }}');
                    background-size:cover;
                    background-position:center;
                    border-radius:100%;
                    height:300px;
                    width:300px;">
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-8">
            <div class="container">
                <h3>About {{ $user->firstname }} {{ $user->lastname }}</h3>
                <i class="fa fa-map-pin mr-3" aria-hidden="true"></i> {{ $user->location }}
                <hr />
                <div class="container">
                    {!! $user->userbio !!}
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <h1 class=" col-8">{{ $user->firstname }}'s' Talents</h1>
    </div>
</div>
<div class="my-4">
    <div class="main-carousel">
        @foreach ($talents as $talent)
        <div class="card mx-2 my-2 bg-white shadow"
            style="min-width: 30%; width: auto; height: 500px;">
            <div class="card-img-top" style="
                        background:url('{{ $talent->image_url }}');
                        background-size:cover;
                        background-position:center;
                        height:300px;
                        ">
            </div>
            <div class="card-body">
                <h4 class="card-title">
                    <a href="/talents/{{$talent -> talent_id}}">
                    {{ $talent -> talent_name }}
                    </a>
                </h4>
                <p class="card-text">
                    @if (strlen($talent -> description) > 100)
                    {!! substr($talent -> description,0,100) . "..." !!}
                    @else
                    {!! $talent -> description !!}
                    @endif
                </p>
                <p class="card-text text-white">{{ $talent -> price }}</p>
            </div>
            <div class="card-footer">
                <a class="btn btn-info" href="/talents/{{$talent->talent_id}}">
                    View Details
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
