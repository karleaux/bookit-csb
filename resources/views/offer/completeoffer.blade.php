@extends('layouts.app')

@section('content')
    <div class="container">    
        <h1>Complete Offer</h1>
        <form action="/filesubmit" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="offer_id" value="{{$offer_id}}">
            <label for="imageupload">Upload Image Here:</label><br/>
            <input class="btn btn-success" type="file" name="imageupload" id="imageupload">
            <br>
            <br>
            <input type="submit" value="Submit" class="btn btn-primary">
        </form>
    </div>
@endsection