<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (env('APP_ENV') != 'dev') {
            return;
        }

        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        // admins
        $permissions[] = ['name' => 'admins.index', 'guard_name' => 'web'];
        $permissions[] = ['name' => 'admins.create', 'guard_name' => 'web'];
        $permissions[] = ['name' => 'admins.edit', 'guard_name' => 'web'];
        $permissions[] = ['name' => 'admins.destroy', 'guard_name' => 'web'];

        // centers
        $permissions[] = ['name' => 'centers.index', 'guard_name' => 'web'];
        $permissions[] = ['name' => 'centers.create', 'guard_name' => 'web'];
        $permissions[] = ['name' => 'centers.edit', 'guard_name' => 'web'];
        $permissions[] = ['name' => 'centers.destroy', 'guard_name' => 'web'];

        // cities
        $permissions[] = ['name' => 'cities.index', 'guard_name' => 'web'];
        $permissions[] = ['name' => 'cities.create', 'guard_name' => 'web'];
        $permissions[] = ['name' => 'cities.edit', 'guard_name' => 'web'];
        $permissions[] = ['name' => 'cities.destroy', 'guard_name' => 'web'];

        // countries
        $permissions[] = ['name' => 'countries.index', 'guard_name' => 'web'];
        $permissions[] = ['name' => 'countries.create', 'guard_name' => 'web'];
        $permissions[] = ['name' => 'countries.edit', 'guard_name' => 'web'];
        $permissions[] = ['name' => 'countries.destroy', 'guard_name' => 'web'];

        // courses
        $permissions[] = ['name' => 'courses.index', 'guard_name' => 'web'];
        $permissions[] = ['name' => 'courses.create', 'guard_name' => 'web'];
        $permissions[] = ['name' => 'courses.edit', 'guard_name' => 'web'];
        $permissions[] = ['name' => 'courses.destroy', 'guard_name' => 'web'];

        // day-times
        $permissions[] = ['name' => 'day-times.index', 'guard_name' => 'web'];
        $permissions[] = ['name' => 'day-times.create', 'guard_name' => 'web'];
        $permissions[] = ['name' => 'day-times.edit', 'guard_name' => 'web'];
        $permissions[] = ['name' => 'day-times.destroy', 'guard_name' => 'web'];

        // dive-activities
        $permissions[] = ['name' => 'dive-activities.index', 'guard_name' => 'web'];
        $permissions[] = ['name' => 'dive-activities.create', 'guard_name' => 'web'];
        $permissions[] = ['name' => 'dive-activities.edit', 'guard_name' => 'web'];
        $permissions[] = ['name' => 'dive-activities.destroy', 'guard_name' => 'web'];

        // dive-entries
        $permissions[] = ['name' => 'dive-entries.index', 'guard_name' => 'web'];
        $permissions[] = ['name' => 'dive-entries.create', 'guard_name' => 'web'];
        $permissions[] = ['name' => 'dive-entries.edit', 'guard_name' => 'web'];
        $permissions[] = ['name' => 'dive-entries.destroy', 'guard_name' => 'web'];

        // dive-sites
        $permissions[] = ['name' => 'dive-sites.index', 'guard_name' => 'web'];
        $permissions[] = ['name' => 'dive-sites.create', 'guard_name' => 'web'];
        $permissions[] = ['name' => 'dive-sites.edit', 'guard_name' => 'web'];
        $permissions[] = ['name' => 'dive-sites.destroy', 'guard_name' => 'web'];

        // equipments
        $permissions[] = ['name' => 'equipments.index', 'guard_name' => 'web'];
        $permissions[] = ['name' => 'equipments.create', 'guard_name' => 'web'];
        $permissions[] = ['name' => 'equipments.edit', 'guard_name' => 'web'];
        $permissions[] = ['name' => 'equipments.destroy', 'guard_name' => 'web'];

        // permissions
        $permissions[] = ['name' => 'permissions.index', 'guard_name' => 'web'];

        // roles
        $permissions[] = ['name' => 'roles.index', 'guard_name' => 'web'];
        $permissions[] = ['name' => 'roles.create', 'guard_name' => 'web'];
        $permissions[] = ['name' => 'roles.edit', 'guard_name' => 'web'];
        $permissions[] = ['name' => 'roles.destroy', 'guard_name' => 'web'];

        // schools
        $permissions[] = ['name' => 'schools.index', 'guard_name' => 'web'];
        $permissions[] = ['name' => 'schools.create', 'guard_name' => 'web'];
        $permissions[] = ['name' => 'schools.edit', 'guard_name' => 'web'];
        $permissions[] = ['name' => 'schools.destroy', 'guard_name' => 'web'];

        // seasons
        $permissions[] = ['name' => 'seasons.index', 'guard_name' => 'web'];
        $permissions[] = ['name' => 'seasons.create', 'guard_name' => 'web'];
        $permissions[] = ['name' => 'seasons.edit', 'guard_name' => 'web'];
        $permissions[] = ['name' => 'seasons.destroy', 'guard_name' => 'web'];

        // staff
        $permissions[] = ['name' => 'staff.index', 'guard_name' => 'web'];
        $permissions[] = ['name' => 'staff.create', 'guard_name' => 'web'];
        $permissions[] = ['name' => 'staff.edit', 'guard_name' => 'web'];
        $permissions[] = ['name' => 'staff.destroy', 'guard_name' => 'web'];

        // taxons
        $permissions[] = ['name' => 'taxons.index', 'guard_name' => 'web'];
        $permissions[] = ['name' => 'taxons.create', 'guard_name' => 'web'];
        $permissions[] = ['name' => 'taxons.edit', 'guard_name' => 'web'];
        $permissions[] = ['name' => 'taxons.destroy', 'guard_name' => 'web'];

        // admins
        $permissions[] = ['name' => 'users.index', 'guard_name' => 'web'];
        $permissions[] = ['name' => 'users.create', 'guard_name' => 'web'];
        $permissions[] = ['name' => 'users.edit', 'guard_name' => 'web'];
        $permissions[] = ['name' => 'users.destroy', 'guard_name' => 'web'];

        // insert bulk Permissions
        foreach ($permissions as $permission) {
            Permission::firstOrCreate($permission);
        }

        // create roles and assign created permissions
        Role::where('id', '!=', '0')->delete();

        $role = Role::create(['name' => 'super-admin', 'guard_name' => 'web']);
        $role->syncPermissions(Permission::all());
    }
}
