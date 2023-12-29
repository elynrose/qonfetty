<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'card_create',
            ],
            [
                'id'    => 18,
                'title' => 'card_edit',
            ],
            [
                'id'    => 19,
                'title' => 'card_show',
            ],
            [
                'id'    => 20,
                'title' => 'card_delete',
            ],
            [
                'id'    => 21,
                'title' => 'card_access',
            ],
            [
                'id'    => 22,
                'title' => 'reward_create',
            ],
            [
                'id'    => 23,
                'title' => 'reward_edit',
            ],
            [
                'id'    => 24,
                'title' => 'reward_show',
            ],
            [
                'id'    => 25,
                'title' => 'reward_delete',
            ],
            [
                'id'    => 26,
                'title' => 'reward_access',
            ],
            [
                'id'    => 27,
                'title' => 'store_create',
            ],
            [
                'id'    => 28,
                'title' => 'store_edit',
            ],
            [
                'id'    => 29,
                'title' => 'store_show',
            ],
            [
                'id'    => 30,
                'title' => 'store_delete',
            ],
            [
                'id'    => 31,
                'title' => 'store_access',
            ],
            [
                'id'    => 32,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 33,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 34,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 35,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 36,
                'title' => 'point_create',
            ],
            [
                'id'    => 37,
                'title' => 'point_edit',
            ],
            [
                'id'    => 38,
                'title' => 'point_show',
            ],
            [
                'id'    => 39,
                'title' => 'point_delete',
            ],
            [
                'id'    => 40,
                'title' => 'point_access',
            ],
            [
                'id'    => 41,
                'title' => 'card_batch_create',
            ],
            [
                'id'    => 42,
                'title' => 'card_batch_edit',
            ],
            [
                'id'    => 43,
                'title' => 'card_batch_show',
            ],
            [
                'id'    => 44,
                'title' => 'card_batch_delete',
            ],
            [
                'id'    => 45,
                'title' => 'card_batch_access',
            ],
            [
                'id'    => 46,
                'title' => 'order_create',
            ],
            [
                'id'    => 47,
                'title' => 'order_edit',
            ],
            [
                'id'    => 48,
                'title' => 'order_show',
            ],
            [
                'id'    => 49,
                'title' => 'order_delete',
            ],
            [
                'id'    => 50,
                'title' => 'order_access',
            ],
            [
                'id'    => 51,
                'title' => 'transaction_create',
            ],
            [
                'id'    => 52,
                'title' => 'transaction_edit',
            ],
            [
                'id'    => 53,
                'title' => 'transaction_show',
            ],
            [
                'id'    => 54,
                'title' => 'transaction_delete',
            ],
            [
                'id'    => 55,
                'title' => 'transaction_access',
            ],
            [
                'id'    => 56,
                'title' => 'customer_create',
            ],
            [
                'id'    => 57,
                'title' => 'customer_edit',
            ],
            [
                'id'    => 58,
                'title' => 'customer_show',
            ],
            [
                'id'    => 59,
                'title' => 'customer_delete',
            ],
            [
                'id'    => 60,
                'title' => 'customer_access',
            ],
            [
                'id'    => 61,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
