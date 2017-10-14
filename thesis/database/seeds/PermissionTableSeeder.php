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
        		'name' => 'user-list',
        		'display_name' => 'Menampilkan daftar Pengguna',
        		'description' => 'Hanya melihat daftar Pengguna'
        	],
        	[
        		'name' => 'user-create',
        		'display_name' => 'Membuat Pengguna',
        		'description' => 'Membuat Pengguna baru'
        	],
        	[
        		'name' => 'user-edit',
        		'display_name' => 'Edit Pengguna',
        		'description' => 'Edit Pengguna'
        	],
        	[
        		'name' => 'user-delete',
        		'display_name' => 'Hapus Pengguna',
        		'description' => 'Hapus Pengguna'
        	],
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
        		'name' => 'vocational-list',
        		'display_name' => 'Menampilkan daftar Kejuruan',
        		'description' => 'Hanya melihat daftar Kejuruan'
        	],
        	[
        		'name' => 'vocational-create',
        		'display_name' => 'Membuat Kejuruan',
        		'description' => 'Membuat Kejuruan baru'
        	],
        	[
        		'name' => 'vocational-edit',
        		'display_name' => 'Edit Kejuruan',
        		'description' => 'Edit Kejuruan'
        	],
        	[
        		'name' => 'vocational-delete',
        		'display_name' => 'Hapus Kejuruan',
        		'description' => 'Hapus Kejuruan'
        	]
        ];

        foreach ($permission as $key => $value) {
        	Permission::create($value);
        }
    }
}
