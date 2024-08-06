@extends('admin.layouts.master')
@section('title') Users @endsection
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
      <h1><i class="fa fa-th-list"></i> Users</h1>
      <p>Users</p>
   </div>
   <ul class="app-breadcrumb breadcrumb side">
      <div class="tile-footer">
         <a href="{{ route('admin.user.create')}}" class="btn btn-success" style="background-color: #17a2b8;border-color: #17a2b8;">Add New Admin</a>
      </div>
   </ul>
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
            
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Mode Of Registration</th>
                        <th>Registered At</th>
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
                           <td>
                              @if($user->google_id)
                                  Auth
                              @elseif($user->is_guestlogin)
                                  Guest
                              @else
                                  Signup
                              @endif
                          </td>                      
                        <td>{{ \Carbon::parse($user->created_at)->format('d M Y, H:i'); }}</td>
                        
                        @foreach($user->roles as $role)
                        <td>
                           @if($role->name =='admin')
                           <span class="badge badge-primary text-capitalize">{{ $role->name }}</span>
                           @elseif($role->name =='user')
                           <span class="badge badge-secondary text-capitalize">{{ $role->name }}</span>
                           @elseif($role->name =='subadmin')
                           <span class="badge badge-success text-capitalize">{{ $role->name }}</span>
                           @endif
                        </td>
                        @endforeach
                        <td>
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