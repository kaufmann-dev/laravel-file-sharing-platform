@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <table class="table table-striped">
                <thead>
                <tr>
                    <th>File</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>

                @php

                $files = DB::table("files")->where("user_id", Auth::id())->get();

                foreach ($files as $file)
                {
                    @endphp

                    <tr>
                        <td>
                            {{ $file->name }}
                        </td>
                        <td>{{ date("d.m.Y G:i", strtotime($file->created_at)) }}</td>
                        <td>
                            <a href="{{ route('download', ['file' => $file->id]) }}" class="btn btn-success btn-sm">Download</a>
                            <a href="{{ route('delete', ['file' => $file->id]) }}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>

                    @php
                }

                @endphp

                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection
