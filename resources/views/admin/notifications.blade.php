@extends('admin.layouts.master')
@section('title') Notification @endsection 
@section('meta_description') Notification @endsection 
@section('content')
<div class="app-title">
   <div>
      <h1><i class="fa fa-edit"></i> Notification</h1>
      <p>Notification</p>
   </div>
   <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">Notification</li>
      <li class="breadcrumb-item"><a href="#">Notification</a></li>
   </ul>
</div>
<div class="row">
   <div class="col-md-12">
      <div class="tile">
         <h3 class="tile-title">Notification</h3>
         <div class="tile-body">
             @forelse($notifications as $notification)
                 <div class="alert alert-success" role="alert">
                     [{{ $notification->created_at }}] User {{ $notification->data['name'] }} ({{ $notification->data['email'] }}) has  registered.
                     <a href="javascript:void(0)" class="float-right mark-as-read" data-id="{{ $notification->id }}" style="color:blue">
                         Mark as read
                     </a>
                 </div>

                 @if($loop->last)
                     <a href="javascript:void(0)" id="mark-all" style="color:blue">
                         Mark all as read
                     </a>
                 @endif
             @empty
                 There are no new notifications
             @endforelse
         </div>
         
      </div>
   </div>
</div>
@endsection

