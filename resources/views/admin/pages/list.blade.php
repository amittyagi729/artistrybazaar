@extends('admin.layouts.master')
@section('title')Pages @endsection

@section('content')
<div class="app-title">
   <div>
      <h1><i class="fa fa-th-list"></i> Pages</h1>
      <p>Pages</p>
   </div>
   <ul class="app-breadcrumb breadcrumb side">
      <div class="tile-footer">
         <a href="{{ url('admin/page/create')}}" class="btn btn-success" style="background-color: #17a2b8;border-color: #17a2b8;">Add New</a>
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
                     @foreach($pages as $key=>$page)
                     <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $page->title }}</td>
                        <td>{{ $page->slug }}</td>
                        <td><a href="{{ route('admin.page.edit', base64_encode($page->id))}}"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
                           <a class="delete" href="{{ url('/admin/page/delete/'.base64_encode($page->id))}}" data-confirm="Are you sure to delete this item?"><i class="fa fa-trash  text-danger"></i> 
                           </a>
                           @if($page->is_active == 1)
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