@extends('theme.layout')
@section('title', 'Profile')
@section('content')

<div class="row">
    <div class="col-12">
      <div class="border py-3 px-md-5 px-2 mb-4">
        <h5 class="m-0">Menu / Profile</h5>
      </div>
    </div>
    <div class="col-12 order-1 order-lg-2 mb-4 mb-lg-0">
      <div class="card">
        <div class="m-md-5 m-3">
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row mx-md-0 mx-3">
                    <h3 class="text-md-start text-center">{{ auth()->user()->name }}</h3>
                    <hr color="black">
                    <div class="col-md-3">
                        <img src="@if(auth()->user()->photo_profile) {{ auth()->user()->photo_profile }} @else{{ asset('') }}assets/img/profile-picture.png @endif" alt="profile_picture" class="w-100" id="picture-show">
                        <small id="name-of-picture"></small>
                        <div class="form-group mt-3">
                            <label for="photo_profile" class="bg-info w-100 py-2 rounded text-center text-white" style="cursor: pointer">
                                <input id="photo_profile" name="photo_profile" type="file" class="form-control d-none" accept="image/*">
                                <i class="fas fa-upload me-2"></i> Upload Foto Profil *
                            </label>
                            @error('photo_profile')<small class="text-danger"><em>{{$message}}</em></small>@enderror
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <div class="form-group">
                                    <strong>Nama <i class="text-danger me-2">*</i> :</strong>
                                    <div class="input-group input-group-outline">
                                        <input type="text" name="name" id="name" class="form-control" value="{{ auth()->user()->name }}" >
                                    </div>
                                    @error('name')<small class="text-danger"><em>{{$message}}</em></small>@enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <div class="form-group">
                                    <strong>Email <i class="text-danger me-2">*</i> :</strong>
                                    <div class="input-group input-group-outline">
                                        <input type="email" name="email" id="email" class="form-control" value="{{ auth()->user()->email }}" >
                                    </div>
                                    @error('email')<small class="text-danger"><em>{{$message}}</em></small>@enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <div class="form-group">
                                    <strong>Password <i class="text-danger me-2">*</i> :</strong>
                                    <div class="input-group input-group-outline">
                                        <input type="password" name="password" id="password" class="form-control" value="{{ auth()->user()->password }}" >
                                    </div>
                                    @error('password')<small class="text-danger"><em>{{$message}}</em></small>@enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <div class="form-group">
                                    <strong>Nomor Handphone <i class="text-danger me-2">*</i> :</strong>
                                    <div class="input-group input-group-outline">
                                        <input type="number" name="phone_number" id="phone_number" class="form-control" value="{{ auth()->user()->phone_number }}" >
                                    </div>
                                </div>
                                @error('phone_number')<small class="text-danger"><em>{{$message}}</em></small>@enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <div class="form-group">
                                    <strong>Jenis Kelamin <i class="text-danger me-2">*</i> :</strong>
                                    <div class="input-group input-group-outline">
                                        <select name="gender" id="gender" class="form-control">
                                            <option value="Laki - Laki" @selected(auth()->user()->gender == 'Laki - Laki')>Laki - Laki</option>
                                            <option value="Perempuan" @selected(auth()->user()->gender == 'Perempuan')>Perempuan</option>
                                        </select>
                                    </div>
                                    @error('gender')<small class="text-danger"><em>{{$message}}</em></small>@enderror
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <strong>Alamat <i class="text-danger me-2">*</i> :</strong>
                                    <div class="input-group input-group-outline">
                                        <textarea type="text" name="address" id="address" class="form-control" >{{ auth()->user()->address }}</textarea>
                                    </div>
                                    @error('address')<small class="text-danger"><em>{{$message}}</em></small>@enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-success w-100" type="submit">Simpan Data</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('script')
    <script>
        $('#profil').addClass('active')
    </script>
    <script>
        $('#photo_profile').on('change', function(){
            changePicture(this)
        });
        function changePicture(a) {
            if (a.files && a.files[0]) {     
                var reader = new FileReader();    
                reader.onload = function (e) {
                    $('#name-of-picture').html(a.files[0].name)
                    $('#picture-show').attr('src', e.target.result);
                }    
                reader.readAsDataURL(a.files[0]);
            } else {
                $('#picture-show').attr('src', '{{ auth()->user()->photo_profile }}');
                $('#name-of-picture').html('')
            }
        }
    </script>
@endsection