<?php

namespace App\Http\Controllers\CustomerPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerPanelController extends Controller
{
    public function index()
    {
        return view('customer.index');
    }
}
