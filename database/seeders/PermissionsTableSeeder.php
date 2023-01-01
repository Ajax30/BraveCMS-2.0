<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
      // Article permissions
      Permission::create([
        'slug' => 'create-article',
        'label' => 'Create article',
        'description' => 'Gives a user the permission to write articles.'
      ]);

      Permission::create([
        'slug' => 'edit-article',
        'label' => 'Edit article',
        'description' => 'Gives a user the permission to edit her/his own articles.'
      ]);

      Permission::create([
        'slug' => 'delete-article',
        'label' => 'Delete article',
        'description' => 'Gives a user the permission to delete her/his own articles.'
      ]);


      // Article categories permissions
      Permission::create([
        'slug' => 'create-category',
        'label' => 'Create category',
        'description' => 'Gives a user the permission to create article categories.'
      ]);

      Permission::create([
        'slug' => 'edit-category',
        'label' => 'Edit category',
        'description' => 'Gives a user the permission to edit article categories.'
      ]);

      Permission::create([
        'slug' => 'delete-category',
        'label' => 'Delete category',
        'description' => 'Gives a user the permission to delete article categories.'
      ]);

      // Article comments permissions
      Permission::create([
        'slug' => 'create-comment',
        'label' => 'Create comment',
        'description' => 'Gives a user the permission to add article comments on articles'
      ]);

      Permission::create([
        'slug' => 'edit-comment',
        'label' => 'Edit comment',
        'description' => 'Gives a user the permission to edit article comments'
      ]);

      Permission::create([
        'slug' => 'delete-comment',
        'label' => 'Delete comment',
        'description' => 'Gives a user the permission to delete article comments'
      ]);

      // User-related permissions
      Permission::create([
        'slug' => 'ban-user',
        'label' => 'Ban user',
        'description' => 'Gives the super-admin the permission to suspend user accounts'
      ]); 

      Permission::create([
        'slug' => 'assign-role',
        'label' => 'Assign user-role',
        'description' => 'Gives the super-admin the permission to assign roles to users'
      ]);

    }
}
