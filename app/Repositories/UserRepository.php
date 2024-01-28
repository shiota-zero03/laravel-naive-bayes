<?php

namespace App\Repositories;
use App\Models\User;

class UserRepository
{
    public function getById($id)
    {
        return User::find($id);
    }
    public function getAll()
    {
        return User::all();
    }
    public function getByRoleWithoutMe($role, $id)
    {
        return User::orderByDesc('created_at')
                    ->where('role', $role)
                    ->whereNot('id', $id)
                    ->get();
    }
    public function createData($data)
    {
        return User::create($data);
    }
    public function updateData($data, $id)
    {
        return User::find($id)->update($data);
    }
    public function deleteData($id)
    {
        return User::find($id)->delete();
    }
}