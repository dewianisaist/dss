<?php

use Illuminate\Database\Seeder;
use App\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $permission = [
        	[
        		'name' => 'role-list',
        		'display_name' => 'Menampilkan daftar Role',
        		'description' => 'Hanya melihat daftar Role'
        	],
        	[
        		'name' => 'role-create',
        		'display_name' => 'Membuat Role',
        		'description' => 'Membuat Role baru'
        	],
        	[
        		'name' => 'role-edit',
        		'display_name' => 'Edit Role',
        		'description' => 'Edit Role'
        	],
        	[
        		'name' => 'role-delete',
        		'display_name' => 'Hapus Role',
        		'description' => 'Hapus Role'
        	],
        	[
        		'name' => 'item-list',
        		'display_name' => 'Menampilkan daftar Item',
        		'description' => 'Hanya melihat daftar Item'
        	],
        	[
        		'name' => 'item-create',
        		'display_name' => 'Membuat Item',
        		'description' => 'Membuat Item baru'
        	],
        	[
        		'name' => 'item-edit',
        		'display_name' => 'Edit Item',
        		'description' => 'Edit Item'
        	],
        	[
        		'name' => 'item-delete',
        		'display_name' => 'Hapus Item',
        		'description' => 'Hapus Item'
        	]
        ];

        foreach ($permission as $key => $value) {
        	Permission::create($value);
        }
    }
}
