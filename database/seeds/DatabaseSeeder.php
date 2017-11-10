<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call('UsuarioSeeder');
        $this->call('MedicoSeeder');
        $this->call('CitasSeeder');
    }
}
    /**
    *
     */
     class UsuarioSeeder extends Seeder
     {

       public function run(){
         DB::table('usuarios');
       }
     }

     /**
      *
      */
     class MedicoSeeder extends Seeder
     {
       public  function run(){
         DB::table('medicos');
       }
     }

     /**
      *
      */
     class CitasSeeder extends Seeder
     {

       public function run()
       {
         DB::table('citas_medicas');
       }
     }
