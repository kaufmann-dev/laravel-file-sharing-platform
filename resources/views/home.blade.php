@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Uploaded at</th>
                </tr>
                </thead>
                <tbody>

                @php

                $files = DB::table("files")->get();

                foreach ($files as $file)
                {
                    @endphp

                    <tr>
                        <td>{{ $file->id }}</td>
                        <td>
                            <a href="{{ route("download", ["file" => $file->name]) }}">{{ $file->name }}</a>
                        </td>
                        <td>{{ date("d.m.Y G:i", strtotime($file->created_at)) }}</td>
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
