@extends('admin.layouts.master')
@section('title') Scripts @endsection 
@section('meta_description') Scripts @endsection 
@section('content')
<div class="app-title">
   <div>
      <h1><i class="fa fa-edit"></i>Scripts</h1>
      <p>Scripts</p>
   </div>
   <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">Scripts</li>
      <li class="breadcrumb-item"><a href="#">Scripts</a></li>
   </ul>
</div>
<div class="row">
   <div class="col-md-12">
      <div class="tile">
         <div class="tile-body">
            <form action="#" method="POST" id="cinfoform">
               @csrf  
               <div class="row">
                  <!-- Basic List Group start -->
                  <div class="col-md-9 mt-2">
                     <div class="form-group">
                        <label for="exampleTextarea">Header Script <b>(Only Script add)</b></label>
                        <textarea class="form-control" id="exampleTextarea" rows="20" name="header_script" style="background: black;color: #fff;">{{ $settings->val }}</textarea>
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
</script>
@stop