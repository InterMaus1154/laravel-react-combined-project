<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class ClientController extends Controller
{
    public function handover(): View
    {
        return view('client');
    }
}
