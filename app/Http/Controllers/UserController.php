<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\MenuService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UserController extends Controller
{
    private $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    public function index(Request $request): View {
        $limit = $request->get('limit') ? $request->get('limit') : 10;
        $menus = $this->menuService->getSidebarMenu();
        $profile = $this->menuService->getProfile();

        $data = User::paginate($limit);

        return View('users.list', [
            'title' => 'User List',
            'menus' => $menus,
            'profile' => $profile,
            'urlHome' => '/',
            'urlLogout' => '/logout',
            'data' => $data,
        ]);
    }

    public function showCreate(): View {
        return View('managements.users.create', [

        ]);
    }

    public function create() {

    }

    public function showUpdate(): View {
        return View('managements.users.update', [
            
        ]);
    }

    public function update() {
        
    }

    public function destroy() {

    }
}
