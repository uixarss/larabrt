<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'customer']);
        $actions = [
            'view', 'create', 'edit', 'update', 'delete'
        ];
        $objects = [
            'armada', 'users', 'halte', 'role', 'permission','promo'
        ];

        foreach ($actions as $action) {
            foreach ($objects as $object) {
                Permission::create([
                    'name' => $action . '-' . $object
                ]);
            }
        }
    }
}
