@extends('layouts.app')

@section("content")
    <div class="container w-25 mt-5">
        <form action="{{ route('fileUpload') }}" method="post" enctype="multipart/form-data">
            <h3 class="text-center mb-5">Upload File in Laravel</h3>
            @csrf
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="custom-file">
                <input type="file" name="file" class="form-control" id="formFile">
            </div>
            @if($message = Session::get("success"))
                <a href="{{ route('home') }}" class="btn btn-secondary mt-4">
                    Go back to dashboard
                </a>
            @else
                <button type="submit" name="submit" class="btn btn-primary mt-4">
                    Upload Files
                </button>
            @endif
        </form>
    </div>
@endsection
