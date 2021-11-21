<?php

namespace App\Http\Controllers;

use App\Models\Patients;
use App\Models\Statuses;
use Illuminate\Http\Request;


class PatientController extends Controller
{
    function getAll()
    {
        $dataPatient = Patients::count();
        if ($dataPatient == 0) {
            $data = [ 
                "message" => " Data is empty!"
            ];

        } else{
            $dataPatient = Patients::all();
            $data = [
                "message" => "Get All Resource",
                "data" => $dataPatient
            ];
        }
        return response()->json($data, 200);
    }

    function createData(Request $request)
    {
        $name        = $request->name;
        $phone       = $request->phone;
        $address     = $request->address;
        $statuses_id = $request->statuses_id;
        $in_date_at  = date('Y-m-d H:i:s');
        $out_date_at = date('Y-m-d H:i:s');

        $data_array = [];

        if ($name == null) {array_push($data_array, "Nama");}
        if ($phone == null) {array_push($data_array, "Phone");}
        if ($address == null) {array_push($data_array, "Address");}
        if ($statuses_id == null) {array_push($data_array, "Statuses_id");}

        if ($data_array == null) {
            $dataPatient = Patients::create([
                "name"        => $name,
                "phone"       => $phone,
                "address"     => $address,
                "statuses_id" => $statuses_id,
                "in_date_at"  => $in_date_at,
                "out_date_at" => $out_date_at,
            ]);

            $data = [
                "message" => "Resource is added successfully",
                "data" => $dataPatient
            ];
            return response()->json($data, 201);
        } else {
            $data = [
                "message" => "The data below cannot be empty",
                "data" => $data_array
            ];
            return response()->json($data, 200);
        }
    }

    function getById($id)
    {
        $dataPatient = Patients::find($id);
        if ($dataPatient == null) {
            $errorMessage = [
                "Message" => 'Resource not found'
            ];
            return response()->json($errorMessage,404);
        }
        else {
            $data = [
                "message" => "Get Detail Resource",
                "data" => $dataPatient
            ];
            return response()->json($data, 200);
        }
    }

    function updateData(Request $request, $id)
    {
        $name        = $request->name;
        $phone       = $request->phone;
        $address     = $request->address;
        $statuses_id = $request->status_id;
        $in_date_at  = date('Y-m-d H:i:s');
        $out_date_at = date('Y-m-d H:i:s');

        $data = Patients::find($id);//cek data

        if ($name == null and $phone == null and $address == null and $statuses_id == null) {
            $errorMessage = [
                "Message" => 'The data below cannot be empty'
            ];
            return response()->json($errorMessage,404);
        }
        else{
            if ($data) {
                
                if ($name != null) {$data->update(["name" => $name]);}
                if ($phone != null) {$data->update(["phone" => $phone]);}
                if ($address != null) {$data->update(["address" => $address]);}
                if ($statuses_id != null) {$data->update(["statuses_id" => $statuses_id]);}
                
                $data->update(["updated_at" => date('Y-m-d H:i:s') ]);
                $message = [
                    "Message" => "Resource is update successfully",
                    "data" => $data
                ];
                $data = Patients::find($id);
                return response()->json($message, 200);
            }
            else{
                $errorMessage = [
                    "Message" => 'Resource not found'
                ];
                return response()->json($errorMessage,404);
            }
        }
    }

    function deleteData(Request $request, $id)
    {
        $data = Patients::find($id);
        if ($data) {
            $data->delete();
            $errorMessage = [
                "Message" => "Resource is delete successfully"
            ];
            return response()->json($errorMessage,200);
        }
        else{
            $errorMessage = [
                "Message" => 'Resource not found'
            ];
            return response()->json($errorMessage,404);
        }
    }

    function getByName($name)
    {
        $dataPatient = Patients::where('name',$name)->get();

        if ($dataPatient->count() > 0) {
            $data = [
                "message" => "Get searched resource",
                "data" => $dataPatient
            ];
            return response()->json($data, 200);
        }
        else {
            $errorMessage = [
                "Message" => 'Resource not found'
            ];
            return response()->json($errorMessage,404);
        }
    }

    function getStatusPositive()
    {
        $data       = \App\Models\Patients::where('statuses_id', 'like', '1')->with('statuses')->get();
        $total_data =  \App\Models\Patients::where('statuses_id', 'like', '1')->with('statuses')->count();

        if ($total_data > 0) {
            $data = [
            'message' => 'Get positive resource',
            'total' => $total_data,
            'data' => $data
            ];
            return response()->json($data, 200);
        }
        else {
            $errorMessage = [
                "Message" => 'Resource not found'
            ];
            return response()->json($errorMessage,404);
        } 
    }

    function getStatusRecovered()
    {
        $data       = \App\Models\Patients::where('statuses_id', 'like', '2')->with('statuses')->get();
        $total_data =  \App\Models\Patients::where('statuses_id', 'like', '2')->with('statuses')->count();
        if ($total_data > 0) {
            $data = [
            'message' => 'Get recovered resource',
            'total' => $total_data,
            'data' => $data
        ];
            return response()->json($data, 200);
        }
        else {
            $errorMessage = [
                "Message" => 'Resource not found'
            ];
            return response()->json($errorMessage,404);
        }
    }

    function getStatusDead()
    {
        $data       = \App\Models\Patients::where('statuses_id', 'like', '3')->with('statuses')->get();
        $total_data =  \App\Models\Patients::where('statuses_id', 'like', '3')->with('statuses')->count();
        if ($total_data > 0) {
            $data = [
            'message' => 'Get dead resource',
            'total' => $total_data,
            'data' => $data
        ];
            return response()->json($data, 200);
        }
        else {
            $errorMessage = [
                "Message" => 'Resource not found'
            ];
            return response()->json($errorMessage,404);
        }
    }
}
