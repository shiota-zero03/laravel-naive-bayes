@extends('theme.layout')
@section('title', 'Data Testing')
@section('content')

<style>
    table tbody {
        font-size: 12px;
    }
</style>
<div class="row">
    <div class="col-12">
        <div class="border py-3 px-md-5 px-2 mb-4">
            <h5 class="m-0">Menu / Dataset / Data Testing</h5>
        </div>
    </div>
    <div class="col-12 order-1 order-lg-2 mb-4 mb-lg-0">
        <div class="card py-2 px-3">
            <div class="card-datatable table-responsive">
                <table class="datatables-projects table border-top" id="users-table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>NIM</th>
                            <th>Jurusan</th>
                            @for($i = 1; $i < 16; $i++)
                                <th>Q{{ $i }}</th>
                            @endfor
                            <th>Rata-Rata</th>
                            <th>Hasil</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="importExcel" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Import Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-2">
                    <div class="col-12 mb-2">
                        <a target="__blank" href="{{ asset('') }}assets/file/template.xlsx" download="">
                            <div class="border border rounded p-3 mb-3">
                                <i class="fas fa-file-excel me-2 text-success"></i> Unduh template excel
                            </div>
                        </a>
                        <label class="form-label">File Excel *</label>
                        <br />
                        <label for="file" class="w-100">
                            <div class="border px-2 py-5 text-center w-100 rounded" style="cursor: pointer">
                                <i class="fas fa-cloud-arrow-up"></i><br />
                                <span id="text-excel">Upload file excel anda disini</span>
                            </div>
                        </label>
                        <input required type="file" class="form-control mt-2" id="file" name="excel_file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
                        <small class="fst-italic text-danger" id="file-error"></small>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button  id="saveDataExcel" type="button" name="excel" class="btn btn-primary">Simpan</button>
                <div class="spinner-border text-dark d-none" id="loading-save" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        $('#dataset').addClass('open')
        $('#testing').addClass('active')

        var tabel = $('#users-table').DataTable({
            ajax:{
                "url" : "{{ route('admin.testing.json') }}"
            },
            columns: [
                { data: '' },
                { data: 'nama' },
                { data: 'jenis_kelamin' },
                { data: 'nim' },
                { data: 'jurusan' },
                { data: 'q1' },
                { data: 'q2' },
                { data: 'q3' },
                { data: 'q4' },
                { data: 'q5' },
                { data: 'q6' },
                { data: 'q7' },
                { data: 'q8' },
                { data: 'q9' },
                { data: 'q10' },
                { data: 'q11' },
                { data: 'q12' },
                { data: 'q13' },
                { data: 'q14' },
                { data: 'q15' },
                { data: 'rata_rata' },
                { data: 'hasil' },
            ],
            columnDefs: [
                {
                    targets: 0,
                    searchable: false,
                    orderable: false,
                    title: 'No',
                    orderable: true,
                    render: function (data, type, full, meta) {
                        return '<div>'+(meta.row+1)+'</div>';
                    }
                },
                {
                    targets: 1,
                    searchable: false,
                    orderable: false,
                },
            ],
            dom: '<"card-header pb-0 pt-sm-0"<"head-label text-center"><"d-flex justify-content-center justify-content-md-end"f>>t<"row mx-2"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
            displayLength: 10,
        });
        $('div.head-label').html(
            '<div>'+
                '<a class="btn btn-secondary text-white border me-2">Total record: <span id="total-data">0</span></a>'+
                '<a onclick="openModal()" href="#" class="btn btn-success me-2 border"><i class="fas fa-upload me-2"></i>Import Data</a>'+
                '<a href="{{ route("admin.testing.export") }}" target="__blank" class="btn btn-primary me-2 border"><i class="fas fa-download me-2"></i>Export Data</a>'+
                '<a onclick="deleteData()" href="#" class="btn btn-danger me-2 border"><i class="fas fa-trash me-2"></i>Hapus Data</a>'+
            '</div>'
        );
        function headData(){
            $.ajax({
                method: 'GET',
                url: '{{ route("admin.testing.count") }}',
                success: function(response) {
                    $('#total-data').html(response.data)
                },
                error: function (error) {
                    console.log(error)
                }
            })
        }
        headData()
        function openModal(){
            $('#loading-save').addClass('d-none')
            $('#importExcel').modal('show')
        }
        $('#saveDataExcel').on('click', function(){
            const method = $(this).attr('name')
            $('#loading-save').removeClass('d-none')
            var dataSend = new FormData();
            dataSend.append('_token', $('meta[name="csrf-token"]').attr('content'));
            dataSend.append('excel_file', $('input[name=excel_file]').prop('files')[0])

            $.ajax({
                method: 'POST',
                url: '{{ route("admin.testing.store") }}',
                data: dataSend,
                contentType: false,
                processData:false,
                success: function (response) {
                    tabel.ajax.reload()
                    headData()
                    $('#importExcel').modal('hide')
                    $('#loading-save').addClass('d-none')
                    iziToast.success({
                        title: 'Success',
                        message: response.message,
                        position: 'bottomRight'
                    });
                },
                error: function (error) {
                    if(error.status === 422){
                        const dataError = error.responseJSON.errors;
                        if( dataError['excel_file'] ) $('#file-error').html(dataError['excel_file'][0]);
                    }
                    $('#loading-save').addClass('d-none')
                }
            })
        })

        function deleteData(){
            iziToast.question({
                title: 'Konfirmasi',
                message: 'Apakah anda ingin menghapus seluruh data ini ?',
                position: 'bottomRight',
                overlay: true,
                buttons: [
                    ['<button><b>YES</b></button>', function (instance, toast) {
                        instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');
                        handleDelete()
                    }, true],
                    ['<button>NO</button>', function (instance, toast) {
                        instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');
                    }],
                ],
            })
        }
        function handleDelete(){
            $.ajax({
                method: 'GET',
                url: '{{ route("admin.testing.delete") }}',
                success: function (response) {
                    tabel.ajax.reload()
                    headData()
                    iziToast.success({
                        title: 'Success',
                        message: response.message,
                        position: 'bottomRight'
                    });
                },
                error: function (error) {
                    console.log(error)
                }
            })
        }
        
    </script>
@endsection