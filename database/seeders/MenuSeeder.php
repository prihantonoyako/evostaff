<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menus = [
            [
                'name' => 'Dashboard',
                'icon' => 'fas fa-tachometer-alt',
                'path' => null,
                'order' => 1,
                'status' => 1,
                'child' => []
            ],
            [
                "name" => "User Management",
                "icon" => "fas fa-users-cog",
                'path' => null,
                'order' => 2,
                'status' => 1,
                'child' => [
                    [
                        "name" => "User",
                        "path" => "/management/user",
                        "icon" => "fas fa-user",
                        'order' => 1,
                        'status' => 1,
                    ],
                    [
                        "name" => "Role",
                        "path" => "/management/role",
                        "icon" => "fas fa-user-shield",
                        'order' => 2,
                        'status' => 1,
                    ]
                ]
            ],
            [
                'name' => 'App Management',
                'icon' => 'fas fa-microchip',
                'path' => null,
                'status' => 3,
                'child' => [
                    [
                        'name' => 'Menu',
                        'path' => '/management/menu',
                        'icon' => 'fas fa-list',
                        'path' => null,
                        'order' => 1,
                        'status' => 1,
                    ]
                ]
            ],
        ];

        foreach($menus as $p) {
            $id = \Ramsey\Uuid\Uuid::uuid4()->toString();

            DB::table('menus')->insert([
                'id' => $id,
                'name' => $p['name'],
                'icon' => $p['icon'],
                'path' => $p['path'],
                'order' => $p['order'],
                'status' => $p['status']
            ]);

            if($p['child']) {
                foreach($p['child'] as $c) {
                    DB::table('menus')->insert([
                        'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                        'parent_id' => $id,
                        'name' => $c['name'],
                        'path' => $c['path'],
                        'icon' => $c['icon'],
                        'order' => $c['order'],
                        'status' => $c['status']
                    ]);
                }
            }
        }
    }
}
