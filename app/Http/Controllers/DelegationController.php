<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DelegationController extends Controller
{

    public function index(Request $request): View {
        return View('delegation', [
            'title' => 'Delegation',
            ''
        ]);
    }
}
