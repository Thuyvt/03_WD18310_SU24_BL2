<?php

namespace App\Http\Controllers;

use App\Http\Resources\StudentResource;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Mockery\Exception;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            $students = Student::all();
            // C1:
//        return StudentResource::collection($students); // list collect
            // C2:
            $arr = [
                'status' => true,
                'message' => "Lấy danh sách thành công",
                'data' => StudentResource::collection($students)
            ];
            return response()->json($arr, 200);
        } catch (Exception $exception) {
            $arr = [
                'status' => false,
                'message' => "Có lỗi xảy ra",
                'description' => $exception->getMessage()
            ];
            return response()->json($arr, $exception->getCode());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate
        $validator = Validator::make($request->all(), [
            'ten' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email']
        ]);
        if ($validator->fails()) {
            $res = [
                'status' => false,
                'message' => 'Lỗi kiểm tra dữ liệu',
                'data' => $validator->errors()
            ];
            return response()->json($res, 400);
        }
        // Lưu ý dùng $request->all() trong trường hợp body gửi lên có key == tên trường trong csdl
        // Student::query()->create($request->all());
        $student = Student::query()->create([
            'name' => $request->ten,
            'email' => $request->email,
            'major_id' => $request->maChuyenNganh,
            'dob' => $request->ngaySinh,
        ]);
        $res = [
              'status' => true,
              'message' => 'Tạo mới thành công',
              'data' => new StudentResource($student)
        ];
        return response()->json($res, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
//        dd($id);
        $student = Student::query()->where('id', $id)->first();
        if (!$student) {
            $res = [
                'status' => false,
                'message' => 'Không tìm thấy sinh viên'
            ];
            return response()->json($res, 404);
        }
        $res = [
            'status' => true,
            'message' => 'Tìm thấy sinh viên',
            'data' => new StudentResource($student)
        ];

        return response()->json($res, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate
        $validator = Validator::make($request->all(), [
            'ten' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email']
        ]);
        if ($validator->fails()) {
            $res = [
                'status' => false,
                'message' => 'Lỗi kiểm tra dữ liệu',
                'data' => $validator->errors()
            ];
            return response()->json($res, 400);
        }
        // Tìm đối tượng
        $student = Student::query()->where('id', $id)->first();
        if (!$student) {
            $res = [
                'status' => false,
                'message' => 'Không tìm thấy sinh viên'
            ];
            return response()->json($res, 404);
        }
        // cập nhật thông tin
        // C1:
        $student->update([
            'name' => $request->ten,
            'email' => $request->email,
            'major_id' => $request->maChuyenNganh,
            'dob' => $request->ngaySinh,
        ]);
//        // C2:
//        $student->name = $request->ten;
//        $student->email = $request->email;
//        // ..
//        $student->save();
        $res = [
            'status' => true,
            'message' => 'Cập nhật thành công',
            'data' => new StudentResource($student)
        ];
        return response()->json($res, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
//        DB::beginTransaction();
        $student = Student::query()->where('id', $id)->first();
        if (!$student) {
            $res = [
                'status' => false,
                'message' => 'Không tìm thấy sinh viên'
            ];
            return response()->json($res, 404);
        }
        // xóa student
        $student->delete();

        $res = [
            'status' => true,
            'message' => 'Xóa thành công'
        ];
        return response()->json($res, 200);
//        DB::commit();
    }
}
