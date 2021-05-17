<?php

use App\Department;
use Illuminate\Database\Seeder;

class DepartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = [
            'Andrologia',
            'Cardiologia',
            'Dermatologia',
            'Diabetologia',
            'Dietologia',
            'Endocrinologia',
            'Fisioterapia',
            'Ginecologia',
            'Infettivologia',
            'Medicina dello Sport',
            'Medico Legale',
            'Neurologia',
            'Oculistica',
            'Odontoiatria',
            'Oncologia',
            'Ortopedia',
            'Otorinolaringoiatria',
            'Pediatria',
            'Pneumologia',
            'Psichiatria',
            'Psicologia',
            'Radiologia',
            'Senologia',
            'Urologia'
        ];

        foreach ($departments as $department) {
            $newDepartment = new Department();

            $newDepartment->type = $department;
            $newDepartment->save();
        }
    }
}
