@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="table table-striped" id="dataTable">
                <thead>
                    <th onclick="sortTableName(0)">File  <img src="{{ asset('vendor/blade-lucide-icons/arrow-up-down.svg') }}" width="18" height="18"/>
                    <th onclick="sortTableName(1)">Type  <img src="{{ asset('vendor/blade-lucide-icons/arrow-up-down.svg') }}" width="18" height="18"/>
                    <th>Size</th></th>
                    <th>Date</th>
                    <th>Actions</th>
                    </tr>
                </thead>
                <tbody>


                @php

                $files = DB::table("files")->where("user_id", Auth::id())->get();

                if($files->count() == 0)
                {
                    @endphp

                    <tr>
                        <td colspan="3" class="text-center">No files found · <a href="{{ route('fileUpload') }}">Start uploading</a></td>
                    </tr>

                    @php
                }



                foreach ($files as $file)
                {

                    @endphp

                    <tr>
                        <td>
                            {{ $file->name }}
                        </td>
                        <td>@php
                                if (file_exists("../storage/app/public/uploads/")) {

                                      foreach (scandir("../storage/app/public/uploads/") as $fileExt) {
                                            $fileinfo[] = pathinfo('../storage/app/public/uploads/'."/".$fileExt);
                                       }

                                       foreach ($fileinfo as $item){
                                           if ($item['basename'] == $file->name){
                                                print_r($item['extension']);
                                                break;

                                           }
                                       }
 }

                        @endphp</td>
                        <td>{{ $file->file_size }} Bytes</td>
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
            <script>
                function sortTableName(n) {
                    var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
                    table = document.getElementById("dataTable");
                    switching = true;
                    dir = "asc";
                    while (switching) {
                        switching = false;
                        rows = table.rows;
                        // Loop through all table rows starting at 2nd row
                        for (i = 1; i < (rows.length - 1); i++) {
                            // Start by saying there should be no switching:
                            shouldSwitch = false;
                            x = rows[i].getElementsByTagName("TD")[n];
                            y = rows[i + 1].getElementsByTagName("TD")[n];

                            if (dir == "asc") {
                                if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                                    // If so, mark as a switch and break the loop:
                                    shouldSwitch = true;
                                    break;
                                }
                            } else if (dir == "desc") {
                                if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                                    // If so, mark as a switch and break the loop:
                                    shouldSwitch = true;
                                    break;
                                }
                            }
                        }
                        if (shouldSwitch) {
                            // If a switch has been marked, make the switch and mark that a switch has been done:
                            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                            switching = true;
                            // Each time a switch is done, increase this count by 1:
                            switchcount++;
                        } else {
                            if (switchcount == 0 && dir == "asc") {
                                dir = "desc";
                                switching = true;
                            }
                        }
                    }
                }
            </script>

        </div>
    </div>

    <div>

    </div>

</div>
@endsection
