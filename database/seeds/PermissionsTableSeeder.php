<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => '1',
                'title' => 'user_management_access',
            ],
            [
                'id'    => '2',
                'title' => 'permission_create',
            ],
            [
                'id'    => '3',
                'title' => 'permission_edit',
            ],
            [
                'id'    => '4',
                'title' => 'permission_delete',
            ],
            [
                'id'    => '5',
                'title' => 'permission_access',
            ],
            [
                'id'    => '6',
                'title' => 'role_create',
            ],
            [
                'id'    => '7',
                'title' => 'role_edit',
            ],
            [
                'id'    => '8',
                'title' => 'role_delete',
            ],
            [
                'id'    => '9',
                'title' => 'role_access',
            ],
            [
                'id'    => '10',
                'title' => 'user_create',
            ],
            [
                'id'    => '11',
                'title' => 'user_edit',
            ],
            [
                'id'    => '12',
                'title' => 'user_delete',
            ],
            [
                'id'    => '13',
                'title' => 'user_access',
            ],
            [
                'id'    => '14',
                'title' => 'audit_log_show',
            ],
            [
                'id'    => '15',
                'title' => 'audit_log_access',
            ],
            [
                'id'    => '16',
                'title' => 'lahan_create',
            ],
            [
                'id'    => '17',
                'title' => 'lahan_edit',
            ],
            [
                'id'    => '18',
                'title' => 'lahan_delete',
            ],
            [
                'id'    => '19',
                'title' => 'lahan_access',
            ],
            [
                'id'    => '20',
                'title' => 'panen_create',
            ],
            [
                'id'    => '21',
                'title' => 'panen_edit',
            ],
            [
                'id'    => '22',
                'title' => 'panen_delete',
            ],
            [
                'id'    => '23',
                'title' => 'panen_access',
            ],
            [
                'id'    => '24',
                'title' => 'tengkulak_create',
            ],
            [
                'id'    => '25',
                'title' => 'tengkulak_edit',
            ],
            [
                'id'    => '26',
                'title' => 'tengkulak_delete',
            ],
            [
                'id'    => '27',
                'title' => 'tengkulak_access',
            ],
            [
                'id'    => '28',
                'title' => 'penjualan_create',
            ],
            [
                'id'    => '29',
                'title' => 'penjualan_edit',
            ],
            [
                'id'    => '30',
                'title' => 'penjualan_delete',
            ],
            [
                'id'    => '31',
                'title' => 'penjualan_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
