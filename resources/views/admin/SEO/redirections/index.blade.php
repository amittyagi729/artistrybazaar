@extends('admin.SEO.layouts.master')
@section('title')Category list @endsection
@section('content')

<div class="container mt-5">
    <h2>Redirection URLs</h2>

    <!-- Add Redirection Form -->
    <div class="mb-3">
        <h4>Add Redirection</h4>
        <form action="{{ route('seo.redirection.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="redirect_from">Redirect From</label>
                <input type="text" class="form-control" id="redirect_from" name="redirect_from" required>
            </div>
            <div class="form-group">
                <label for="redirect_to">Redirect To</label>
                <input type="text" class="form-control" id="redirect_to" name="redirect_to" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Redirection</button>
        </form>
    </div>

    <!-- Display Redirections Table -->
    <div>
        <h4>Redirections</h4>
        <table class="table">
            <thead>
                <tr>
                    <th>Redirect From</th>
                    <th>Redirect To</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($redirections as $redirection)
                <tr>
                    <td>
                        <a href={{ $redirection->redirect_from }} target="_blank">
                            <i class="fa fa-external-link"></i> {{ $redirection->redirect_from }}
                        </a>
                    </td>
                    <td>
                        <a href="{{ $redirection->redirect_to }}" target="_blank">
                            <i class="fa fa-external-link"></i> {{ $redirection->redirect_to }}
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('seo.redirection.edit', $redirection->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('seo.redirection.destroy', $redirection->id) }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this redirection?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
