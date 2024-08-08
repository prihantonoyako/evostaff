<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RBACSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = ['Super User', 'Applicant', 'Salesperson'];

        $roleIds = [];

        foreach($role as $item) {
            $id = \Ramsey\Uuid\Uuid::uuid4()->toString();
            $roleIds[$item] = $id;

            DB::table('roles')->insert([
                'id' => $id,
                'name' => $item,
                'description' => 'Default role for '.$item,
                'created_at' => '2000-06-08 03:00:00'
            ]);
        }

        $access = [
            $roleIds['Super User'] => [
                [
                    'routes' => '/management/user/create',
                    'action' => ['view']
                ],
                [
                    'routes' => '/management/user/update',
                    'action' => ['view']
                ],
                [
                    'routes' => '/management/user',
                    'action' => ['view','show','create','update','delete']
                ],
                [
                    'routes' => '/management/role/create',
                    'action' => ['view']
                ],
                [
                    'routes' => '/management/role/update',
                    'action' => ['view']
                ],
                [
                    'routes' => '/management/role',
                    'action' => ['view','show','create','update','delete']
                ],
                [
                    'routes' => '/ticket/delegation/create',
                    'action' => ['view']
                ],
                [
                    'routes' => '/ticket/delegation/update',
                    'action' => ['view']
                ],
                [
                    'routes' => '/ticket/delegation',
                    'action' => ['view','show','create','update','delete']
                ],
            ],
        ];
    }
}
