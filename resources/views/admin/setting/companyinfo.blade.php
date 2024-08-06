@extends('admin.layouts.master')
@section('title') Company Information @endsection 
@section('meta_description') Company Information @endsection 
@section('content')
<div class="app-title">
   <div>
      <h1><i class="fa fa-edit"></i> Company Information</h1>
      <p>Company Information</p>
   </div>
   <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">Company Information</li>
      <li class="breadcrumb-item"><a href="#">Company Information</a></li>
   </ul>
</div>
<div class="row">
   <div class="col-md-12">
      <div class="tile">
         <h3 class="tile-title">Company Information</h3>
         <div class="tile-body">
            <form action="{{ url('admin/setting/companyinfo')}}" method="POST" id="cinfoform" enctype="multipart/form-data">
               @csrf  
             
             <div class="row">
            <!-- Basic List Group start -->
            <div class="col-md-9 mt-2">

                <div class="card">
                  <div class="card-body">
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                           <label for="control-label">{{__('Address')}}</label>
                              <input type="text" id="address" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ isset($data['c_address'])? $data['c_address'] : ''; }}">
                              @error('address')
                              <small class="form-text" style="color:red;font-weight: 600;font-size: 14px;">{{ $message }}</small>
                              @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="control-label">{{__('City')}}</label>
                           <input type="text" id="city" name="city" class="form-control @error('city') is-invalid @enderror" value="{{ isset($data['c_city'])? $data['c_city'] : ''; }}">
                           @error('city')
                           <small class="form-text" style="color:red;font-weight: 600;font-size: 14px;">{{ $message }}</small>
                           @enderror
                        </div>
                     </div>


                     <div class="form-row">
                        <div class="col-md-6 mb-3">
                           <label for="control-label">{{__('Zip')}}</label>
                              <input type="text" id="zip" name="zip" class="form-control @error('zip') is-invalid @enderror" value="{{ isset($data['c_zip'])? $data['c_zip'] : ''; }}">
                              @error('zip')
                              <small class="form-text" style="color:red;font-weight: 600;font-size: 14px;">{{ $message }}</small>
                              @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="control-label">{{__('Phone Number')}}</label>
                              <input type="text" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ isset($data['c_phone'])? $data['c_phone'] : ''; }}">
                              @error('phone')
                              <small class="form-text" style="color:red;font-weight: 600;font-size: 14px;">{{ $message }}</small>
                              @enderror
                        </div>
                     </div>


                     <div class="form-row">
                        
                        <div class="col-md-6 mb-3">
                           <label for="control-label">{{__('Email')}}</label>
                           <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ isset($data['c_email'])? $data['c_email'] : ''; }}">
                           @error('email')
                           <small class="form-text" style="color:red;font-weight: 600;font-size: 14px;">{{ $message }}</small>
                           @enderror
                        </div>
                     </div>
                  </div>
               </div>
             

               
              </div>

              <div class="col-md-3 mt-2">
               <div class="card">
                     <div class="card-body">
                        <h4 class="header-title">Site Logo </h4>
                        <hr>
                        <div class="panel mt-2">
                           <div class="panel-body">
                              <div class="form-group">
                                <div class="circles">
                                  <div class="position-relative mt-3">
                                 <?php if(!empty($data['c_logo'])){ ?>
                                       <img class="profile-pic" id="blah" src="<?php echo url('/');?>/public/assets/images/{{ isset($data['c_logo'])? $data['c_logo'] : ''; }}">
                                       <input type="hidden" accept="image/png, image/jpeg, image/jpg" name="oldimg" value="{{ isset($data['c_logo'])? $data['c_logo'] : ''; }}">
                                 <?php } else { ?>
                                       <img id="blah" src="https://i.ibb.co/4N43TL3/placeholder.jpg" alt="your image">
                                  <?php } ?>
                                 </div> 
                                 </div>
                                 <p class="bs-component mt-2">
                                    <label for="imgInp" class="btn btn-primary btn-block rounded-pill shadow"><i class="fa fa-upload mr-2"></i>Choose File
                                    <input id="imgInp" type="file" style="display:none;" accept="image/png, image/jpeg, image/jpg, image/svg+xml" name="logo">
                                    </label>
                                 </p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
            </div>
           </div>

           
              
              
            </form>
         </div>
         <div class="tile-footer">
            <button class="btn btn-primary" type="button" id="companyinfobtn"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
         </div>
      </div>
   </div>
</div>
@endsection

@section('footer_scripts')
<script>
   $(document).ready(function(){
       $( "#companyinfobtn" ).click(function() {
        $( "#cinfoform" ).submit();
      });
 });
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
</script>
@stop