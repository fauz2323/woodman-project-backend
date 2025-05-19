<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminPaymentController extends Controller
{
    function index() {
        return view('web.admin.payment.index');
    }

    function report() {
        return view('web.admin.payment.report');
    }
}
