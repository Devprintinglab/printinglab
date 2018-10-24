<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    //name: nombre del premiso
    //slug: ruta del permiso ejemplo user.index  user -> es el nombre del modulo index-> es la vista
    //description: descripcion del permiso
    Permission::create([
      'name'        =>'Ver Ventas',
      'slug'        =>'sale.index',
      'description' =>'Puede ver el modulo de ventas',
    ]);
  }
}
