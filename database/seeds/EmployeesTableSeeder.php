<?php

use App\Employee;
use App\Position;
use Illuminate\Database\Seeder;
class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee::truncate();

        $this->seedEployeesWithOnlyPosition();
        $this->seedEployeesWithNotOnlyPosition();
       
    }

    private function seedEployeesWithOnlyPosition(){

        $positions = Position::withDepth()->where('is_only',true)->get();
        $previousEmployeeID=0;
        $depth=0;

        foreach ($positions as $key => $position) {
            $employee=factory(App\Employee::class)->make();
            
            $employee->position_id=$position->id;

            if ($position->depth!=$depth){

                $depth=$position->depth;
                $previousEmployeeID=  Employee::where('position_id',$position->parent_id)->first()->id;
            }

            $employee->supervisor_id=$previousEmployeeID;

            $employee->save();
        }

    }


    private function seedEployeesWithNotOnlyPosition(){

        $positions =Position::where('is_only',false)->get();

        $NUMBER_OF_EMPLOYEES = 2;
        $faker = Faker\Factory::create();

        foreach ($positions as $key => $position) {
            $employees=factory(App\Employee::class,$NUMBER_OF_EMPLOYEES)->make();
            foreach ($employees as $key => $employee) {
            
                $employee->position_id=$position->id;

                $id=$position->parent_id;
                $parentEmployees=Employee::where('position_id',$id)->get();
                $employee->supervisor_id=$faker->randomElement($parentEmployees)->id;
            
                $employee->save();
            }
        }
    }

}
