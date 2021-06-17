<?php

namespace Database\Seeders;

use Exception;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            // Empty the session table
            DB::table('sessions')->truncate();

            // Reset cached roles and permissions
            app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

            // Create all roles that come from config file permission.php
            foreach (config('permission.user_roles') as $role)
            {
                Role::findOrCreate($role);
            }

            // Add all permissions you've defined in permission.php config file
            //  to the permissions table in your database
            foreach (config('permission.app_permissions') as $permission)
            {
                foreach (config('permission.app_cruds') as $crud)
                {
                    Permission::create([
                        'name' => $permission . '.' . $crud
                    ]);
                }
            }
            
            // Add only one user that has role 'SUPER_ADMIN'
            // 'remember_token'    => Str::random(10),
            $user = \App\Models\User::factory()->create([
                'name'        => 'Admin',
                'email'             => 'admin@admin.com',
                //'date_of_birth'     => '1970-05-17',
                //'email_verified_at' => now(),
                'password'          => bcrypt('password'),
                'adress'       => '9713 MR',
            ]);
            
            $user->assignRole('SUPER_ADMIN');

            // Loop through all roles from config file permission.php
            //  and attach the give role
            for ($i = 2; $i <= count(config('permission.user_roles')); $i++) {
                $user = \App\Models\User::factory()->create();
                $user->assignRole(config('permission.user_roles')[$i]);
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
