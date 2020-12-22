@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Viewing offers recieved</h3>
        <div class="container">
            <div class="d-flex justify-content-start flex-wrap">
                @foreach ($offers as $offer)
                <div class="d-flex m-2">
                    <div class="card mx-2" style="width:300px;">
                        <div class="card-header">
                            <a class="card-title h5 dblock" href="/talents/{{ $offer -> talent_id }}">
                                {{ $offer -> talent_name }}
                            </a>
                        </div>
                        <div class="card-body pb-2 mb-0">
                            <p class="text-right my-0 small">
                                offer by 
                                <a class="bold" href="/user/details/{{ $offer -> user_id}}">{{ $offer -> firstname }} {{ $offer -> lastname }}</a>
                                <br/>
                                {{ date('F j, Y, g:i a', strtotime($offer -> created_at)) }}
                            </p>
                            <hr class="m-0 mt-2"/>
                            <p class="card-text">{!! $offer -> details !!}</p>
                            <hr class="m-0 mb-2"/>
                            <div class="row justify-content-between px-2">
                                <span>
                                    {{ $offer -> price }}
                                </span>
                                <span>
                                    Status: <b>{{ $offer -> status }}</b>
                                </span>
                            </div>
                            
                        </div>
                        <div class="card-footer">
                            @if($offer->status == "Waiting")
                            <form method="post" action="/offer/acceptoffer/{{ $offer -> offer_id }}" class="d-inline-block">
                                @csrf
                                <button onclick="return confirm('Are you sure you want to accept {{ $offer -> details }}?')"
                                    type="submit"
                                    class="btn btn-success">
                                    Accept
                                </button>
                            </form>
                            @endif
                            @if($offer->status == "Accepted")
                            <form method="post" action="/offer/completeoffer/{{ $offer -> offer_id }}" class="d-inline-block">
                                @csrf
                                <button 
                                    type="submit"
                                    class="btn btn-success">
                                    Complete
                                </button>
                            </form>
                            <form method="post" action="/offer/canceloffer/{{ $offer -> offer_id }}" class="d-inline-block">
                                @csrf
                                <button onclick="return confirm('Are you sure you want to cancel {{ $offer -> details }}?')"
                                    type="submit"
                                    class="btn btn-danger">
                                    Cancel
                                </button>
                            </form>
                            @endif
                            @if($offer->status == "Waiting")
                            <form method="post" action="/offer/rejectoffer/{{ $offer -> offer_id }}" class="d-inline-block">
                                @csrf
                                <button onclick="return confirm('Are you sure you want to reject {{ $offer -> details }}?')"
                                    type="submit"
                                    class="btn btn-danger">
                                    Reject
                                </button>
                            </form>
                            @endif
                            @if($offer->status == "Completed")
                            <a class="btn btn-success" href="/images/completedoffer/{{ $offer -> image_url }}">
                                View completed work
                            </a>
                            @endif
                        </div>
                    </div>
                </div>

                @endforeach
            </div>
        </div>
    </div>

@endsection
