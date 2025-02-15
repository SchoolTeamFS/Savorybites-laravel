<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function exportCSV(Request $request)
    {
        return Excel::download(new UsersExport, 'users.csv');
    }

}
