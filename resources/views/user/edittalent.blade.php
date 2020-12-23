@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Editing Talent</h3>
    <form action="/user/updatetalent/{{ $talents->talent_id }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="talentname">Talent Name</label>
                    <input type="text" name="talentname" id="talentname" class="form-control" value="{{ $talents->talent_name }}">
                    <label for="price">Price</label>
                    <input class="form-control input-num" type="number" name="price" step=".01" min="0.01" max="999999.99" value="{{ $talents -> price }}" id="price">
                </div>
            </div>
            <div class="col-6">
                <div class="col-6 p-relative">
                    <div class="card-img-top" style="
                    background:url('{{ $talents->image_url }}');
                    background-size:cover;
                    background-position:center;
                    height:300px;
                    min-width:100%;"></div>
                    <input class="btn btn-secondary" type="file" name="imageupload" id="imageupload">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="description">Talent Description</label>
            <textarea class="form-control" name="description" id="article-ckeditor" rows="5"
            placeholder="Describe your talent here" required aria-required="true" data-sample-short>{{ $talents->description }}</textarea>
        </div>
        <input type="submit" value="Submit" class="btn btn-info">
    </form>
</div>
@endsection
