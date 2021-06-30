<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required'
        ]);
        // dd($request->all());
        $student = new Student;
        $student->nama = $request->nama;
        $student->alamat = $request->alamat;
        $student->no_telp = $request->no_telp;
        $student->save();

        return response()->json([
            'message' => 'Student berhasil ditambahkan',
            'data_student' => $student
        ], 200);
    }

    //edit api
    public function edit($id)
    {
        $student = Student::find($id);
        // dd($student);

        return response()->json([
            'message' => 'success',
            'data_student' => $student
        ], 200);
    }

    //update data yang telah diupdate
    public function update(Request $request, $id)
    {
        $student = Student::find($id);

        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
        ]);

        $student->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp
        ]);

        return response()->json([
            'message' => 'success update data',
            'data_student' => $student
        ], 200);
    }

    //delete data by id
    public function delete($id)
    {
        Student::find($id)->delete();

        return response()->json([
            'message' => 'success hapus data',
        ]);
    }
}
