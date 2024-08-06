@extends('admin.layouts.master')
@section('title') Page Edit @endsection
@section('content')
<div class="app-title">
   <div>
      <h1><i class="fa fa-edit"></i> Page</h1>
      <p>Page</p>
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
         <h3 class="tile-title">Edit Page</h3>
         <form method="POST" action="{{ route('admin.page.update', $pages->id)}}" enctype="multipart/form-data" id="saveform">
            @csrf
            {{ method_field('PUT') }}
            <div class="row">
               <!-- Basic List Group start -->
               <div class="col-md-9 mt-2">
                  <div class="card">
                     <div class="card-body">
                        <div class="form-row">
                           <div class="col-md-6 mb-3">
                              <label for="validationCustom02">Title</label>
                              <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Enter title" value="{{ $pages->title }}" onkeyup="convertToSlug_en(this.value)">
                              @error('title')
                              <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                              <span><strong>Permalinks:</strong> <a href="{{ url('/page/'.$pages->slug)}}" target="_blank" style="color:blue;">{{ url('/page/'.$pages->slug)}}</a></span>
                           </div>
                           <div class="col-md-6 mb-3">
                              <label for="validationCustom02">Slug</label>
                              <input type="text" name="slug" class="slug form-control @error('slug') is-invalid @enderror" placeholder="Enter slug" value="{{ $pages->slug }}">
                              @error('slug')
                              <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                           </div>
                        </div>
                        <div class="form-row">
                           <div class="col-md-12 mb-3">
                              <label for="validationCustom02">Description</label>
                              <textarea cols="80" id="description1" name="description" rows="20" class="editortextarea">{{ $pages->description }}</textarea>
                           </div>
                        </div>
                        <h2 style="font-size: 25px;font-weight: bold;">Seo Manager:</h2>
                        <br>
                        <div class="form-row">
                           <div class="col-md-6 mb-3">
                              <label for="validationCustom04">Meta Title</label>
                              <input type="text" name="meta_title" placeholder="Enter Meta Title" class="form-control" value="{{ $pages->meta_title }}">
                           </div>
                           <div class="col-md-6 mb-3">
                              <label for="validationCustom02">Meta Description</label>
                              <input type="text" id="meta_description " name="meta_description" class="form-control" placeholder="Enter Meta Description" value="{{ $pages->meta_description }}">
                           </div>
                        </div>
                        <div class="form-row">
                           <div class="col-md-12 mb-3">
                              <label for="validationCustom02">Meta Keyword (Ex: keyword1, keyword2...)</label>
                              <input type="text" id="meta_keyword" name="meta_keyword" placeholder="Enter Meta Keywords" class="form-control" value="{{ $pages->meta_keyword }}">
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
                                 <label>Status</label>
                                 <select required="" class="custom-select" name="status">
                                 <option value="1" {{ ( $pages->status == 1) ? 'selected' : '' }}>Publish</option>
                                 <option value="0" {{ ( $pages->status == 0) ? 'selected' : '' }}>Draft</option>
                                 </select>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <br>
                  <div class="card">
                     <div class="card-body">
                        <h4 class="header-title">Featured Image</h4>
                        <hr>
                        <div class="panel mt-2">
                           <div class="panel-body">
                              <div class="form-group">
                                 <div class="circles">
                                    <div class="position-relative">
                                       <?php if(!empty($pages->image)){ ?>
                                       <a href="{{ url('/admin/page/removeimage/'.base64_encode($pages->id))}}" class="removeimage">
                                       <span class="closes">&times;</span></a>
                                       <img style="height: 123px;width: 160px;" class="profile-pic" id="blah" src="<?php echo url('/');?>/public/assets/uploads/banners/{{$pages->image}}">
                                       <input type="hidden" accept="image/png, image/jpeg, image/jpg" name="oldpic" value="{{ $pages->image}}">
                                       <?php } else { ?>
                                       <a href="javascript:void(0)" class="closeicon" style="display:none;"> 
                                       <span class="closes">&times;</span></a>
                                       <img id="blah" src="https://i.ibb.co/4N43TL3/placeholder.jpg" alt="your image" />
                                       <?php } ?>
                                    </div>
                                 </div>
                                 <p class="bs-component mt-2">
                                    <label for="imgInp" class="file-upload btn btn-primary btn-block rounded-pill shadow"><i class="fa fa-upload mr-2"></i>Choose File
                                    <input id="imgInp" type="file" style="display:none;" accept="image/png, image/jpeg, image/jpg" name="bannerpic">
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
   
   $(document).ready(function () {
       $("#savebtn").click(function () {
          $("#saveform").submit();
       });
   });   
</script>
@endsection