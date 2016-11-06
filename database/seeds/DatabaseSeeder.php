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
        $this->call(ModuloSeeder::class);
        $this->call(FeatureSeeder::class);
        $this->call(CenarioSeeder::class);
        $this->call(StepSeeder::class);
        $this->call(CenarioStepSeeder::class);
        $this->call(UsuarioSeeder::class);
    }
}
