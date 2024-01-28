@extends('theme.layout')
@section('title', 'Manajemen Admin')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="border py-3 px-md-5 px-2 mb-4">
            <h5 class="m-0">Menu / Manajemen Admin</h5>
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
                            <th>Email</th>
                            <th>Nomor Telp.</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="managementAdminModal" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Manajemen Admin Form</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-2">
                    <div class="col-12 mb-2">
                        <label for="name" class="form-label">Nama *</label>
                        <input type="hidden" id="id">
                        <input type="text" id="name"  class="form-control" placeholder="Masukkan Nama">
                        <small class="fst-italic text-danger" id="name-error"></small>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="email" class="form-label">Email *</label>
                        <input type="text" id="email"  class="form-control" placeholder="Masukkan Email">
                        <small class="fst-italic text-danger" id="email-error"></small>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="password" class="form-label">Password *</label>
                        <input type="password" id="password"  class="form-control" placeholder="Default: 12345678" readonly>
                        <small class="fst-italic text-danger" id="password-error"></small>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="phone_number" class="form-label">Nomor Telepon</label>
                        <input type="number" id="phone_number"  class="form-control" placeholder="Masukkan nomor telepon">
                        <small class="fst-italic text-danger" id="phone_number-error"></small>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="gender" class="form-label">Jenis Kelamin *</label>
                        <input type="text" id="gender"  class="form-control" placeholder="Masukkan jenis kelamin">
                        <small class="fst-italic text-danger" id="gender-error"></small>
                    </div>
                    <div class="col-12 mb-2">
                        <label for="address" class="form-label">Alamat</label>
                        <input type="text" id="address"  class="form-control" placeholder="Masukkan alamat">
                        <small class="fst-italic text-danger" id="address-error"></small>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" id="saveData" name="" class="btn btn-primary">Simpan</button>
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
        $('#manajemen-admin').addClass('active')

        var tabel = $('#users-table').DataTable({
            ajax:{
                "url" : "{{ route('admin.management.json') }}"
            },
            columns: [
                { data: '' },
                { data: 'name' },
                { data: 'email' },
                { data: 'phone_number' },
                { data: 'gender' },
                { data: 'address' },
                { data: 'action' }
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
        $('div.head-label').html('<div><a onclick="openModal()" href="#" class="btn btn-primary me-2 border"><i class="fas fa-plus-square me-2"></i>Tambah Data</a></div>');
        
        $('#saveData').on('click', function(){
            const method = $(this).attr('name')
            $('#loading-save').removeClass('d-none')
            clearError();

            method === '1' || method === 1 ? storeData() : updateData();
        })
        function openModal(){
            clearForm();
            clearError();
            $('#saveData').attr('name', 1)
            $('input#password').attr('readonly', true)
            $('#loading-save').addClass('d-none')
            $('#managementAdminModal').modal('show')
        }
        function showData(id){
            clearForm();
            clearError();
            $('#loading-save').addClass('d-none')
            $('#saveData').attr('name', 2)

            $.ajax({
                method: 'GET',
                url: 'admin-management/show/'+id,
                success: function (response) {
                    const data = response.data;
                    $('input#password').removeAttr('readonly')
                    $('input#id').val(data.id)
                    $('input#name').val(data.name)
                    $('input#email').val(data.email)
                    $('input#password').val(data.password)
                    $('input#phone_number').val(data.phone_number)
                    $('input#gender').val(data.gender)
                    $('input#address').val(data.address)
                    $('#managementAdminModal').modal('show')
                },
                error: function (error) {
                    console.log(error)
                }
            })
        }
        function storeData(){
            var dataSend = new FormData();
            dataSend.append('_token', $('meta[name="csrf-token"]').attr('content'));
            dataSend.append('name', $('input#name').val())
            dataSend.append('email', $('input#email').val())
            dataSend.append('password', '12345678')
            dataSend.append('phone_number', $('input#phone_number').val())
            dataSend.append('gender', $('input#gender').val())
            dataSend.append('address', $('input#address').val())

            $.ajax({
                method: 'POST',
                url: 'admin-management/store',
                data: dataSend,
                contentType: false,
                processData:false,
                success: function (response) {
                    tabel.ajax.reload()
                    $('#managementAdminModal').modal('hide')
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
                        if( dataError['name'] ) $('#name-error').html(dataError['name'][0]);
                        if( dataError['email'] ) $('#email-error').html(dataError['email'][0]);
                        if( dataError['phone_number'] ) $('#phone_number-error').html(dataError['phone_number'][0]);
                        if( dataError['gender'] ) $('#gender-error').html(dataError['gender'][0]);
                        if( dataError['address'] ) $('#address-error').html(dataError['address'][0]);
                    }
                    $('#loading-save').addClass('d-none')
                }
            })
        }
        function updateData(){
            var dataSend = new FormData();
            dataSend.append('_token', $('meta[name="csrf-token"]').attr('content'));
            dataSend.append('id', $('input#id').val())
            dataSend.append('name', $('input#name').val())
            dataSend.append('email', $('input#email').val())
            dataSend.append('password', $('input#password').val())
            dataSend.append('phone_number', $('input#phone_number').val())
            dataSend.append('gender', $('input#gender').val())
            dataSend.append('address', $('input#address').val())

            $.ajax({
                method: 'POST',
                url: 'admin-management/update',
                data: dataSend,
                contentType: false,
                processData:false,
                success: function (response) {
                    tabel.ajax.reload()
                    $('#managementAdminModal').modal('hide')
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
                        if( dataError['name'] ) $('#name-error').html(dataError['name'][0]);
                        if( dataError['email'] ) $('#email-error').html(dataError['email'][0]);
                        if( dataError['password'] ) $('#password-error').html(dataError['password'][0]);
                        if( dataError['phone_number'] ) $('#phone_number-error').html(dataError['phone_number'][0]);
                        if( dataError['gender'] ) $('#gender-error').html(dataError['gender'][0]);
                        if( dataError['address'] ) $('#address-error').html(dataError['address'][0]);
                    }
                    $('#loading-save').addClass('d-none')
                }
            })
        }
        function deleteData(id){
            iziToast.question({
                title: 'Konfirmasi',
                message: 'Apakah anda ingin menghapus data ini ?',
                position: 'bottomRight',
                overlay: true,
                buttons: [
                    ['<button><b>YES</b></button>', function (instance, toast) {
                        instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');
                        handleDelete(id)
                    }, true],
                    ['<button>NO</button>', function (instance, toast) {
                        instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');
                    }],
                ],
            })
        }
        function handleDelete(id){
            $.ajax({
                method: 'GET',
                url: 'admin-management/delete/'+id,
                success: function (response) {
                    tabel.ajax.reload()
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

        function clearForm(){
            $('input#id').val('')
            $('input#name').val('')
            $('input#email').val('')
            $('input#password').val('')
            $('input#phone_number').val('')
            $('input#gender').val('')
            $('input#address').val('')
        }
        function clearError(){
            $('#name-error').html('')
            $('#email-error').html('')
            $('#password-error').html('')
            $('#phone_number-error').html('')
            $('#gender-error').html('')
            $('#address-error').html('')
        }
        
    </script>
@endsection