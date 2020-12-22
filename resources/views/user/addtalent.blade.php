@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Talent</h1>
    <form action="/user/addtalent" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="talentname">Talent Name</label>
            <input type="text" name="talentname" id="talentname" class="form-control" placeholder="Enter talent name..."
                aria-describedby="helpId">

            <label for="description">Talent Description</label>
            <textarea class="form-control" name="description" id="article-ckeditor" rows="5"
                placeholder="Enter description..." required aria-required="true"></textarea>
                
            <div class="row mt-3">
                <div class="col-6">
                    <label for="price">Price</label>
                    <input class="form-control input-num" type="number" name="price" step=".01" min="0.01" max="999999.99" value="0.00" id="price" required>
                </div>
                <div class="col-6">
                    <label for="imageupload">Add Image</label> <br/>
                    <input class="btn btn-secondary" type="file" name="imageupload" id="imageupload">
                </div>
            </div>
        </div>
        <input type="submit" value="Submit" class="btn btn-info">
    </form>
</div>
@endsection
