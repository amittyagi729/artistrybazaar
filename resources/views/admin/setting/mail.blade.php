@extends('admin.layouts.master')
@section('title') Email Setting @endsection 
@section('meta_description') Email Setting @endsection 
@section('content')
<div class="app-title">
   <div>
      <h1><i class="fa fa-edit"></i> Email setting</h1>
      <p>Email setting</p>
   </div>
   <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">Email setting</li>
      <li class="breadcrumb-item"><a href="#">Email setting</a></li>
   </ul>
</div>
<div class="row">
   <div class="col-md-12">
      <div class="tile">
         <h3 class="tile-title">Email setting</h3>
         <div class="tile-body">
            @if(!empty($mail->id))
            <form class="row" action="{{ route('admin.mail.update',$mail->id)}}" method="POST" id="mailform">
               @csrf
               @method('put')      
               <div class="form-group col-md-6">
                  <label class="control-label">{{__('Email Settings')}}</label>
                  <select id="selectSm" name="mail_transport" class="form-control">
                  <option value="smtp" {{ $mail->mail_transport == 'smtp' ? 'selected="selected"' : '' }}>SMTP</option>
                  <option value="sendmail" {{ $mail->mail_transport == 'sendmail' ? 'selected="selected"' : '' }}>SENDMAIL</option>
                  <option value="mailgun" {{ $mail->mail_transport == 'mailgun' ? 'selected="selected"' : '' }}>MAILGUN</option>
                  <option value="ses" {{ $mail->mail_transport == 'ses' ? 'selected="selected"' : '' }}>SES</option>
                  <option value="sparkpost" {{ $mail->mail_transport == 'sparkpost' ? 'selected="selected"' : '' }}>SPARKPOST</option>
                  <option value="postmark" {{ $mail->mail_transport == 'postmark' ? 'selected="selected"' : '' }}>POSTMARK</option>
                  <option value="log" {{ $mail->mail_transport == 'log' ? 'selected="selected"' : '' }}>LOG</option>
                  <option value="array" {{ $mail->mail_transport == 'array' ? 'selected="selected"' : '' }}>ARRAY</option>
                  </select>
               </div>
               <div class="form-group col-md-6">
                  <label for="control-label">{{__('Email Host')}}</label>
                  <input type="text" id="mail_host" name="mail_host" class="form-control" value="{{ old('mail_host',$mail->mail_host) }}">
                  @error('mail_host')
                  <small class="form-text" style="color:red;font-weight: 600;font-size: 14px;">{{ $message }}</small>
                  @enderror
               </div>
               <div class="form-group col-md-6">
                  <label for="control-label">{{__('Email Port')}}</label>
                  <input type="text" id="mail_port" name="mail_port" class="form-control" value="{{ old('mail_port',$mail->mail_port) }}">
                  @error('mail_port')
                  <small class="form-text" style="color:red;font-weight: 600;font-size: 14px;">{{ $message }}</small>
                  @enderror
               </div>
               <div class="form-group col-md-6">
                  <label for="control-label">{{__('Email Encryption')}}</label>
                  <select id="mail_encryption" name="mail_encryption" class="form-control">
                  <option value="tls" {{ $mail->mail_encryption == 'tls' ? 'selected="selected"' : '' }}>TLS</option>
                  <option value="ssl" {{ $mail->mail_encryption == 'ssl' ? 'selected="selected"' : '' }} >SSL</option>
                  </select>
               </div>
               <div class="form-group col-md-6">
                  <label for="control-label">{{__('Email Username')}}</label>
                  <input type="text" id="mail_username" name="mail_username" value="{{ old('mail_username',$mail->mail_username) }}" class="form-control">
                  @error('mail_username')
                  <small class="form-text" style="color:red;font-weight: 600;font-size: 14px;">{{ $message }}</small>
                  @enderror
               </div>
               <div class="form-group col-md-6">
                  <label for="control-label">{{__('Email Password')}}</label>
                  <input type="password" id="mail_password" name="mail_password" value="{{ old('mail_password',$mail->mail_password) }}" class="form-control">
                  @error('mail_password')
                  <small class="form-text" style="color:red;font-weight: 600;font-size: 14px;">{{ $message }}</small>
                  @enderror
               </div>
               <div class="form-group col-md-6">
                  <label for="control-label">{{__('Email Address')}}</label>
                  <input type="email" id="mail_from" name="mail_from" value="{{ old('mail_from',$mail->mail_from) }}" class="form-control">
                  @error('mail_from')
                  <small class="form-text" style="color:red;font-weight: 600;font-size: 14px;">{{ $message }}</small>
                  @enderror
               </div>
            </form>
           
         </div>
         <div class="tile-footer">
            <button class="btn btn-primary" type="button" id="mailbtn"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
         </div>
         @endif
      </div>
   </div>
</div>
@endsection

@section('footer_scripts')
<script>
   $(document).ready(function(){
       $( "#mailbtn" ).click(function() {
        $( "#mailform" ).submit();
      });
 });
</script>
@stop