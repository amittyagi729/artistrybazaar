@extends('admin.layouts.master')
@section('title') Currency @endsection 
@section('meta_description') Currency  @endsection 
@section('content')
<div class="app-title">
   <div>
      <h1><i class="fa fa-edit"></i> Currency</h1>
      <p>Currency</p>
   </div>
   <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">Currency</li>
      <li class="breadcrumb-item"><a href="#">Currency</a></li>
   </ul>
</div>
<div class="row">
   <div class="col-md-12">
      <div class="tile">
         <h3 class="tile-title">Currency</h3>
         <div class="tile-body">
            <form action="{{ url('admin/setting/currency')}}" method="POST" id="Currencyform">
               @csrf  
             
               <div class="form-group col-md-6">
                  <label for="control-label">{{__('Currency')}}</label>
                  <select id="currency" name="currency" class="form-control @error('currency') is-invalid @enderror">
                  <option value="$" {{ $settings->val == '$' ? 'selected="selected"' : '' }}>Dollar ($)</option>
                  <option value="€" {{ $settings->val == '€' ? 'selected="selected"' : '' }} >EUR (€)</option>
                  </select>
                  
                  @error('currency')
                  <small class="form-text" style="color:red;font-weight: 600;font-size: 14px;">{{ $message }}</small>
                  @enderror
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
        $( "#Currencyform" ).submit();
      });
 });
</script>
@stop