<?php

return [
    'userManagement' => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'permission' => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                        => 'ID',
            'id_helper'                 => ' ',
            'name'                      => 'Name',
            'name_helper'               => ' ',
            'email'                     => 'Email',
            'email_helper'              => ' ',
            'email_verified_at'         => 'Email verified at',
            'email_verified_at_helper'  => ' ',
            'password'                  => 'Password',
            'password_helper'           => ' ',
            'roles'                     => 'Roles',
            'roles_helper'              => ' ',
            'remember_token'            => 'Remember Token',
            'remember_token_helper'     => ' ',
            'created_at'                => 'Created at',
            'created_at_helper'         => ' ',
            'updated_at'                => 'Updated at',
            'updated_at_helper'         => ' ',
            'deleted_at'                => 'Deleted at',
            'deleted_at_helper'         => ' ',
            'verified'                  => 'Verified',
            'verified_helper'           => ' ',
            'verified_at'               => 'Verified at',
            'verified_at_helper'        => ' ',
            'verification_token'        => 'Verification token',
            'verification_token_helper' => ' ',
        ],
    ],
    'card' => [
        'title'          => 'Cards',
        'title_singular' => 'Card',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'code'                 => 'Code',
            'code_helper'          => ' ',
            'is_registered'        => 'Is Registered',
            'is_registered_helper' => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
            'card_batch'           => 'Card Batch',
            'card_batch_helper'    => ' ',
            'user'                 => 'User',
            'user_helper'          => ' ',
        ],
    ],
    'reward' => [
        'title'          => 'Rewards',
        'title_singular' => 'Reward',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => ' ',
            'photo'                  => 'Photo',
            'photo_helper'           => ' ',
            'name'                   => 'Name',
            'name_helper'            => ' ',
            'description'            => 'Description',
            'description_helper'     => ' ',
            'price'                  => 'Price',
            'price_helper'           => ' ',
            'quantity'               => 'Quantity',
            'quantity_helper'        => ' ',
            'points_required'        => 'Points Required',
            'points_required_helper' => ' ',
            'created_at'             => 'Created at',
            'created_at_helper'      => ' ',
            'updated_at'             => 'Updated at',
            'updated_at_helper'      => ' ',
            'deleted_at'             => 'Deleted at',
            'deleted_at_helper'      => ' ',
            'stores'                 => 'Stores',
            'stores_helper'          => ' ',
            'created_by'             => 'Created By',
            'created_by_helper'      => ' ',
        ],
    ],
    'store' => [
        'title'          => 'Stores',
        'title_singular' => 'Store',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'store_name'        => 'Store Name',
            'store_name_helper' => ' ',
            'address'           => 'Address',
            'address_helper'    => ' ',
            'active'            => 'Active',
            'active_helper'     => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'created_by'        => 'Created By',
            'created_by_helper' => ' ',
        ],
    ],
    'userAlert' => [
        'title'          => 'User Alerts',
        'title_singular' => 'User Alert',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'alert_text'        => 'Alert Text',
            'alert_text_helper' => ' ',
            'alert_link'        => 'Alert Link',
            'alert_link_helper' => ' ',
            'user'              => 'Users',
            'user_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
        ],
    ],
    'point' => [
        'title'          => 'Points',
        'title_singular' => 'Point',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'points'            => 'Points',
            'points_helper'     => ' ',
            'stores'            => 'Stores',
            'stores_helper'     => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'code'              => 'Code',
            'code_helper'       => ' ',
        ],
    ],
    'cardBatch' => [
        'title'          => 'Card Batches',
        'title_singular' => 'Card Batch',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'batch_code'         => 'Batch Code',
            'batch_code_helper'  => ' ',
            'published'          => 'Published',
            'published_helper'   => ' ',
            'quantity'           => 'Quantity',
            'quantity_helper'    => ' ',
            'distrubuted'        => 'Distrubuted',
            'distrubuted_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'order' => [
        'title'          => 'Orders',
        'title_singular' => 'Order',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'stores'            => 'Stores',
            'stores_helper'     => ' ',
            'reward'            => 'Reward',
            'reward_helper'     => ' ',
            'card'              => 'Card',
            'card_helper'       => ' ',
            'claimed'           => 'Claimed',
            'claimed_helper'    => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'transaction' => [
        'title'          => 'Transactions',
        'title_singular' => 'Transaction',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'orders'            => 'Orders',
            'orders_helper'     => ' ',
            'paid'              => 'Paid',
            'paid_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'created_by'        => 'Created By',
            'created_by_helper' => ' ',
        ],
    ],
    'customer' => [
        'title'          => 'Customers',
        'title_singular' => 'Customer',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'card'              => 'Card',
            'card_helper'       => ' ',
            'stores'            => 'Stores',
            'stores_helper'     => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],

];
