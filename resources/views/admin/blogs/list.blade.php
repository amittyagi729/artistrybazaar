@extends('admin.layouts.master')
@section('title')Blogs @endsection

@section('content')
<div class="app-title">
   <div>
      <h1><i class="fa fa-th-list"></i> Blog</h1>
      <p>Blogs</p>
   </div>
   <ul class="app-breadcrumb breadcrumb side">
      <div class="tile-footer">
         <a href="{{ url('admin/blog/create')}}" class="btn btn-success" style="background-color: #17a2b8;border-color: #17a2b8;">Add New</a>
      </div>
   </ul>
</div>

<div class="row">
   <div class="col-md-12">
      <div class="tile">
         <div class="tile-body">
            <div class="table-responsive">
               <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                     <tr>
                        <th>Sr.No</th>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Action</th>
         
                     </tr>
                  </thead>
                  <tbody>
                     @foreach($posts as $key=>$blog)
                     <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $blog->title }}</td>
                        <td>{{ $blog->slug }}</td>
                        <td><a href="{{ route('admin.blog.edit', base64_encode($blog->id))}}"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
                           <a class="delete" href="{{ url('/admin/blog/delete/'.base64_encode($blog->id))}}" data-confirm="Are you sure to delete this item?"><i class="fa fa-trash  text-danger"></i> 
                           </a>
                           @if($blog->status == 1)
                           <span class="badge badge-primary">Publish</span>
                           @else
                           <span class="badge badge-warning">Draft</span>
                           @endif </td>
                  
                        
                     </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
@section('footer_scripts')
@stop