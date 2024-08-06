@extends('admin.layouts.master')
@section('title') {{ $title = "Create New Testimonial" }} @endsection
@section('content')
@section('header_styles')
<link rel="stylesheet" href="{{ asset('/assets/css/custom-css/select-option.css') }}">
@endsection
<div class="app-title">
    <div>
        <h1><i class="fa fa-th-list"> {{ $title }}</i></h1>
        <p>{{ $title }}</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <div class="tile-footer">
           <a href="{{ url()->previous() }}" class="btn btn-danger">Back</a>
        </div>
     </ul>
</div>
<form action="{{ url('/admin/feedback/testimonials/store') }}" method="POST">
    @csrf

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="inputPassword4">Search with Email</label><br>
                <div class="select-input">
                    <input type="text" id="userSelection" placeholder="Search">
                    <input type="hidden" id="user-id" name="user_id">
                    <ul class="select-options">
                      @foreach (getAllUsers() as $user)
                      <li value={{ $user->id }}>{{ $user->email }}</li> 
                      @endforeach
                    </ul>
                  </div>
            </div>

            <div class="form-group">
                <label for="message">Message:</label>
                <textarea name="message" id="message" class="form-control" required></textarea>
            </div>
        
            <div class="form-group">
                <div class="select-input">
                    <label for="inputPassword4">Product by SKU</label><br>
                    <input type="text" id="userSelection1" placeholder="Search">
                    <input type="hidden" id="product-id" name="product_id">
                    <ul class="select-options1">
                      @foreach ($products as $product)
                      <li value={{ $product->id }}>{{ $product->sku }}</li> 
                      @endforeach
                    </ul>
                  </div>
            </div>
            <div class="form-check">
                <input type="checkbox" checked class="form-check-input" name="approved" value="1"
                    id="approved">
                <label class="form-check-label" for="approved">Approved</label>
            </div>
        </div>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary mt-2">Create</button>
    </div>
</form>

@endsection
@section('footer_scripts')
<script src="{{ asset('/assets/js/customJs/selectOption.js') }}"></script>
<script>
initializeFunction('select-options', 'userSelection', 'user-id');
initializeFunction('select-options1', 'userSelection1', 'product-id');
</script>
@stop