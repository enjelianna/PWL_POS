@extends('layouts.template')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                <a class="btn btn-sm btn-primary mt-1" href="{{ url('level/create') }}">Tambah</a>
                <button onclick="modalAction('{{ url('level/create_ajax') }}')" class="btn btn-sm btn-success mt-1">Tambah Ajax</button>
            </div>
        </div>
        <div class="card-body">
            @if (@session('success'))
                <div class="alert alert-success">{{ session('success')}}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{session('error')}}</div>
            @endif
            <table class="table table-bordered table-striped table-hover table-sm" id="table_level">
                <thead>
                    <tr>
                        <th >ID</th>
                        <th>Kode</th>
                        <th >Nama</th>
                        <th >Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <div id="myModal" class="modal fade animate shake" tabindex="-1" role="dialog" 
    data-backdrop="static" data-keyboard="false" data-width="75%" aria-hidden="true"></div>
@endsection
@push('css')
@endpush
@push('js')
    <script>
        // $(document).ready(function() {
        //     var dataUser = $('#table_user').DataTable({
        //         // serverSide: true, jika ingin menggunakan server side processing
        //         serverSide: true,
        //         ajax: {
        //             "url": "{{ url('level/list') }}",
        //             "dataType": "json",
        //             "type": "POST",
        //             "data": function (d){
        //                 d.level_id = $('#level_id').val();
        //             }
        //         },
        function modalAction(url = '') {
            $('#myModal').load(url, function() {
                $('#myModal').modal('show');
            });
        }

        var dataLevel;
		$(document).ready(function() {
			 dataLevel = $('#table_level').DataTable({
				// serverSide: true, jika ingin menggunakan server side processing
				serverSide: true,
				ajax: {
					"url": "{{ url('level/list') }}",
					"dataType": "json",
					"type": "POST"
				},
                columns: [{
                    // nomor urut dari laravel datatable addIndexColumn()
                    data: "DT_RowIndex",
                    className: "text-center",
                    orderable: false,
                    searchable: false
                }, {
                    data: "level_kode",
                    className: "",
                    orderable: true,
                    searchable: true
                },{
                    data: "level_nama",
                    className: "",
                    orderable: true,
                    searchable: true
                }, {
                    data: "aksi",
                    className: "",
                    orderable: false,
                    searchable: false
                }]
            });
            $('#level_id').on('change',function(){
                dataLevel.ajax.reload();
            })
        });
    </script>
@endpush