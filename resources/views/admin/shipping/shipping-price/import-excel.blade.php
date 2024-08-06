@extends('admin.layouts.master')
@section('title')
    Import Excel
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="header-title mb-4">Import Excel</h4>
            <form method="post" action="{{ url('/admin/shipping/price/store_excel') }}" class="form-horizontal"
                enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlFile1">Upload Products</label>
                    <input type="file" name="file" class="form-control-file" id="exampleFormControlFile1">
                  </div>
                <div class="form-group">
                    <div style="text-align:center;" class="text-left">
                        <div class="d-flex align-items-center">
                            <button class="btn btn-primary" type="submit" id=""
                                placeholder="">Submit</button>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    </form>
    </div>
    </div>
@endsection
