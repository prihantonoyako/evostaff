<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Department;
use App\Models\Employee;
use App\Services\ActionService;
use App\Services\MenuService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class EmployeeController extends Controller
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

        $data = Employee::paginate($limit);

        return View('employees.list', [
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

        $data = Employee::find($id);

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

        $data = Employee::find($id);

        $departments = Department::all();

        return View('employees.update', [
            'title' => 'Employee Update',
            'actionNavigation' => $actionNavigation,
            'menus' => $menus,
            'profile' => $profile,
            'urlHome' => '/',
            'urlLogout' => '/logout',
            'data' => $data,
            'departments' => $departments
        ]);
    }

    public function update(Request $request, EmployeeRequest $employeeRequest, string $id): Redirector | RedirectResponse {
        $actionNavigation = $this->actionService->getUrlNavigation('update');

        $data = Employee::find($id);

        if ($request->hasFile('photo')) {
            if ($data->photo && Storage::exists('public/' . $data->photo)) {
                Storage::delete('public/' . $data->photo);
            }

            $photoPath = $request->file('photo')->store('photos', 'public');
            $request->merge(['photo' => $photoPath]);
        }

        $data->fill($employeeRequest->validated());

        $data->save();

        return redirect($actionNavigation['urlMain']);
    }

    public function showCreate(): View {
        $actionNavigation = $this->actionService->getUrlNavigation('create');
        $menus = $this->menuService->getSidebarMenu();
        $profile = $this->menuService->getProfile();

        return View('employees.add', [
            'title' => 'Employee Create',
            'actionNavigation' => $actionNavigation,
            'menus' => $menus,
            'profile' => $profile,
            'urlHome' => '/',
            'urlLogout' => '/logout',
        ]);
    }

    public function create(Request $request, EmployeeRequest $employeeRequest) {
        $employee = new Employee();

        $employee->fill($employeeRequest->validated());

        $employee->save();

        return redirect('/company/employee');
    }
}
