@extends('admin.layouts.master')
@section('title') User Add @endsection
@section('content')

<div class="app-title">
   <div>
      <h1><i class="fa fa-edit"></i> User</h1>
      <p>User</p>
   </div>
   <ul class="app-breadcrumb breadcrumb">
       <div class="tile-footer">
            <a href="{{ url()->previous() }}" class="btn btn-danger">Back</a>
         </div>
   </ul>
</div>
<div class="row">
   <div class="col-md-12">
      <div class="tile">
        <h3 class="tile-title"></h3>
        <form method="POST" action="{{ route('admin.user.store')}}" enctype="multipart/form-data" id="saveform">
          @csrf
         <div class="row">
            <!-- Basic List Group start -->
            <div class="col-md-9 mt-2">
               <div class="card">
                  <div class="card-body">
                  
                     <div class="form-row">
                        <div class="col-md-6 mb-3">
                          <label for="validationCustom02">Full Name</label>
                           <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Name" value="{{ old('name')}}">
                            @error('name')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                             </span>
                          @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="validationCustom02">Email</label>
                           <input type="email" id="email " name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Email" value="{{ old('email')}}">
                            @error('email')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                             </span>
                          @enderror
                        </div>
                     </div>
                     <div class="form-row">
                        
                        <div class="col-md-6 mb-3">
                           <label for="validationCustom04">Phone</label>
                           <input type="text" id="phone" name="phone" placeholder="Enter Phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone')}}">
                            @error('phone')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                             </span>
                          @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="validationCustom04">Password</label>
                           <input type="password" id="password" name="password" placeholder="Enter Password " class="form-control @error('password') is-invalid @enderror">
                            @error('password')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                             </span>
                          @enderror
                        </div>
                     </div>
                     
                  </div>
               </div>
            </div>
            <!-- Basic List Group end -->
            <!-- Active Items start -->
            <div class="col-md-3 mt-2">
               <div class="card">
                  <div class="card-body">
                     <div class="panel">
                        <div class="panel-body">
                           <div class="form-group">
                              <label>Role</label>
                              <select class="custom-select @error('role') is-invalid @enderror" id="role" name="role">
                                 <option value="">-- Select role --</option>
                                 <option value="admin">admin</option>
                                 <option value="subadmin">Sub Admin</option>
                                 <option value="user">User</option>
                              </select>
                              @error('role')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                             </span>
                          @enderror
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <br>
               <div class="card">
                  <div class="card-body">
                     <h4 class="header-title">Avatar</h4>
                     <hr>
                     <div class="panel mt-3">
                        <div class="panel-body">
                           <div class="form-group">
                                 <div class="position-relative mb-2">
                                    <a href="javascript:void(0)" class="closeicon" style="display:none;"> 
                                    <span class="closes">&times;</span></a>
                                    <img id="blah" src="https://i.ibb.co/4N43TL3/placeholder.jpg" alt="your image" >
                                 </div>
                                 <p class="bs-component">
                                    <label for="imgInp" class="file-upload btn btn-primary btn-block rounded-pill shadow"><i class="fa fa-upload mr-2"></i>Choose File
                                    <input id="imgInp" type="file" style="display:none;" accept="image/png, image/jpeg, image/jpg" name="userpic">
                                    </label>
                                 </p>
                              </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- Active Items end -->
         </div>
       </form>
         <div class="tile-footer">
            <button class="btn btn-primary" type="submit" id="savebtn">Submit</button>
         </div>
      </div>
   </div>
</div>
@endsection
@section('footer_scripts')
<script type="text/javascript">
   imgInp.onchange = evt => {
   const [file] = imgInp.files
   if (file) {
      blah.src = URL.createObjectURL(file);
      $(".closeicon").show();
   }
   }
   $('div').on('click', '.closeicon', function () {
         $(".closeicon").hide();
         $('#blah').prop('src', 'https://i.ibb.co/4N43TL3/placeholder.jpg');
         $('#imgInp').val("");
   });
   $(document).ready(function() {
       $( "#savebtn" ).click(function() {
         $( "#saveform" ).submit();
      });

   });
</script>
@endsection