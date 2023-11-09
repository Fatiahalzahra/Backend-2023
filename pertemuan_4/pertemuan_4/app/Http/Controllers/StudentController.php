<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
	{
        # menggunakan model Student untuk select data
		$students = Student::all();

		if (!empty($students)) {
			$response = [
				'message' => 'Menampilkan Data Semua Student',
				'data' => $students,
			];
			return response()->json($response, 200);
		} else {
			$response = [
				'message' => 'Data tidak ada'
			];
			return response()->json($response, 404);
		}
	}

	public function store(Request $request) 
	{

		 $input = [
		 	'name' => $request->name,
		 	'nim' => $request->nim,
		 	'email' => $request->email,
		 	'jurusan' => $request->jurusan
		 ];

		$student = Student::create($request->all());

		$response = [
			'message' => 'Data Student Berhasil Dibuat',
			'data' => $student,
		];

		return response()->json($response, 201);
	}

	public function show($id)
	{
		$student = Student::find($id);

		if ($student) {
			$response = [
				'message' => 'Get detail student',
				'data' => $student
			];
	
			return response()->json($response, 200);
		} else {
			$response = [
				'message' => 'Data not found'
			];
			
			return response()->json($response, 404);
		}
	}

	public function update(Request $request, $id)
	{
		$student = Student::find($id);

        if (!$student) {
            $data = [
                'message' => 'Student not found'
            ];

            return response()->json($data, 404);
        }

        $input = [
            'name' => $request->name ?? $student->name,
            'nim' => $request->nim ?? $student->nim,
            'email' => $request->email ?? $student->email,
            'jurusan' => $request->jurusan ?? $student->jurusan
        ];

        $student->update($input);

        $data = [
            'message' => 'Student successfully edited',
            'data' => $student
        ];

        return response()->json($data, 201);
	}

	public function destroy($id)
	{
		$student = Student::find($id);

		if ($student) {
			$response = [
				'message' => 'Student is delete',
				'data' => $student->delete()
			];

			return response()->json($response, 200); 
		} else {
			$response = [
				'message' => 'Data not found'
			];

			return response()->json($response, 404);
		}
	}
}