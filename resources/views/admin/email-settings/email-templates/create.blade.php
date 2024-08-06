@extends('admin.layouts.master')
@section('title')New Email Template @endsection
@section('content')
<div class="form-row">
    <form action="{{ url('/admin/email/templates/store') }}" method="post">
        @csrf
    <div class="container-fluid">
		<div class="row">
			<div class="col-xl-4 col-lg-4 col-md-6 col-12 cus-form-group">
				<div class="form-group bmd-form-group is-filled">
					<label class="bmd-label-floating">Name</label>
					<input type="text" name="name" class="form-control required">                            
				</div>
				<div class="form-group bmd-form-group is-filled">
					<label class="bmd-label-floating">Allowed Vars</label>
					<input type="text" name="allowed_vars" class="form-control required">                             
					
				</div>
				<div class="form-group bmd-form-group is-filled">
					<label class="bmd-label-floating">Subject</label>
					<input type="text" name="subject" class="form-control required" >                                
				</div>						
			</div>
			<div class="col-xl-4 col-lg-4 col-md-6 col-12 cus-form-group">
				<div class="form-group bmd-form-group is-filled">
					<label class="bmd-label-floating">Title</label>
					<input type="text" name="title" class="form-control required" >                                   
				</div>
				<div class="form-group bmd-form-group is-filled">
					<label class="bmd-label-floating">From</label>
					<input type="text" name="from" class="form-control required">                                
				</div>
			</div>
            <div class="col-md-12 mb-3">
                <label for="validationCustom02">Body</label>
                <textarea cols="80" id="description1" name="description" class="editortextarea" rows="20">{{ old('description')}}</textarea>
             </div>
		</div>   
        <div class="form-group">
            <div class="form-check">
              <input type="checkbox" checked class="form-check-input" name="is_active" value="1"
              id="is_active">
          <label class="form-check-label" for="is_active">Active</label>
            </div>
        </div>                  
	</div>
    <x-submit-button text="Submit" />
    </form>
 </div>
@endsection