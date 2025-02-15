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

      Permission::truncate();

      // Article permissions
      Permission::create([
        'slug' => 'view-articles',
        'label' => 'View articles',
        'description' => 'Gives a user the permission to view articles.'
      ]);

      Permission::create([
        'slug' => 'add-articles',
        'label' => 'Write articles',
        'description' => 'Gives a user the permission to write articles.'
      ]);

      Permission::create([
        'slug' => 'edit-articles',
        'label' => 'Edit articles',
        'description' => 'Gives a user the permission to edit her/his own articles.'
      ]);

      Permission::create([
        'slug' => 'delete-articles',
        'label' => 'Delete articles',
        'description' => 'Gives a user the permission to delete her/his own articles.'
      ]);

      // Article categories permissions
      Permission::create([
        'slug' => 'view-categories',
        'label' => 'View categories',
        'description' => 'Gives a user the permission to view the list of categories.'
      ]);

      Permission::create([
        'slug' => 'add-categories',
        'label' => 'Add categories',
        'description' => 'Gives a user the permission to create article categories.'
      ]);

      Permission::create([
        'slug' => 'edit-categories',
        'label' => 'Edit categories',
        'description' => 'Gives a user the permission to edit article categories.'
      ]);

      Permission::create([
        'slug' => 'delete-categories',
        'label' => 'Delete categories',
        'description' => 'Gives a user the permission to delete article categories.'
      ]);


      // Article tags permissions
      Permission::create([
        'slug' => 'view-tags',
        'label' => 'View tags',
        'description' => 'Gives a user the permission to view the list of tags.'
      ]);

      Permission::create([
        'slug' => 'add-tags',
        'label' => 'Add tags',
        'description' => 'Gives a user the permission to create article tags.'
      ]);

      Permission::create([
        'slug' => 'edit-tags',
        'label' => 'Edit tags',
        'description' => 'Gives a user the permission to edit article tags.'
      ]);

      Permission::create([
        'slug' => 'delete-tags',
        'label' => 'Delete tags',
        'description' => 'Gives a user the permission to delete article tags.'
      ]);

      // Article comments permissions
      Permission::create([
        'slug' => 'view-comments',
        'label' => 'View comments on the dashboard',
        'description' => 'Gives a user the permission to view article comments on the dashboard'
      ]);

      Permission::create([
        'slug' => 'delete-comments',
        'label' => 'Delete comments',
        'description' => 'Gives a user the permission to delete article comments'
      ]);

      Permission::create([
        'slug' => 'approve-comments',
        'label' => 'Approve comments',
        'description' => 'Gives a user the permission to approve article comments'
      ]);

      Permission::create([
        'slug' => 'unapprove-comments',
        'label' => 'Unapprove comments',
        'description' => 'Gives a user the permission to unapprove article comments'
      ]);

      // Pages
      Permission::create([
        'slug' => 'view-pages',
        'label' => 'View pages',
        'description' => 'Gives a user the permission to view the pages list (on the dashboard)'
      ]);

      Permission::create([
        'slug' => 'add-pages',
        'label' => 'Add pages',
        'description' => 'Gives a user the permission to add pages'
      ]);

      Permission::create([
        'slug' => 'edit-pages',
        'label' => 'Edit pages',
        'description' => 'Gives a user the permission to edit pages'
      ]);

      Permission::create([
        'slug' => 'delete-pages',
        'label' => 'Delete pages',
        'description' => 'Gives a user the permission to delete pages'
      ]);

      // Site settings
      Permission::create([
        'slug' => 'edit-settings',
        'label' => 'Edit site settings',
        'description' => 'Gives the super-admin the permission to edit site settings.'
      ]);  

      // User roles
      Permission::create([
        'slug' => 'manage-user-rights',
        'label' => 'Manage user rights',
        'description' => 'Gives the super-admin the permission to manage user rights'
      ]);

      Permission::create([
        'slug' => 'ban-users',
        'label' => 'Ban users',
        'description' => 'Gives the super-admin the permission to suspend user accounts'
      ]);
      
      Permission::create([
        'slug' => 'activate-users',
        'label' => 'Activate user accounts',
        'description' => 'Gives the super-admin the permission to activate user accounts'
      ]); 

      Permission::create([
        'slug' => 'assign-user-roles',
        'label' => 'Assign user roles',
        'description' => 'Gives the super-admin the permission to assign roles to users'
      ]);

    }
}
