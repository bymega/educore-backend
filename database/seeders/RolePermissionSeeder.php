<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolePermissionSeeder extends Seeder
{
    /**
     * Seed the application's roles and permissions.
     */
    public function run(): void
    {
        app(PermissionRegistrar::class)->forgetCachedPermissions();

        $permissions = [
            'users.view',
            'users.create',
            'users.update',
            'users.delete',
            'users.restore',
            'teachers.view',
            'teachers.create',
            'teachers.update',
            'teachers.delete',
            'teachers.restore',
            'students.view',
            'students.create',
            'students.update',
            'students.delete',
            'students.restore',
            'classes.view',
            'classes.create',
            'classes.update',
            'grades.view',
            'grades.create',
            'grades.update',
            'attendance.view',
            'attendance.create',
            'attendance.update',
            'reports.view',
            'reports.export',
        ];

        foreach ($permissions as $permission) {
            Permission::findOrCreate($permission, 'web');
        }

        app(PermissionRegistrar::class)->forgetCachedPermissions();

        $rolePermissions = [
            'administrador' => $permissions,
            'coordenador' => [
                'users.view',
                'students.view',
                'students.create',
                'students.update',
                'classes.view',
                'classes.create',
                'classes.update',
                'grades.view',
                'attendance.view',
                'reports.view',
                'reports.export',
            ],
            'professor' => [
                'students.view',
                'classes.view',
                'grades.view',
                'grades.create',
                'grades.update',
                'attendance.view',
                'attendance.create',
                'attendance.update',
                'reports.view',
            ],
            'aluno' => [
                'classes.view',
                'grades.view',
                'attendance.view',
            ],
            'secretario' => [
                'users.view',
                'users.create',
                'users.update',
                'users.restore',
                'students.view',
                'students.create',
                'students.update',
                'classes.view',
                'classes.create',
                'classes.update',
                'reports.view',
            ],
        ];

        foreach ($rolePermissions as $roleName => $assignedPermissions) {
            Role::findOrCreate($roleName, 'web')->syncPermissions($assignedPermissions);
        }

        app(PermissionRegistrar::class)->forgetCachedPermissions();
    }
}
