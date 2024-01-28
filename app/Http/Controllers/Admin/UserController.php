<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DataTables, Hash;

use App\Repositories\UserRepository;
use App\Resources\Rules\UserRules;
use App\Resources\Responses\ApiResponse;

class UserController extends Controller
{
    private $repo, $rules, $res;
    public function __construct(UserRepository $repo, UserRules $rules, ApiResponse $res)
    {
        $this->repo = $repo;
        $this->rules = $rules;
        $this->res = $res;
    }

    public function index(Request $request)
    {
        return view('pages.admin.manajemen-admin.index');
    }

    public function json(Request $request)
    {
        return DataTables::of($this->repo->getByRoleWithoutMe(1, auth()->user()->id))
            ->addIndexColumn()
            ->addColumn('action', function($row){
                return '
                    <div class="d-flex align-items-center">
                        <a href="javascript:showData('.$row["id"].');" class="mx-1"><i class="fas fa-edit"></i></a>
                        <a href="javascript:deleteData('.$row["id"].');" class="mx-1"><i class="fas fa-trash"></i></a>
                    </div>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    public function store(Request $request)
    {
        $this->rules->__postRules($request);
        $this->rules->__uniqueRules($request, 'email');
        $this->rules->__uniqueRules($request, 'phone_number');
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone_number' => $request->phone_number,
            'gender' => $request->gender,
            'role' => 1,
            'address' => $request->address
        ];
        $create = $this->repo->createData($data);
        if($create) return $this->res->successResponse('Admin berhasil ditambahkan', $create, 200);
        return $this->res->errorResponse('Server error', 500);
    }
    public function show(Request $request)
    {
        $data = $this->repo->getById($request->id);
        if($data) return $this->res->successResponse('Data admin berhasil didapatkan', $data, 200);
        return $this->res->errorResponse('Admin tidak ditemukan', 404);
    }
    public function update(Request $request)
    {
        $this->rules->__postRules($request);
        $user = $this->repo->getById($request->id);
        $user->email != $request->email && $this->rules->__uniqueRules($request, 'email');
        $user->phone_number != $request->phone_number && $this->rules->__uniqueRules($request, 'phone_number');
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $user->password == $request->password ? $request->password : Hash::make($request->password),
            'phone_number' => $request->phone_number,
            'gender' => $request->gender,
            'address' => $request->address
        ];
        $update = $this->repo->updateData($data, $request->id);
        if($update) return $this->res->successResponse('Admin berhasil diupdate', $data, 200);
        return $this->res->errorResponse('Server error', 500);
    }
    public function delete(Request $request)
    {
        $delete = $this->repo->deleteData($request->id);
        if($delete) return $this->res->successResponse('Admin berhasil dihapus', [], 200);
        return $this->res->errorResponse('Server error', 500);
    }
}
