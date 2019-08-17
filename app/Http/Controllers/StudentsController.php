<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt; //menggunakan encrypt

class StudentsController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = \App\Student::all();
        // return view('students.index', ['students' => $students]);
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $student = new Student;   //cara ke 1 untuk menyimpan data
        // $student->nama      = $request->nama;
        // $student->npm       = $request->npm;
        // $student->email     = $request->email;
        // $student->jurusan   = $request->jurusan;
        // $student->save();
        

        //\App\Student::create($request->all()); //cara ke 3 untuk menyimpan data (harus sudah ditambah fillable di model)


        $request->validate([
            'nama'      => 'required',
            'npm'       => 'required|unique:students,npm',
            'email'     => 'required|email|unique:students,email',
            'jurusan'   => 'required',
            'image'     => 'required|image|max:1999',
        ]);


        $filename = uniqid().'.'.$request->image->getClientOriginalExtension();     
        $request->image->move(base_path('public/image/upload_students/'),$filename);     

        \App\Student::create([ //cara ke 2 untuk menyimpan data (harus sudah ditambah fillable di model)
            'nama'      => $request->nama,
            'npm'       => $request->npm,
            'email'     => $request->email,
            'jurusan'   => $request->jurusan,
            'image'     => $filename,
        ]);

        return redirect('/students')->with('message', "Data berhasil ditambah.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {

        $request->validate([
            'nama'      => 'required',
            'npm'       => 'required|unique:students,email,'.$student->id,
            'email'     => 'required|email|unique:students,email,'.$student->id,
            'jurusan'   => 'required',
        ]);



        if($request->hasFile('image')){
            $request->image->move(base_path('public/image/upload_students/'),$student->image);
        };

        \App\Student::where('id', $student->id)
                    ->update([
                        'nama'      => $request->nama,
                        'npm'       => $request->npm,
                        'email'     => $request->email,
                        'jurusan'   => $request->jurusan,
                        

                    ]);
        return  redirect('/students')->with('message', "Data berhasil diubah!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        // unlink(base_path("public/image/upload_students/".$student->image)); //delete_file_on_laravel

        \App\Student::destroy($student->id);
        return  redirect('/students')->with('message', "Data berhasil dihapus!");

    }
}
