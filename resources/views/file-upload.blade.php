@extends('layouts.app')

@section("content")
    <div class="container w-25 mt-5">
        <form action="{{ route('fileUpload') }}" method="post" enctype="multipart/form-data">
            <h3 class="text-center mb-5">Upload</h3>
            @csrf
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="custom-file">
                <input type="file" name="file" class="form-control" id="formFile">
            </div>
                <a href="{{ route('home') }}" class="btn btn-secondary mt-4">
                    Home
                </a>
                <button type="submit" name="submit" class="btn btn-primary mt-4">
                    Upload
                </button>
        </form>
    </div>
@endsection
