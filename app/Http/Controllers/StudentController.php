<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    protected $student;
    
    public function __construct(){
        $this->student = new Student();
    }

    public function index()
    {
        return $this->student->all();
    }

    public function store(Request $request)
    {
        return $this->student->create($request->all());
    }

    public function show(string $id)
    {
        $student = $this->student->find($id);
        if ($student) {
            return $student;
        } else {
            return response()->json(['message' => 'Student not found'], 404);
        }
    }

    public function update(Request $request, string $id)
    {
        $student = $this->student->find($id);
        if ($student) {
            $student->update($request->all());
            return $student;
        } else {
            return response()->json(['message' => 'Student not found'], 404);
        }
    }

    public function destroy(string $id)
    {
        $student = $this->student->find($id);
        if ($student) {
            $student->delete();
            return response()->json(['message' => 'Student deleted successfully'], 200);
        } else {
            return response()->json(['message' => 'Student not found'], 404);
        }
    }
}
