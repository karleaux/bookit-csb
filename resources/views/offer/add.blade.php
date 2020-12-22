@extends('layouts.app')

@section('content')
<div class="container">
    <h1>You are purchasing one (1) order of: {{ $talent->talent_name }} </h1>
    <form action="/offer/add/{{$talent->talent_id}}" method="post">
        @csrf
        <label for="description">Request Description</label>
            <textarea class="form-control" name="details" id="article-ckeditor" rows="5"
            placeholder="Describe your commission here" data-sample-short required aria-required="true"></textarea>
        <div class="form-group">
            <div class="col-6 mt-4">
            <label for="cc" class="h6">Credit Card:</label>
                <input type="text" name="ccnum" class="form-control col-12" placeholder="Name on Card" required>
                <div class="input-group">
                    <input type="text" name="ccnum" class="form-control col-12 credit-card" placeholder="Card Number" required>
                    <span class="type input-group-addon"></i>
                </div>
                </span>
                <div class="row mt-3">
                    <div class="col-3">
                        <h6>Month</h6>
                        <input type="number" name="ccmm" class="form-control" placeholder="MM" required 
                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                        maxlength="2" max="12" step="1">
                    </div>
                    <div class="col-3">
                        <h6>Year</h6>
                        <input type="number" name="ccyy" class="form-control" placeholder="YY" required
                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                        maxlength="2" max="55" min="19" step="1">
                    </div>
                    <div class="col-6">
                        <h6>Security Code</h6>
                        <input type="number" name="cvv" class="form-control" placeholder="CVV" required
                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                        maxlength="4" max="9999" step="1">
                    </div>
                </div>
                <input type="submit" value="Submit" class="btn btn-primary mt-4">
            </div>
        </div>
    </form>
</div>
@endsection
