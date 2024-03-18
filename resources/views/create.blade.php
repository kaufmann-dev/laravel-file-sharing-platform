<!DOCTYPE html>
<html>
<head>
    <title>Laravel File Uploading Tutorial</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">



    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif

    <h3>Laravel File Uploading</h3>

    <form action="{{ route('file.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label>File</label>
            <input type="file" class="form-control" name="file" id="file">
        </div>

        <input type="submit" name="submit" value="Submit" class="btn btn-dark">

    </form>
</div>
</body>

</html>
