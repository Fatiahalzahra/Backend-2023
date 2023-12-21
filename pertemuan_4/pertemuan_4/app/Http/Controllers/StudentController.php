<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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

		 $validateData = $request->validate([
			'name' => 'required',
		 	'nim' => 'numeric|required',
		 	'email' => 'email|required',
		 	'jurusan' => 'required'
		 ]);

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
	public function register(Request $request){
		#menangkap inputan
		$input = [
			'name' => $request->name,
			'email' => $request->email,
			'password' => Hash::make($request->password)
		];
		#mengistal data ke tabel user
		$user = User::create($input);
		$data = [
			'massage'=>'User is created succesfully'
		];
		#mengister response JSON
		return response()->json($data,200);
	}
	public function login(Request $request) {
		#menangkap input dasar 
		$input =[
			'email'=> $request->email,
			'password'=> $request->password
		];

		#mengambil data DB
		$user = user::where (['email'])->first();

		#membandingkan input user dengan input DB
		$isloginSuccesfully = (
			$input['email'] == $user->email 
			&&
			Hash::check($input ['password'], $user->email)
		);
		if ($isloginSuccesfully){
			#membuat token 
			$token =$user->CreateToken('auth_token');
			$data = [
				'massage' => $token->plainTextToken
			];
			#mengembalikan respon json 
			return response()->json($data, 200);
		}else{
				$data =[
					'massage' => "Username or password is wrong"
				];
				return response()->json($data, 404);
			}
		}

		
	}
