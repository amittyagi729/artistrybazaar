@extends('admin.SEO.layouts.master')
@section('title')Category list @endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Redirection</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('seo.redirection.update', $redirection->id) }}">
                        @csrf

                        <div class="form-group">
                            <label for="redirect_from">Redirect From</label>
                            <input id="redirect_from" type="text" class="form-control @error('redirect_from') is-invalid @enderror" name="redirect_from" value="{{ old('redirect_from', $redirection->redirect_from) }}" required autofocus>
                            @error('redirect_from')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="redirect_to">Redirect To</label>
                            <input id="redirect_to" type="text" class="form-control @error('redirect_to') is-invalid @enderror" name="redirect_to" value="{{ old('redirect_to', $redirection->redirect_to) }}" required>
                            @error('redirect_to')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Update Redirection</button>
                        <a href="{{ route('seo.redirection.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
