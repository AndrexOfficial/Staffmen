<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $role_steward = new Role();
      $role_steward->name = 'Steward';
      $role_steward->description = 'Account Steward';
      $role_steward->save();
      $role_manager = new Role();
      $role_manager->name = 'Organizzatore';
      $role_manager->description = 'Account Manager';
      $role_manager->save();
      $role_admin = new Role();
      $role_admin->name = 'Admin';
      $role_admin->description = 'Account Admin';
      $role_admin->save();
    }
}
