<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Role::create([
        'name' => 'user',
        'label' => 'Basic User',
'description' => 'The Basic User can view and comment on articles.'
    ]);

    Role::create([
        'name' => 'author',
        'label' => 'Author',
'description' => 'In addition to being able to do all a Basic User can do, an Author can create articles, and also edit or delete his/her own articles.'
    ]);

    Role::create([
        'name' => 'admin',
        'label' => 'Site Administrator',
'description' => 'The Admin can view and comment on articles; create and edit article categories; create and edit and delete any articles; create and edit and delete users.'
    ]);

Role::create([
        'name' => 'superadmin',
        'label' => 'Superadmin',
'description' => 'The Superadmin can do everything that the Admin can do. Additionally, the Site owner can add or revoke Admin rights (role). The website has only one Superadmin.'
    ]);

    }
}
