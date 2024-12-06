<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function create(){
        return view('admin.student.create');
    }

    public function store(Request $request){
        $students = DB::insert('INSERT into students (name, email, dob, created_at) values (?, ?, ?, ?)', [$request->input('name'),$request->input('email'),$request->input('date'),
        now()]);
        return redirect()->route('student.index', compact('students'));
    }

    public function edit($id){
        $students = DB::select('SELECT * from students where id= ?', [$id]);
        return view('admin.student.index', compact('students'));
    }

    public function index(){
        $students = DB::select('SELECT * from students ');
        return view('admin.student.index', compact('students'));
    }

    public function update(Request $request, $id){
        $students = DB::update('UPDATE students set name = ?, email = ?, dob = ? where id= ?', [$request->name,$request->email,$request->date, $id]);
        return redirect()->route('student.read', compact('students'));
    }

    public function delete($id){
        $students = DB::delete('DELETE students where id= ?', [$id]);
        return redirect()->route('student.read', compact('students'));
    }


}
