@extends('admin.layouts.master')
@section('title') System-info @endsection 
@section('meta_description') System-info @endsection 
@section('content')
<div class="app-title">
   <div class="div">
      <h1><i class="fa fa-laptop"></i> System Info</h1>
      <p>System Info</p>
   </div>
   <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="#">System Info</a></li>
   </ul>
</div>
<div class="tile mb-4">
   <div class="row">
      <div class="col-lg-12">
         <div class="page-header">
            <h2 class="mb-3 line-head" id="navs">System Info</h2>
         </div>
      </div>
   </div>
   <div class="row" style="margin-bottom: 2rem;">
      <div class="col-lg-10">
         <div class="bs-component">
            <ul class="nav nav-tabs">
               <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#Application"><i class="fa fa-navicon"></i> Application</a></li>
               <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Server"><i class="fa fa-bars"></i> Server</a></li>
               <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Cache"><i class="fa fa-eraser"></i> Cache</a></li>
            </ul>
            <div class="tab-content" id="myTabContent">
               <div class="tab-pane fade active show" id="Application">
                  <div class="col-xl-12">
                     <p class="mt-4"><strong>Application Information </strong></p>
                     <br>
                     <div class="card b-radius--10 ">
                        <div class="card-body p-0">
                           <div class="table-responsive">
                              <table class="table table--light style--two">
                                 <?php $serverDetails = getserver();?>
                                 <tbody>
                                    <tr>
                                       <td>PHP Version</td>
                                       <td><?php echo phpversion();?></td>
                                    </tr>
                                    <tr>
                                       <td>Laravel version</td>
                                       <td>9.19</td>
                                    </tr>
                                 </tbody>
                              </table>
                              <!-- table end -->
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="tab-pane fade" id="Server">
                  <div class="col-xl-12">
                     <p class="mt-4"><strong>Server Information </strong></p>
                     <br>
                     <div class="card b-radius--10 ">
                        <div class="card-body p-0">
                           <div class="table-responsive">
                              <table class="table table--light style--two">
                                 <?php $serverDetails = getserver();?>
                                 <tbody>
                                    <tr>
                                       <td>PHP Version</td>
                                       <td><?php echo phpversion();?></td>
                                    </tr>
                                    <tr>
                                       <td>Server Software</td>
                                       <td>{{ $serverDetails['SERVER_SOFTWARE'] }}</td>
                                    </tr>
                                    <tr>
                                       <td>Server IP Address</td>
                                       <td>{{ $serverDetails['SERVER_ADDR'] }}</td>
                                    </tr>
                                    <tr>
                                       <td>Server Protocol</td>
                                       <td>{{ $serverDetails['SERVER_PROTOCOL'] }}</td>
                                    </tr>
                                    <tr>
                                       <td>HTTP Host</td>
                                       <td>{{ $serverDetails['HTTP_HOST'] }}</td>
                                    </tr>
                                    </tr>
                                    <tr>
                                       <td>Server Port</td>
                                       <td>{{ $serverDetails['SERVER_PORT'] }}</td>
                                    </tr>
                                 </tbody>
                              </table>
                              <!-- table end -->
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="tab-pane fade" id="Cache">
                  <div class="col-xl-12 mt-4">
                     <div class="card b-radius--10 ">
                        <div class="card-body p-0">
                           <div class="table-responsive">
                              <table class="table table--light style--two">
                                 <tbody>
                                    <tr>
                                       <td><i class="fa fa-hand-o-right"></i> Compiled views will be cleared</td>
                                    <tr>
                                       <td><i class="fa fa-hand-o-right"></i> Application cache will be cleared</td>
                                    </tr>
                                    <tr>
                                       <td><i class="fa fa-hand-o-right"></i> Route cache will be cleared</td>
                                    </tr>
                                    <tr>
                                       <td><i class="fa fa-hand-o-right"></i> Configuration cache will be cleared</td>
                                    </tr>
                                    <tr>
                                       <td><i class="fa fa-hand-o-right"></i> Compiled services and packages files will be removed</td>
                                    </tr>
                                    <tr>
                                       <td><i class="fa fa-hand-o-right"></i> Caches will be cleared</td>
                                    </tr>
                                 </tbody>
                              </table>
                              <!-- table end -->
                           </div>
                        </div>
                        <div class="card-footer">
                           <a href="{{ url('admin/setting/cacheclear')}}" class="btn btn-primary btn-block h--50">Click to clear</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection