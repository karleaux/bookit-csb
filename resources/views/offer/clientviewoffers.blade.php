@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Viewing your sent offers</h3>
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
                    <div class="card-body py-2 mb-0">
                        <p class="text-right my-0 small">
                            talent by 
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
                        @if($offer->status=='Waiting'||$offer->status=='Accepted')
                        <form method="post" action="/offer/clientcanceloffer/{{$offer->offer_id}}" class="d-inline-block">
                            @csrf
                            <button onclick="return confirm('Are you sure you want to cancel your offer on {{ $offer -> talent_name }}?')"
                                type="submit"
                                class="btn btn-danger">
                                Cancel
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