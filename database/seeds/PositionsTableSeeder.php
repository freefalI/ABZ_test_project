<?php

use App\Position;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


    $node = Position::create([
        'name' => 'Chief Executive Officer (CEO)',
        'is_only' => true,
        'children' => [
            [
                'name' => 'Chief Operation Officer (COO)',
                'is_only' => true,
            ],
            [
                'name' => 'Chief Finance Officer (CFO)',
                'is_only' => true,
            ],
            [
                'name' => 'Chief Technology Officer (CTO)',
                'is_only' => true,
                'children' => [
                    [
                        'name' => 'Senior Project Manager',
                        'is_only' => true,
                        'children' => [
                            [
                                'name' => 'Project manager',
                                'is_only' => false,
                                'children' => [
                                    [
                                        'name' => 'Team Leader',
                                        'is_only' => false,
                                        'children' => [
                                            [
                                                'name' => 'Senior Software Engineer',
                                                'is_only' => false,
                                            ],
                                            [
                                                'name' => 'Software Engineer',
                                                'is_only' => false,
                                            ],
                                            [
                                                'name' => 'Junior Software Engineer',
                                                'is_only' => false,
                                            ],
                                            [
                                                'name' => 'Programmer analyst',
                                                'is_only' => false,
                                            ],
                                        ],
                                    ],
                                ],
                            ],

                        ],
                    ],
                    [
                        'name' => 'Senior technical Head',
                        'is_only' => true,
                        'children' => [
                            [
                                'name' => 'Technical Head',
                                'is_only' => false,
                            ],
                        ],
                    ],
                    [
                        'name' => 'Senior Quality Analyst',
                        'is_only' => true,
                        'children' => [
                            [
                                'name' => 'Senior Quality Testing Officer',
                                'is_only' => false,
                            ],
                            [
                                'name' => 'Quality Testing Officer',
                                'is_only' => false,
                            ],
                        ],
                    ],

                ],
            ],
            [
                'name' => 'Chief Revenue Officer (CRO)',
                'is_only' => true,
            ],
            [
                'name' => 'Chief Resource Management Officer (CVO)',
                'is_only' => true,
                'children' => [
                    [
                        'name' => 'Senior Resource Management Officer',
                        'is_only' => false,
                        'children' => [
                            [
                                'name' => 'Human Resource Manager',
                                'is_only' => false,
                            ],
                        ],
                    ],
                ],
            ],
            [
                'name' => 'President',
                'is_only' => true,
                'children' => [
                    [
                        'name' => 'Vice president',
                        'is_only' => true,
                    ],
                ],
            ],
        ],
    ]);

/*
        [1, 'Chief Executive Officer (CEO)', 0, 0, true],
            [2, 'Chief Operation Officer (COO)', 1, 1, true],
            [3, 'Chief Finance Officer (CFO)', 1, 1, true],
            [4, 'Chief Technology Officer (CTO)', 1, 1, true],
                [9,'Senior Project Manager', 4, 2, true],
                    [11,'Project manager', 9, 3, false],
                        [21,'Team Leader', 11, 4, false],
                            [22,'Senior Software Engineer', 21, 5, false],
                            [23,'Software Engineer', 21, 5, false],
                            [24,'Junior Software Engineer', 21, 5, false],
                            [25,'Programmer analyst', 21, 5, false],
            
                [14,'Senior technical Head', 4, 2, true],
                    [15,'Technical Head', 14, 3, false],
                [16,'Senior Quality Analyst', 4, 2, true],
                    [17,'Senior Quality Testing Officer', 16, 3, false],
                    [18,'Quality Testing Officer', 16, 3, false],

            [5, 'Chief Revenue Officer (CRO)', 1, 1, true],
            [6, 'Chief Resource Management Officer (CVO)', 1, 1, true],
                [19,'Senior Resource Management Officer', 6, 2, true],
                    [20,'Human Resource Manager', 19, 3, false],
            [7, 'President', 1, 1, true],
                [8, 'Vice president', 7, 2, true],
        ]);



        $now = now()->toDateTimeString();

        // [id, position, supervisorID, nestingLevel, is_only]
        $positionsData = [
            [1, 'Chief Executive Officer (CEO),', 0, 0, true],
                [2, 'Chief Operation Officer (COO)', 1, 1, true],
                [3, 'Chief Finance Officer (CFO)', 1, 1, true],
                [4, 'Chief Technology Officer (CTO)', 1, 1, true],
                    [9,'Senior Project Manager', 4, 2, true],
                        [11,'Project manager', 9, 3, false],
                            [21,'Team Leader', 11, 4, false],
                                [22,'Senior Software Engineer', 21, 5, false],
                                [23,'Software Engineer', 21, 5, false],
                                [24,'Junior Software Engineer', 21, 5, false],
                                [25,'Programmer analyst', 21, 5, false],
                
                    [14,'Senior technical Head', 4, 2, true],
                        [15,'Technical Head', 14, 3, false],
                    [16,'Senior Quality Analyst', 4, 2, true],
                        [17,'Senior Quality Testing Officer', 16, 3, false],
                        [18,'Quality Testing Officer', 16, 3, false],

                [5, 'Chief Revenue Officer (CRO)', 1, 1, true],
                [6, 'Chief Resource Management Officer (CVO)', 1, 1, true],
                    [19,'Senior Resource Management Officer', 6, 2, true],
                        [20,'Human Resource Manager', 19, 3, false],
                [7, 'President', 1, 1, true],
                    [8, 'Vice president', 7, 2, true],

                   
        ];


        $positions = [];
        foreach ($positionsData as $key => $position) {
            $positions[] = [
                'id' => $position[0],
                'name' => $position[1],
                'supervisor_position_id' => $position[2],
                'nesting_level' => $position[3],
                'is_only' => $position[4],
                'created_at'=> $now,
                'updated_at'=> $now
            ];
        }

        DB::table('positions')->insert($positions);    
*/
    }
}
