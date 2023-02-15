<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LopHoc;
use App\Models\SinhVien;
class SinhVienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        
        $students = SinhVien::all();
        // dd($students);
        return view('sinh-vien.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lop_hoc = LopHoc::where('trang_thai',1)->get();
        return view('sinh-vien.add',compact('lop_hoc'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        if($request->hasFile('file')){
            $file = $request->file;
            $file_name =  $file->getClientOriginalName();
            $file->move(public_path('uploads'),$file_name);
            
        } else {
            $file_name = '';
        }
        $request->merge(['hinh_anh'=> $file_name]);
        try {
            SinhVien::create($request->all());
            return redirect()->route('sinh-vien.index');
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = SinhVien::find($id);
        $lop_hoc = LopHoc::where('trang_thai',1)->get();
        return view('sinh-vien.edit',compact('student','lop_hoc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student = SinhVien::find($id);
        if($request->hasFile('file')){
            $file = $request->file;
            $file_name =  $file->getClientOriginalName();
            $file->move(public_path('uploads'),$file_name);
            
        } else {
            $file_name = $student->hinh_anh;
        }

        $request->merge(['hinh_anh'=> $file_name]);
        try {
            $student->update($request->all());
            return redirect()->route('student.index');
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
           SinhVien::find($id)->delete();
           return redirect()->back();
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
        }
    }
}