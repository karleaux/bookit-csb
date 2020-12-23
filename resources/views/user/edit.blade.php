@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editing Profile</h1>
        <form method="post" action="/user/edit" enctype="multipart/form-data"> @csrf
            <input type="hidden" name="user_id" value="{{ Auth::user()->user_id }}"/>
            <div class="row">
                <div class="col-4">
                        <div style="
                            background:url('{{ Auth::user()->imageurl }}');
                            background-size:cover;
                            background-position:center;
                            border-radius:100%;
                            height:300px;
                            width:300px;">
                    </div>
                    <div class="form-group">
                            <label for="imageupload">Profile Picture</label>
                        <input type="file" class="btn btn-success form-control form-control-file" name="imageupload">
                    </div>
                </div>
                <div class="col-8">
                    <div class="form-group">
                        <label for="firstname">First Name</label>
                        <input type="text" class="form-control" name="firstname" id="firstname" aria-describedby="helpId" placeholder="First Name" value="{{ Auth::user()->firstname }}">
                        <label for="lastname">Last Name</label>
                        <input type="text" class="form-control" name="lastname" id="lastname" aria-describedby="helpId" placeholder="Last Name" value="{{ Auth::user()->lastname }}">
                    </div>
                    <div class="form-group">
                    <label for="location">Location</label>
                        <input type="text" class="form-control" name="location" id="location" aria-describedby="helpId" placeholder="Location" value="{{ Auth::user()->location }}">
                    </div>
                </div>
            </div>
            <h3>About me</h3>
            <div class="form-group">
                <label for="userbio"></label>
                <textarea class="form-control" name="userbio" id="article-ckeditor" rows="3">{!! htmlentities(Auth::user()->userbio) !!}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection