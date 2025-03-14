<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class AdminProductController extends Controller
{
    function index() {
        return view('web.admin.product.index');
    }

    function add() {
        return view('web.admin.product.add');
    }

    function detail($id) {
       try {
         $id = Crypt::decrypt($id);

        return view('web.admin.product.detail', compact('id'));
       } catch (DecryptException $th) {
       return redirect()->route('admin.product.index');
       }
    }
}
