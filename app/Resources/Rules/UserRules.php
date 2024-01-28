<?php

namespace App\Resources\Rules;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules;

class UserRules
{
    public function __loginRules(Request $request)
    {
        return $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Email tidak valid',
            'password.required' => 'Password tidak boleh kosong'
        ]);
    }
    public function __postRules(Request $request)
    {
        return $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required',
            'password' => 'required',
            'gender' => 'required',
            'address' => 'required'
        ],[
            'name.required' => 'Nama tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'phone_number.required' => 'Nomor telepon tidak boleh kosong',
            'gender.required' => 'Jenis kelamin tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong',
            'address.required' => 'Alamat tidak boleh kosong',
            'email.email' => 'Email tidak valid',
        ]);
    }

    public function __postRulesWithImage(Request $request)
    {
        return $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required',
            'password' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'photo_profile' => 'required|image'
        ],[
            'name.required' => 'Nama tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'phone_number.required' => 'Nomor telepon tidak boleh kosong',
            'gender.required' => 'Jenis kelamin tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong',
            'address.required' => 'Alamat tidak boleh kosong',
            'email.email' => 'Email tidak valid',
            'photo_profile.required' => 'Foto profil tidak boleh kosong',
            'photo_profile.image' => 'Foto profil harus dalam format gambar',
        ]);
    }
    public function __uniqueRules(Request $request, $type)
    {
        $type == 'email' ? $name = 'Email' : (
            $type == 'phone_number' ? $name = 'Nomor telepon' : null
        );
        return $request->validate([
            $type => 'unique:users',
        ],[
            $type.'.unique' => $name.' sudah terdaftar',
        ]);
    }

    public function __savePhotoProfile($image)
    {
        $file = $image;
        $nama_file = time().$file->getClientOriginalName();
        $file->move('assets/images/user',$nama_file);
        $saveFile = url('/assets/images/user/'.$nama_file);
        return $saveFile;
    }
}