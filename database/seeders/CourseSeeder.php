<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        Course::create([
            'title' => 'Desarrollo web con PHP y Laravel',
            'description' => 'Curso de desarrollo web con PHP y Laravel',
            'content' => json_encode([
                [
                    'Chapter' => 1,
                    'title' => 'Introducción a PHP',
                    'videos' => [
                        ['title' => 'Introducción a PHP con Mysql', 'url' => 'https://www.youtube.com/embed/_rEj-RE8cLs'],
                        ['title' => 'Testing con PHP Unit', 'url' => 'https://www.youtube.com/embed/UN7_ptjHaGk'],
                    ]
                ],
                [
                    'Chapter' => 2,
                    'title' => 'Bases de datos',
                    'videos' => [
                        ['title' => 'Diseño de Bases de datos', 'url' => 'https://www.youtube.com/watch?v=HXE169-n5pM&t=17555s&pp=ygUYam9ubWlyY2hhIGJhc2VzIGRlIGRhdG9z'],
                        ['title' => 'Modelado de Bases de datos', 'url' => 'https://www.youtube.com/watch?v=aFgHVE_Y_YU&t=41s&pp=ygUYam9ubWlyY2hhIGJhc2VzIGRlIGRhdG9z'],
                        ['title' => 'Introduccion a SQL', 'url' => 'https://www.youtube.com/watch?v=UAuZvxPTi58&pp=ygUYam9ubWlyY2hhIGJhc2VzIGRlIGRhdG9z'],
                        ['title' => 'Introducción a NoSQL', 'url' => 'https://www.youtube.com/watch?v=3MWt3CCjHG8&t=7548s&pp=ygUYam9ubWlyY2hhIGJhc2VzIGRlIGRhdG9z'],
                        ['title' => 'Curso MySQL', 'url' => 'https://www.youtube.com/watch?v=OuJerKzV5T0&t=32s&pp=ygUObW91cmVkZXYgbXlzcWw%3D'],
                        ['title' => 'Curso MongoDB', 'url' => 'https://www.youtube.com/watch?v=DPdAfgmkNuE&t=1855s'],
                    ]
                ],
                [
                    'Chapter' => 3,
                    'title' => 'Introducción a Laravel',
                    'videos' => [
                        ['title' => 'Introducción a Laravel', 'url' => 'https://www.youtube.com/watch?v=laXc22YPGhg&list=PLZ2ovOgdI-kVtF2yQ2kiZetWWTmOQoUSG'],
                        ['title' => 'Testing con Laravel', 'url' => 'https://www.youtube.com/watch?v=BuDger5Ytbc&list=PLdXLsjL7A9k0esh2qNCtUMsGPLUWdLjHp'],
                        ['title' => 'Laravel con Docker', 'url' => 'https://www.youtube.com/playlist?list=PL8GYrmS0JFOTD5-il4O-2J8_GuucSYaQo'],
                        ['title' => 'LiveWire', 'url' => 'https://www.youtube.com/watch?v=ZRGCWjPkN68&list=PLLtGuz4yR5Fj_8Ri94Jk1mBo9Alsyv8kB'],
                        ['title' => 'API Rest Laravel con TDD', 'url' => 'https://www.youtube.com/watch?v=MbHgmZV_BUc&list=PL8GYrmS0JFORQ8PRPuaIQ769aDWVkrnjj3']
                    ]
                ],
                [
                    'Chapter' => 4,
                    'title' => 'Proyectos con Laravel',
                    'videos' => [
                        ['title' => 'CRUD con Laravel', 'url' => 'https://www.youtube.com/watch?v=inVNnyFW2aM&list=PLoRfWwOOv4jytDCGQuOyNJeFkwoddMap5'],
                        ['title' => 'REST API Crud', 'url' => 'https://www.youtube.com/watch?v=eLI8c_NtkBk&t=54s&pp=ygUNY3J1ZCBsYXJhdmVsIA%3D%3D'],
                        ['title' => 'E-Commerce', 'url' => 'https://www.youtube.com/watch?v=7v5NJS_VNQc&list=PLz_YkiqIHestjKNf-U5QljoulWcYyZsR1'],
                        ['title' => 'DOble CRUD con Vue e Inertia', 'url' => 'https://www.youtube.com/watch?v=aaR9JNkFcnc'],
                    ]
                ]

            ])
        ]);
    }
}
