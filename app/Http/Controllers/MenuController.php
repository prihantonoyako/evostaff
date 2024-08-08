<?php

namespace App\Http\Controllers;

use App\Http\Requests\MenuRequest;
use App\Services\ActionService;
use App\Services\MenuService;
use App\Models\Menu;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;


class MenuController extends Controller
{
    private $menuService;
    private $actionService;

    public function __construct(ActionService $actionService, MenuService $menuService)
    {
        $this->actionService = $actionService;
        $this->menuService = $menuService;
    }

    public function index(Request $request): View {
        $menus = $this->menuService->getSidebarMenu();
        $profile = $this->menuService->getProfile();
        $actionNavigation = $this->actionService->getUrlNavigation('index');

        $limit = $request->get('limit') ? $request->get('limit') : 10;

        $data = Menu::paginate($limit);

        return View('menus.list', [
            'title' => 'Menu List',
            'actionNavigation' => $actionNavigation,
            'menus' => $menus,
            'profile' => $profile,
            'data' => $data,
        ]);
    }

    public function show(string $id): View {
        $menus = $this->menuService->getSidebarMenu();
        $profile = $this->menuService->getProfile();
        $actionNavigation = $this->actionService->getUrlNavigation('show');

        $data = Menu::find($id);

        return View('menus.detail', [
            'title' => 'Menu Detail',
            'actionNavigation' => $actionNavigation,
            'menus' => $menus,
            'profile' => $profile,
            'data' => $data
        ]);
    }

    public function showUpdate(string $id): View {
        $actionNavigation = $this->actionService->getUrlNavigation('update');
        $menus = $this->menuService->getSidebarMenu();
        $profile = $this->menuService->getProfile();

        $data = Menu::find($id);

        return View('menus.update', [
            'title' => 'Menu Update',
            'actionNavigation' => $actionNavigation,
            'menus' => $menus,
            'profile' => $profile,
            'urlHome' => '/',
            'urlLogout' => '/logout',
            'data' => $data,
        ]);
    }

    public function update(Request $request, MenuRequest $menuRequest, string $id): Redirector | RedirectResponse {
        $actionNavigation = $this->actionService->getUrlNavigation('update');

        $data = Menu::find($id);

        $data->fill($menuRequest->validated());

        $data->save();

        return redirect($actionNavigation['urlMain']);
    }
}
