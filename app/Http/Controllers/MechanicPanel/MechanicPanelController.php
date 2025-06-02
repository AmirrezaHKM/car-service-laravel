<?php

namespace App\Http\Controllers\MechanicPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MechanicPanelController extends Controller
{
    public function index()
    {
        return view('mechanic.index');
    }
}
