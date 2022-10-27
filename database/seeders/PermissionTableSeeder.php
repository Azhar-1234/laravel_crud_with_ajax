<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

  

class PermissionTableSeeder extends Seeder

{

    public function run()
    {
        $permissions = [

           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           'category-list',
           'category-create',
           'categoy-edit',
           'category-delete',
       	   
       	   'user-list',
           'user-create',
           'user-edit',
           'user-delete',

        ];

        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }

    }

}