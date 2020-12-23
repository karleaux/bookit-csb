@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Talents Page</h1>
        <hr>
        @if (isset($details))
            @foreach ($details as $query)
                <div class="row mb-5">
                <div class="card single-item col-8" style="padding:0">
                    <div class="card-header bg-primary">
                        <a href="/talents/{{$query -> talent_id}}">
                        <h1 class="text-white mb-0">{{ $query -> talent_name }}</h1>
                        </a>
                    </div>
                    <div class="card-body">
                        @if (strlen($query -> description) > 100)
                            {!! substr($query -> description,0,450) . "..." !!}
                        @else
                            {!! $query -> description !!}
                        @endif
                    </div>
                    <div class="card-footer">
                        <div style="
                            background:url('{{ $query->user()->imageurl }}');
                            background-size:cover;
                            background-position:center;
                            border-radius:100%;
                            width:32px;height:32px;
                            vertical-align:middle;
                            " class="d-inline-block mr-3"></div>
                        by
                        <a href="/user/details/{{ $query -> user() -> user_id }}">
                        <b>
                            {{ $query -> user() -> firstname }} {{ $query -> user() -> lastname }}
                        </b>
                        </a>
                        
                        <p class="card-text float-right">
                            Purchase for <b>{{ $query -> price}}</b>
                        </p>
                    </div>
                </div>
                <div class="col-4" style="
                    background:url('{{ $query->image_url }}');
                    background-size:cover;
                    background-position:center;
                    border-radius:0 15px 15px 0;
                    "></div>
                </div>
            @endforeach
        @else
            @foreach ($talents as $talent)
            <div class="row mb-5">
                <div class="card single-item col-8" style="padding:0">
                    <div class="card-header bg-primary">
                        <a href="/talents/{{$talent -> talent_id}}">
                        <h1 class="text-white mb-0">{{ $talent -> talent_name }}</h1>
                        </a>
                    </div>
                    <div class="card-body" style="min-height:0">
                        @if (strlen($talent -> description) > 100)
                            {!! substr($talent -> description,0,450) . "..." !!}
                        @else
                            {!! $talent -> description !!}
                        @endif
                    </div>
                    <div class="card-footer">
                        <div style="
                            background:url('{{ $talent->user()->imageurl }}');
                            background-size:cover;
                            background-position:center;
                            border-radius:100%;
                            width:32px;height:32px;
                            vertical-align:middle;
                            " class="d-inline-block mr-3"></div>
                        by
                        <a href="/user/details/{{ $talent -> user() -> user_id }}">
                        <b>
                            {{ $talent -> user() -> firstname }} {{ $talent -> user() -> lastname }}
                        </b>
                        </a>
                        <p class="card-text float-right">
                            Purchase for <b>{{ $talent -> price}}</b>
                        </p>
                    </div>
                </div>
                <div class="col-4" style="
                    background:url('{{ $talent->image_url }}');
                    background-size:cover;
                    background-position:center;
                    border-radius:0 15px 15px 0;
                    "></div>
            </div>
            @endforeach
        @endif
    </div>
@endsection

