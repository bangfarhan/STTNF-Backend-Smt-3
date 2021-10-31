<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;    
class StudentController extends Controller
{
    //
    function index()
    {
        $response = Student::all();
        return response()->json($response, 200);
    }

    function create(Request $request)
    {
        $nama = $request->nama;
        $nim = $request->nim;
        $email = $request->email;
        $jurusan = $request->jurusan;
        $student = Student::create([
            "nama" => $nama,
            "nim" => $nim,
            "email" => $email,
            "jurusan" => $jurusan,
        ]);

        $data = [
            "message" => "student is created successfully",
            "data" => $student
        ];

        return response()->json($data, 200);
    }

    function update(Request $request, $id)
    {
        $nama = $request->nama;
        $nim = $request->nim;
        $email = $request->email;
        $jurusan = $request->jurusan;

        $data = array(
            "nama" => $nama,
            "nim" => $nim,
            "email" => $email,
            "jurusan" => $jurusan,
        );
        Student::updateData($id, $data);
        return StudentController::index();
  
    }

    function destroy($id)
    {
        Student::deleteData($id);
        return StudentController::index();
    }
}