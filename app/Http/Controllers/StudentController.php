<?php

namespace App\Http\Controllers;

use App\Http\Resources\StudentResource;
use App\Models\Student;
use Illuminate\Http\Request;
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
