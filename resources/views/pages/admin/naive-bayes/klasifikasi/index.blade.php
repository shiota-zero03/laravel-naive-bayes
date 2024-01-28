@extends('theme.layout')
@section('title', 'Klasifikasi Data')
@section('content')

<style>
    table tbody {
        font-size: 12px;
    }
</style>
<div class="row">
    <div class="col-12">
        <div class="border py-3 px-md-5 px-2 mb-4">
            <h5 class="m-0">Menu / Naive Bayes / Klasifikasi Data</h5>
        </div>
    </div>
    <div class="col-12 order-1 order-lg-2 mb-4 mb-lg-0">
        <a href="{{route('admin.classification.store')}}" class="btn btn-primary d-flex align-items-center justify-content-center w-100"><i class="bx bx-calculator me-3"></i>Hitung Klasifikasi</a>
        <br>
        <div class="card py-2 px-3">
            <div class="card-datatable table-responsive">
                <table class="datatables-projects table border-top" id="users-table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>CUKUP PUAS</th>
                            <th>PUAS</th>
                            <th>TIDAK PUAS</th>
                            <th>KELAS PREDIKSI</th>
                            <th>KELAS ASLI</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        $('#naive-bayes').addClass('open')
        $('#classification').addClass('active')

        var tabel = $('#users-table').DataTable({
            ajax:{
                "url" : "{{ route('admin.classification.json') }}"
            },
            columns: [
                { data: '' },
                { data: 'cukup_puas' },
                { data: 'puas' },
                { data: 'tidak_puas' },
                { data: 'kelas_prediksi' },
                { data: 'kelas_asli' },
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
            displayLength: 10,
        });
    </script>
@endsection