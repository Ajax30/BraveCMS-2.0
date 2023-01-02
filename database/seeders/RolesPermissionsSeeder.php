<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RolesPermissions;

class RolesPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      RolesPermissions::insert([
        'role_id' => '1',
        'permission_id' => '7',
      ]);

      $author_permissions = [1, 2, 3];
      foreach ($author_permissions as $permission) {
        RolesPermissions::insert([
            'role_id' => '2',
            'permission_id' => $permission,
        ]);
      }

      $admin_permissions = [1, 2, 3, 4, 5, 6, 7, 8, 9];
      foreach ($admin_permissions as $permission) {
        RolesPermissions::insert([
            'role_id' => '3',
            'permission_id' => $permission,
        ]);
      }

      $all_permissions = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11];
      foreach ($all_permissions as $permission) {
        RolesPermissions::insert([
            'role_id' => '4',
            'permission_id' => $permission,
        ]);
      }
    }
}
