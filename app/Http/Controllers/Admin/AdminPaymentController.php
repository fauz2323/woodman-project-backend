<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class AdminPaymentController extends Controller
{
    function index()
    {
        return view('web.admin.payment.index');
    }

    function report()
    {
        return view('web.admin.payment.report');
    }

    function waitingToProcess()
    {
        return view('web.admin.payment.waiting');
    }

    function detail($id)
    {
        $id = Crypt::decrypt($id);
        return view('web.admin.payment.detail', [
            'id' => $id
        ]);
    }
}
