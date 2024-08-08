<?php

namespace App\Services;

use App\Models\Menu;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MenuService
{
    public function getSidebarMenu(): array {
        $data = [];
        $user = User::find(Auth::id());

        $menus = collect(Menu::select('id', 'parent_id', 'name', 'path', 'icon', 'order')
            ->where('status', 1)
            ->orderBy('order')
            ->get()->toArray());

        foreach($menus as $item) {
            // check parent or child status
            if($item['parent_id']) {
                if(array_key_exists($item['parent_id'], $data)) {
                    
                } else {
                    $parent = $menus->where('id', $item['parent_id'])->first();
                    if($parent) {
                        // fill parent to data
                        $data[$parent['id']] = $parent;
                    } else {
                        continue;
                    }
                }
                $data[$item['parent_id']]['child'][$item['id']] = $item;
            } else {
                if(array_key_exists($item['id'], $data)) {
                    continue;
                } else {
                    $data[$item['id']] = $item;
                }
            }
        }

        return $data;
    }

    public function getProfile(): array {
        $data = [];
        
        $user = User::find(Auth::id());

        $data['name'] = $user->employee->first_name . " " . $user->employee->last_name;
        $data['photo'] = $user->employee->photo;

        return $data;
    }
}