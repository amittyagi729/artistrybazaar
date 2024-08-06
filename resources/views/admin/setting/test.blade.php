@extends('superadmin.layouts.master')
@section('title') Email Setting @endsection 
@section('meta_description') Email Setting @endsection 
 
 @section('content')
<div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-12 py-3">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Dashboard</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="#">General setting</a></li>
                                <li><span>Email setting</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
<div class="main-content-inner">
   
  @if(session('success'))
  <div class="col-sm-6">
  <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
    <strong>Success</strong>  {{session('success')}}.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span class="fa fa-times"></span>
    </button>
</div>
</div>
@endif


   <div class="row">
      <!-- Server side start -->
      <div class="col-12">
         <div class="card mt-4">
            <div class="card-body">
               <h4 class="header-title">{{__('Email Settings')}}</h4>
               <form action="{{ url('/superadmin/setting/save1/')}}" method="post">
                   @csrf
                                      
                  <div class="form-row">
                  
                     <div class="col-md-6 mb-3">
                        <label for="validationCustom02">{{__('Email Host')}}</label>
                         <input type="text" id="mail_host" name="mail_host" class="form-control" value="{{ $data->Emails}}">
                          @error('mail_host')
                                  <small class="form-text" style="color:red;font-weight: 600;font-size: 14px;">{{ $message }}</small>
                              @enderror
                     </div>
                  </div>
                  
               
                  <button class="btn btn-primary" type="submit">Submit form</button>
               </form>
            </div>
         </div>
      </div>
      <!-- Server side end -->
   </div>
</div>
@endsection