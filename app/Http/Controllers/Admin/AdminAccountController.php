<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class AdminAccountController extends Controller
{
    function index() {
        return view('web.admin.account.index');
    }

    function detail($id) {
        $id = Crypt::decrypt($id);
        $user = User::find($id);
        if(!$user) {
            return redirect()->route('admin.account.index');
        }
        return view('web.admin.account.detail',compact('id','user'));
    }
}
