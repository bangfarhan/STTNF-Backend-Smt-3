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

    public function show($id)
    {
        $data = Student::find($id);
        if ($data == null) {
            $errorMessage = [
                "Message" => 'Maaf data dengan id '. $id. ' tidak ditemukan '
            ];
            return response()->json($errorMessage,404);
        }
        else {
        $nama = $data->nama;
        echo "Oke " . $nama;
        }
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
            "message" => "berhasil membuat data $nama ",
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


        $data = Student::find($id);
        if ($data) {
            $data->update([
                'nama' => $nama,
                'nim' => $nim,
                'email' => $email,
                'jurusan' => $jurusan
            ]);

            return response()->json($data, 200);
        }
        else{
            $errorMessage = [
                "Message" => 'Maaf data '. $nama. ' tidak terdaftar'
            ];
            return response()->json($errorMessage,404);
        }
        // Student::updateData($id, $data);
        // return StudentController::index();
  
    }

    function destroy($id)
    {
        $data = Student::find($id);
        if ($data) {
            $data->delete();
            $errorMessage = [
                "Message" => 'Menghapus data  bergasil'
            ];
            return response()->json($errorMessage,200);
        }
        else{
            $errorMessage = [
                "Message" => 'Maaf data tersebut tidak terdaftar'
            ];
            return response()->json($errorMessage,404);
        }
    }

}