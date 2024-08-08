<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Menu;
use App\Services\ActionService;
use App\Services\MenuService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    private $menuService;
    private $actionService;

    public function __construct(MenuService $menuService, ActionService $actionService)
    {
        $this->menuService = $menuService;
        $this->actionService = $actionService;
    }

    public function showDashboard(): View {
        $actionNavigation = $this->actionService->getUrlNavigation('list');
        $menus = $this->menuService->getSidebarMenu();
        $profile = $this->menuService->getProfile();

        return View('dashboard', [
            'actionNavigation' => $actionNavigation,
            'title' => 'Dashboard',
            'menus' => $menus,
            'profile' => $profile,
        ]);
    }
}
