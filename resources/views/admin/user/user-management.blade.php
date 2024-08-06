@extends('admin.layouts.master')
@section('title')Users @endsection
@section('header_styles')
<style type="text/css">
   .nav-pills .nav-link.deactive, .nav-pills .show > .nav-link {
   color: #FFF;
   background-color: #FB9155;
   margin-right: 10px;
   }
   .nav-pills .nav-link.active, .nav-pills .show > .nav-link {
   color: #FFF;
   background-color: #009688;
   margin-right: 10px;
   }
</style>
@stop
@section('content')
<div class="app-title">
   <div>
      <h1 class="text-capitalize"><i class="fa fa-th-list"></i> {{ isset($type)? $type : ''; }}</h1>
      <p>{{ isset($type)? $type : ''; }}</p>
   </div>
</div>
@include('admin.user.tab-navbar')
<div class="row">
   <div class="col-md-12">
      <div class="tile">
         <div class="tile-body">
            <div class="table-responsive">
               <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                     <tr>
                        <th>Sr.No</th>
                        <th>Full name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Role</th>
                        
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach($users as $key=>$user)
                     <tr>
                        <td>{{ $key+1 }}</td>
                         <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                         @foreach($user->roles as $role)
                        <td>
                           @if($role->name =='admin')
                           <span class="badge badge-primary text-capitalize">{{ $role->name }}</span>
                           @elseif($role->name =='user')
                           <span class="badge badge-secondary text-capitalize">{{ $role->name }}</span>
                           @endif
                        </td>
                        @endforeach
                        <td><a href="{{ route('admin.user.edit', base64_encode($user->id))}}"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
                           @if($user->status == 1)
                           <span class="badge badge-primary">Publish</span>
                           @else
                           <span class="badge badge-warning">Blocked</span>
                           @endif 
                        </td>
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