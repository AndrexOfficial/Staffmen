<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $role_steward = Role::where('name', 'Steward')->first();
      $role_manager  = Role::where('name', 'Organizzatore')->first();
      $role_admin = Role::where('name', 'Admin')->first();

      $Steward = new User();
      $Steward->name = 'Nome Steward';
      $Steward->email = 'steward@esempio.com';
      $Steward->password = bcrypt('secret');
      $Steward->save();
      $Steward->roles()->attach($role_steward);

      $Organizzatore = new User();
      $Organizzatore->name = 'Nome Organizzatore';
      $Organizzatore->email = 'host@esempio.com';
      $Organizzatore->password = bcrypt('secret');
      $Organizzatore->save();
      $Organizzatore->roles()->attach($role_manager);

      $Admin = new User();
      $Admin->name = 'Nome Admin';
      $Admin->email = 'admin@esempio.com';
      $Admin->password = bcrypt('secret');
      $Admin->save();
      $Admin->roles()->attach($role_admin);
    }
}
