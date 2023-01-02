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
      $author_permissions = [1, 2, 3, 4];
      foreach ($author_permissions as $permission) {
        RolesPermissions::insert([
            'role_id' => '2',
            'permission_id' => $permission,
        ]);
      }

      $admin_permissions = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17];
      foreach ($admin_permissions as $permission) {
        RolesPermissions::insert([
            'role_id' => '3',
            'permission_id' => $permission,
        ]);
      }

      $super_admin_permissions = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18 , 19, 20, 21];
      foreach ($super_admin_permissions as $permission) {
        RolesPermissions::insert([
            'role_id' => '4',
            'permission_id' => $permission,
        ]);
      }
    }
}
