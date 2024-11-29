<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    // public function showStudents()
    // {
    //     $students = DB::table('students')
    //         ->join('cities', 'students.city', '=', 'cities.id')
    //         ->select('students.*', 'cities.city_name')
    //         ->get();
    //     // return view('welcome', ['data' => $students]);
    //     return view('welcome', compact('students'));
    // }

    // Raw SQL Queries
    public function showStudents()
    {
        $students = DB::select("select * from students");
        // return $students;
        foreach ($students as $student) {
            echo $student->name."<br>";
        }

        // $students = DB::insert("insert into students(name, email, age, city)
        //                     values(?,?,?,?)", ["Ram Kumar", "ram@gmail.com", 20, 3]);

        // $students = DB::update("update students set email='test@gmail.com' where id=?", [11]);

        // $students = DB::delete("delete from students where id=?", [11]);

        // return $students;
    }

    public function unionData()
    {
        $lecturers = DB::table('lecturers')
            ->select('name', 'email', 'city_name')
            ->join('cities', 'lecturers.city', '=', 'cities.id');

        $students = DB::table('students')
            ->union($lecturers)
            ->select('name', 'email', 'city_name')
            ->join('cities', 'students.city', '=', 'cities.id')
            ->get();
        return $students;
    }

    public function whenData()
    {
        $test = false;
        $students = DB::table('students')
            ->when($test, function ($query) {
                $query->where('age', '>', 20);
            }, function ($query) {
                $query->where('age', '<', 20);
            })
            ->get();
        return $students;
    }

    public function chunkData()
    {
        $students = DB::table('students')
            ->orderBy('id')
            ->chunk(3, function ($students) {
                echo "<div style='border: 1px solid red; margin-bottom: 15px;'>";
                foreach ($students as $student) {
                    echo $student->name . "<br>";
                }
                echo "</div>";
            });
    }
}
