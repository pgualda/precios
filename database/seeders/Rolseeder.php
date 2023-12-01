<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class Rolseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1=Role::create(['name' => 'Admin']);
        $role2=Role::create(['name' => 'SuperAdmin']);
        $role3=Role::create(['name' => 'Encargado']);
        $role4=Role::create(['name' => 'Precios']);
        $role5=Role::create(['name' => 'Encargado a validar']);
        $role6=Role::create(['name' => 'Precios a validar']);

        $permission = Permission::create(['name' => 'PermisoEncargado'])->syncRoles([$role1,$role2,$role3]);
        $permission = Permission::create(['name' => 'PermisoPrecios'])->syncRoles([$role1,$role2,$role3,$role4]);
        $permission = Permission::create(['name' => 'PermisoAdmin'])->syncRoles([$role1,$role2]);
        $permission = Permission::create(['name' => 'PermisoSAdmin'])->syncRoles([$role2]);
    }
}
