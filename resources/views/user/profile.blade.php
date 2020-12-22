@extends('layouts.app')

@section('content')
<div class="container mt-2">
    <div class="row">
        <h1 class="col-6">
            Welcome, {{ Auth::user()->firstname }}!
        </h1>
        <div class="col-6">
            <a class="text-purple float-right" href="/user/edit" role="button">
                <i class="fas fa-edit"></i>
                Edit Profile
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-4">
            <div style="
                    background:url('{{ asset('images/users/'.Auth::user()->imageurl) }}');
                    background-size:cover;
                    background-position:center;
                    border-radius:100%;
                    height:300px;
                    width:300px;">
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-8">
            <div class="container">
                <h3>About {{ Auth::user()->firstname }} {{ Auth::user()->lastname}}</h3>
                <i class="fa fa-map-pin mr-3" aria-hidden="true"></i> {{ Auth::user()->location }}
                <hr />
                <div class="container">
                    {!! Auth::user()->userbio !!}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <h1 class="mt-2 col-8">{{ Auth::user()->firstname }}'s' Talents</h1>
        <div class="mt-2 col-4">
            <a class="text-purple float-right" href="/user/addtalent" role="button">
                <i class="fas fa-plus-circle"></i>
                Add Talent
            </a>
        </div>
    </div>
</div>
<div class="">
    {{-- newly added --}}
    <div class="main-carousel">
        @foreach ($talents as $talent)
        <div class="card mx-2 my-2 bg-white shadow"
            style="width:25em; height: 500px;">
            <div class="card-img-top" style="
                        background:url('{{ asset('images/talents/'.$talent->image_url) }}');
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
            </div>
            <div class="card-footer">
                <a class="btn btn-info" href="/user/edittalent/{{ $talent -> talent_id }}">Edit</a>
                <form method="post" action="/user/removetalent/{{ $talent -> talent_id }}" class="d-inline-block">
                    @csrf
                    <button
                        onclick="return confirm('Are you sure you want to delete your talent {{ $talent -> talent_name }}?')"
                        type="submit" class="btn btn-danger">
                        Delete
                    </button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>


@endsection
