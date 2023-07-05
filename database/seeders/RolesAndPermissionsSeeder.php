<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $miscPermission = Permission::create(['name' =>'N/A']);

        //CREAT USER PERMISSION
        $userPermissioncreate = Permission::create(['name' =>'create: user']);
        $userPermissionread   = Permission::create(['name' =>'read: user']);
        $userPermissionupdate = Permission::create(['name' =>'update: user']);
        $userPermissiondelete = Permission::create(['name' =>'delete: user']);

        // CREAT ROLEPERMISSION MODEL
        $rolePermissioncreate = Permission::create(['name' =>'create: role']);
        $rolePermissionread   = Permission::create(['name' =>'read: role']);
        $rolePermissionupdate = Permission::create(['name' =>'update: role']);
        $rolePermissiondelete = Permission::create(['name' =>'delete: role']);

        // CREATE PERMISSION

        $permissioncreate = Permission::create(['name' =>'create: permission']);
        $permissionread   = Permission::create(['name' =>'read: permission']);
        $permissionupdate = Permission::create(['name' =>'update: permission']);
        $permissiondelete = Permission::create(['name' =>'delete: permission']);

        //PERMISION ADMIN
        $adminPermissionread   = Permission::create(['name' =>'read: admin']);
        $adminPermissionupdate = Permission::create(['name' =>'update: admin']);

        //CREATE USER ROLE
        $userRole = Role::create(['name' =>'user'])->syncPermissions
        ([
            $miscPermission,


        ]);
        //CREATE SUPERADMIN ROLE
        $superAdminRole = Role::create(['name' =>'super-admin'])->syncPermissions
        ([
            $userPermissioncreate,
            $userPermissionread,
            $userPermissionupdate,
            $userPermissiondelete,
            $rolePermissioncreate,
            $rolePermissionread,
            $rolePermissionupdate,
            $rolePermissiondelete,
            $permissioncreate,
            $permissionread,
            $permissionupdate,
            $permissiondelete,
            $adminPermissionread,
            $adminPermissionupdate,

        ]);
    //CREATE ADMIN ROLE
        $adminRole = Role::create(['name' =>'admin'])->syncPermissions
        ([
            $userPermissioncreate,
            $userPermissionread,
            $userPermissionupdate,
            $userPermissiondelete,
            $rolePermissioncreate,
            $rolePermissionread,
            $rolePermissionupdate,
            $rolePermissiondelete,
            $permissioncreate,
            $permissionread,
            $permissionupdate,
            $permissiondelete,
            $adminPermissionread,
            $adminPermissionupdate,
        ]);
    //CREATE MODERATOR ROLE
        $moderatorRole = Role::create(['name' =>'moderator'])->syncPermissions
        ([

            $userPermissionread,
            $rolePermissionread,
            $permissionupdate,
            $adminPermissionread,
        ]);
    $developerRole = Role::create(['name' =>'developer'])->syncPermissions
        ([
            $adminPermissionread,
        ]);
            // $miscRole = Role::create(['name' =>'misc'])->syncPermissions
            // ([
            //     $miscPermission,
            // ]);

        User::create
        ([
            'name' =>'super admin',
            'is_admin' => 1,
            'email'=>'superadmin@gmail.com',
            'email_verified_at' => now(),
            'password'=>bcrypt('12345678'),
            // 'password'=>Hash::make('password'),
            'remember_token' => Str::random(10),
        ])->assignRole($superAdminRole);

        User::create
        ([
            'name' =>'admin',
            'is_admin' => 1,
            'email'=>'admin@gmail.com',
            'email_verified_at' => now(),
            'password'=>bcrypt('12345678'),
            // 'password'=>Hash::make('password'),
            'remember_token' => Str::random(10),
        ])->assignRole($adminRole);

        User::create
        ([
            'name' =>'moderator',
            'is_admin' => 1,
            'email'=>'moderator@gmail.com',
            'email_verified_at' => now(),
            'password'=>bcrypt('12345678'),
            // 'password'=>Hash::make('password'),
            'remember_token' => Str::random(10),
        ])->assignRole($moderatorRole);

        // User::create
        // ([
        //     'name' =>'sajid',
        //     'is_admin' => 1,
        //     'email'=>'sajid@gmail.com',
        //     'email_verified_at' => now(),
        //     'password'=>bcrypt('12345678'),
        //     // 'password'=>Hash::make('password'),
        //     'remember_token' => Str::random(10),
        // ])->assignRole($miscRole);
        User::create
        ([
            'name' =>'developer',
            'is_admin' => 1,
            'email'=>'developer@gmail.com',
            'email_verified_at' => now(),
            'password'=>bcrypt('12345678'),
            // 'password'=>Hash::make('password'),
            'remember_token' => Str::random(10),
        ])->assignRole($developerRole);

            for($i=1; $i<=10; $i++)
            {
                User::create([
                'name' =>'test'.$i,
                'is_admin' => 0,
                'email'=>'test'.$i.'@test.com',
                'email_verified_at' => now(),
                // 'password'=>bcrypt('12345678'),
                'password'=>Hash::make('password'),
                'remember_token' => Str::random(10),
            ])->assignRole($userRole);

    }
    }
}
