<?php $dash.='-- '; ?>
@foreach($subcategories as $subcategory)
<?php $_SESSION['i']=$_SESSION['i']+1; ?>
<tr>
   <td>{{$_SESSION['i']}}</td>
   <td>{{$dash}}{{$subcategory->name}}</td>
   <td>{{$subcategory->slug}}</td>
   <td>{{$subcategory->parent->name}}</td>
   <td><a href="{{ url('admin/blog-cat/category/edit')}}/{{base64_encode($subcategory->id)}}"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
      <a href="{{url('admin/blog-cat/category/delete')}}/{{$subcategory->id}}" onclick="confirm('Are you sure ,You want to delete this Category ?')"><i class="fa fa-trash  text-danger"></i></a>
      @if($subcategory->is_active == 1)
      <span class="badge badge-primary">Publish</span>
      @else
      <span class="badge badge-warning">Blocked</span>
      @endif
   </td>
</tr>
@if(count($subcategory->subcategory))
@include('admin.blogs.sub-category-list',['subcategories' => $subcategory->subcategory])
@endif
@endforeach