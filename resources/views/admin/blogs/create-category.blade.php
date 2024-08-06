@extends('admin.layouts.master')
@section('title')Category @endsection
@section('content')
<div class="app-title">
   <div>
      <h1><i class="fa fa-edit"></i> Category </h1>
   </div>
</div>
<div class="row">
   <div class="col-md-12">
      <div class="tile">
         <div class="row">
            <div class="col-lg-6">
               <form role="form" method="post" action="{{ url('admin/blog-cat/category/create')}}">
                  {{csrf_field()}}
                  <div class="form-group">
                     <label for="exampleInputEmail1">Name</label>
                     <input type="text" name="name" class="form-control" placeholder="Category name" value="{{old('name')}}">
                     @error('name')
                     <small class="form-text" style="color:red;font-weight: 600;font-size: 14px;">{{ $message }}</small>
                     @enderror
                  </div>
                 
                  <div class="form-group">
                     <label>Select parent category*</label>
                     <select type="text" name="parent_id" class="form-control">
                        <option value="">None</option>
                        @if($categories)
                        @foreach($categories as $category)
                        <?php $dash=''; ?>
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                        @endif
                     </select>
                  </div>
                  <div class="tile-footer">
                     <button class="btn btn-primary" type="submit">Submit</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection