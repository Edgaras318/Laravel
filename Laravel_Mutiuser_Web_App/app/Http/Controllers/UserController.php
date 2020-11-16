<?php

namespace App\Http\Controllers;
use App\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;

class UserController extends Controller
{
    public function index()
    {
    $user = User::take(3)->latest()->paginate(3);
    //$this->authorize('view', User::Class);
    return view('users', ['users' => $user]);
    }
    public function export() 
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}
