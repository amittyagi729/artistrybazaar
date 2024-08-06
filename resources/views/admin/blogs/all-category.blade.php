@extends('admin.layouts.master')
@section('title')Category list @endsection
@section('content')
<div class="app-title">
   <div>
      <h1><i class="fa fa-th-list"></i> Category</h1>
      <p>Category</p>
   </div>
   <ul class="app-breadcrumb breadcrumb side">
      <div class="tile-footer">
         <a href="{{ url('admin/blog-cat/category/create')}}" class="btn btn-success" style="background-color: #17a2b8;border-color: #17a2b8;">Add New Category</a>
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
                        <th>S.No.</th>
                        <th>Category Name</th>
                        <th>Category Slug</th>
                        <th>Parent Category</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     @if(isset($categories))
                     <?php $_SESSION['i'] = 0; ?>
                     @foreach($categories as $category)
                     <?php $_SESSION['i']=$_SESSION['i']+1; ?>
                     <tr>
                        <?php $dash=''; ?>
                        <td>{{$_SESSION['i']}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->slug}}</td>
                        <td>
                           @if(isset($category->parent_id))
                           {{$category->subcategory->name}}
                           @else
                           None
                           @endif
                        </td>
                        <td><a href="{{ url('admin/blog-cat/category/edit')}}/{{base64_encode($category->id)}}"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
                           <a href="{{url('admin/blog-cat/category/delete')}}/{{$category->id}}" class="delete" data-confirm="Are you sure ,You want to delete this Category ?"><i class="fa fa-trash  text-danger"></i> 
                           </a>
                           @if($category->is_active == 1)
                           <span class="badge badge-primary">Publish</span>
                           @else
                           <span class="badge badge-warning">Blocked</span>
                           @endif
                        </td>
                     </tr>
                     @if(count($category->subcategory))
                     @include('admin.blogs.sub-category-list',['subcategories' => $category->subcategory])
                     @endif
                     @endforeach
                     <?php unset($_SESSION['i']); ?>
                     @endif
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection