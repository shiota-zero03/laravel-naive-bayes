<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repositories\UserRepository;
use App\Resources\Rules\UserRules;

class ProfileController extends Controller
{
    private $userRepository, $userRules;
    public function __construct(UserRepository $userRepository, UserRules $userRules)
    {
        $this->userRepository = $userRepository;
        $this->userRules = $userRules;
    }

    public function index()
    {
        return view('pages.admin.profile.index');
    }
    public function update(Request $request)
    {
        auth()->user()->photo_profile == null ? (
            $this->userRules->__postRulesWithImage($request)
        ) : (
            $this->userRules->__postRules($request)
        );

        auth()->user()->email != $request->email && $this->userRules->__uniqueRules($request, 'email');
        auth()->user()->phone_number != $request->phone_number && $this->userRules->__uniqueRules($request, 'phone_number');
        
        if($request->file('photo_profile')){ $photo = $this->userRules->__savePhotoProfile($request->file('photo_profile')); } else { $photo = auth()->user()->photo_profile; }
        if($request->password == auth()->user()->password){ $password = auth()->user()->password; } else { $password = bcrypt(auth()->user()->password); }
        $data = [
            'photo_profile' => $photo,
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password,
            'phone_number' => $request->phone_number,
            'gender' => $request->gender,
            'address' => $request->address
        ];
        $update = $this->userRepository->updateData($data, auth()->user()->id);
        if($update){
            return back()->with('success', 'Profil berhasil diupdate');
        }

    }
}
