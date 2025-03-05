<?php

namespace App\Http\Controllers\Student;

use App\Models\Belt;
use Inertia\Inertia;
use App\Models\Student;
use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;

class StudentController extends Controller
{
    public function index()
    {
        return Inertia::render('admin/students/Index', [
            'students' => Student::with('belt')->get(),
            'belts' => Belt::all()
        ]);
    }

    public function create()
    {
        return Inertia::render('admin/students/Create', [
            'belts' => Belt::all()
        ]);
    }

    public function store(StudentRequest $request)
    {
        $data = $request->validated();

        Student::create($data);

        return redirect()->route('students.index')->with('success', 'Aluno cadastrado com sucesso!');
    }

    public function show(Student $student)
    {
        return Inertia::render('admin/students/Show', [
            'student' => $student->load('belt'),
            'belts' => Belt::all(),
        ]);
    }

    public function update(StudentRequest $request, Student $student)
    {
        $data = $request->validated();

        $student->update($data);

        return redirect()->route('students.index')->with('success', 'Aluno atualizado com sucesso!');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Aluno excluido com sucesso!');
    }
}
