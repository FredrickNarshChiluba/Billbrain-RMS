<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::create([
            'name' => 'Diploma in Computer Science',
            'code' => 'DCS',
            'duration' => '24',
            'fees' => 450000,
        ]);

        Course::create([
            'name' => 'Diploma in Information Technology',
            'code' => 'DIT',
            'duration' => '24',
            'fees' => 375000,
        ]);

        Course::create([
            'name' => 'Diploma in Networking & Hardware Maintenance',
            'code' => 'DNHM',
            'duration' => '24',
            'fees' => 375000,
        ]);

        Course::create([
            'name' => 'Diploma in Software Engineering',
            'code' => 'DSE',
            'duration' => '24',
            'fees' => 400000,
        ]);

        Course::create([
            'name' => 'Diploma in Computer Graphics Design & Editing',
            'code' => 'DCGDE',
            'duration' => '24',
            'fees' => 350000,
        ]);

        Course::create([
            'name' => 'Diploma in Cyber Security and Digital Forensics',
            'code' => 'DCSDF',
            'duration' => '24',
            'fees' => 425000,
        ]);

        Course::create([
            'name' => 'Diploma in Digital Marketing',
            'code' => 'DDM',
            'duration' => '24',
            'fees' => 375000,
        ]);

        Course::create([
            'name' => 'Diploma in GIS & Remote Sensing',
            'code' => 'DGRS',
            'duration' => '24',
            'fees' => 425000,
        ]);

        Course::create([
            'name' => 'Diploma in Business Computing',
            'code' => 'DBC',
            'duration' => '24',
            'fees' => 350000,
        ]);

        Course::create([
            'name' => 'Certificate in Computer Science',
            'code' => 'CCS',
            'duration' => '24',
            'fees' => 350000,
        ]);

        Course::create([
            'name' => 'Certificate in Information Technology',
            'code' => 'CIT',
            'duration' => '24',
            'fees' => 325000,
        ]);

        Course::create([
            'name' => 'Certificate in Networking & Hardware Maintenance',
            'code' => 'CNHM',
            'duration' => '24',
            'fees' => 325000,
        ]);

        Course::create([
            'name' => 'Certificate in Software Engineering',
            'code' => 'CSE',
            'duration' => '24',
            'fees' => 350000,
        ]);

        Course::create([
            'name' => 'Certificate in Computer Graphics Design & Editing',
            'code' => 'CCGDE',
            'duration' => '24',
            'fees' => 300000,
        ]);

        Course::create([
            'name' => 'Certificate in Cyber Security and Digital Forensics',
            'code' => 'CCSBF',
            'duration' => '24',
            'fees' => 375000,
        ]);

        Course::create([
            'name' => 'Certificate in Digital Marketing',
            'code' => 'CDM',
            'duration' => '24',
            'fees' => 350000,
        ]);

        Course::create([
            'name' => 'Certificate in GIS & Remote Sensing',
            'code' => 'CGRS',
            'duration' => '24',
            'fees' => 375000,
        ]);

        Course::create([
            'name' => 'Certificate in Business Computing',
            'code' => 'CBC',
            'duration' => '24',
            'fees' => 325000,
        ]);
    }
}
