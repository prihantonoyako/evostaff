<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MenuService;
use App\Services\ActionService;
use Illuminate\View\View;

class RoleController extends Controller
{
    public function index(Request $request): View {
        return View('roles.list');
    }

    public function show(string $id): View {
        return View('roles.detail');
    }

    public function create() {

    }

    public function showCreate() {

    }

    public function update() {

    }

    public function showUpdate() {
        
    }


    public function delete() {
        
    }
}
