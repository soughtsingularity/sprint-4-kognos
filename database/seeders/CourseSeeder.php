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
                        ['title' => 'Diseño de Bases de datos', 'url' => 'https://www.youtube.com/embed/HXE169-n5pM'],
                        ['title' => 'Modelado de Bases de datos', 'url' => 'https://www.youtube.com/embed/aFgHVE_Y_YU'],
                        ['title' => 'Introduccion a SQL', 'url' => 'https://www.youtube.com/embed/UAuZvxPTi58&pp'],
                        ['title' => 'Introducción a NoSQL', 'url' => 'https://www.youtube.com/embed/3MWt3CCjHG8&t'],
                        ['title' => 'Curso MySQL', 'url' => 'https://www.youtube.com/embed/OuJerKzV5T0&t'],
                        ['title' => 'Curso MongoDB', 'url' => 'https://www.youtube.com/embed/DPdAfgmkNuE&t'],
                    ]
                ],
                [
                    'Chapter' => 3,
                    'title' => 'Introducción a Laravel',
                    'videos' => [
                        ['title' => 'Introducción a Laravel', 'url' => 'https://www.youtube.com/embed/laXc22YPGhg'],
                        ['title' => 'Testing con Laravel', 'url' => 'https://www.youtube.com/embed/BuDger5Ytbc'],
                        ['title' => 'Laravel con Docker', 'url' => 'https://www.youtube.com/embed/videoseries?list=PL8GYrmS0JFOTD5-il4O-2J8_GuucSYaQo'],
                        ['title' => 'LiveWire', 'url' => 'https://www.youtube.com/embed/ZRGCWjPkN68'],
                        ['title' => 'API Rest Laravel con TDD', 'url' => 'https://www.youtube.com/embed/MbHgmZV_BUc']
                    ]
                ],
                [
                    'Chapter' => 4,
                    'title' => 'Proyectos con Laravel',
                    'videos' => [
                        ['title' => 'CRUD con Laravel', 'url' => 'https://www.youtube.com/embed/inVNnyFW2aM'],
                        ['title' => 'REST API Crud', 'url' => 'https://www.youtube.com/embed/eLI8c_NtkBk'],
                        ['title' => 'E-Commerce', 'url' => 'https://www.youtube.com/embed/7v5NJS_VNQc'],
                        ['title' => 'DOble CRUD con Vue e Inertia', 'url' => 'https://www.youtube.com/embed/aaR9JNkFcnc'],
                    ]
                ]

            ])
        ]);
    }
}
