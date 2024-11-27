@extends('layouts.a_template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools">
            <button onclick="modalAction('{{ url('aManageBidKom/create_ajax') }}')" class="btn btn-sm btn-success mt-1">Tambah</button>
        </div>
    </div>
    <div class="card-body">
        @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <table class="table table-bordered table-striped table-hover table-sm" id="table_mabidkom">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Bidang Kompetensi</th>
                    <th>Tag Bidang Kompetensi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
<div id="myModal" class="modal fade animate shake" tabindex="-1" role="dialog" data backdrop="static"
    data-keyboard="false" data-width="75%" aria-hidden="true"></div>
@endsection


@push('js')
<script>
    function modalAction(url = '') {
        $('#myModal').load(url, function() {
            $('#myModal').modal('show');
        });
    }

    var dataUser;
    $(document).ready(function() {
        dataUser = $('#table_mabidkom').DataTable({
            // serverSide: true, jika ingin menggunakan server side processing 
            serverSide: true,
            ajax: {
                "url": "{{ url('aManageBidKom/list') }}",
                "dataType": "json",
                "type": "POST",
                "data": function(d) {
                    d.bidkom_id = $('#bidkom_id').val();
                }
            },
            columns: [{
                // nomor urut dari laravel datatable addIndexColumn() 
                data: "DT_RowIndex",
                className: "text-center",
                orderable: false,
                searchable: false
            }, {
                data: "nama_bidkom",
                className: "",
                // orderable: true, jika ingin kolom ini bisa diurutkan  
                orderable: true,
                // searchable: true, jika ingin kolom ini bisa dicari 
                searchable: true
            }, {
                data: "tag_bidkom",
                className: "",
                orderable: false,
                searchable: true
            }, {
                data: "aksi",
                className: "text-center",
                orderable: false,
                searchable: false
            }]
        });
    });

    $('#level_id').on('change', function() {
        dataUser.ajax.reload();
    });
</script>
@endpush