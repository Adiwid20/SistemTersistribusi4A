<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\DB;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function imp()
    {
        //
        return view('mahasiswa.import');
    }


    public function export() 
    {
        return Excel::download(new UsersExport, 'mahasiswa.xlsx');

    }

    public function import(Request $request) 
    {
        $file = $request->file('image');
        Excel::import(new UsersImport, $file);
        
        return redirect('/')->with('success', 'All good!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function biodata($id)
    {
        $data = DB::table('mahasiswas')
            ->where('mahasiswa_id', $id)
            ->get();
        //dd($data);
        return view('mahasiswa.biodata', ['data' => $data]); //
    }
    public function mahasiswa(Request $request)
    {
        if ($request->has('search')) {
            $data = Mahasiswa::where('mahasiswa_name', 'LIKE', '%' . $request->search . '%')
                ->paginate(5)
                ->onEachSide(1)
                ->fragment('mahasiswa');
            // $data = Mahasiswa::where('mahasiswa_nim', 'LIKE', '%' . $request->search . '%')->paginate(5)->onEachSide(1)->fragment('mahasiswa');
            // $data = Mahasiswa::where('mahasiswa_tlp', 'LIKE', '%' . $request->search . '%')->paginate(5)->onEachSide(1)->fragment('mahasiswa');
            // $data = Mahasiswa::where('mahasiswa_date', 'LIKE', '%' . $request->search . '%')->paginate(5)->onEachSide(1)->fragment('mahasiswa');
        } else {
            $data = Mahasiswa::paginate(5);
        }
        $title = 'Mahasiswa';

        return view('mahasiswa.list', compact('title', 'data'));
    }

    public function create()
    {
        //
        return view('mahasiswa.upload', ['Title' => 'Upload Data']); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // $save = $request->file('image');
        // $name = time() . $save->getClientOriginalName();
        // $path = $request->file('image')->storeAs('/assets/img/mahasiswa', $name);
        // $save->move(\base_path() . '/public/assets/img/mahasiswa', $name);
        $data = array_merge([
            'mahasiswa_name' => $request->mahasiswa_name,
            'mahasiswa_nim' => $request->mahasiswa_nim,
            'mahasiswa_jk' => $request->mahasiswa_jk,
            'mahasiswa_status' => $request->mahasiswa_status,
            'mahasiswa_semester' => $request->mahasiswa_semester,
            'ipk' => $request->ipk,
            'mahasiswa_tlp' => $request->mahasiswa_tlp,
            'mahasiswa_date' => $request->mahasiswa_date,
            'mahasiswa_agama' => $request->mahasiswa_agama,
            'mahasiswa_email' => $request->mahasiswa_email,
            'mahasiswa_tempat' => $request->mahasiswa_tempat,
            'mahasiswa_address' => $request->mahasiswa_address,
            'mahasiswa_class' => $request->mahasiswa_class,
            'mahasiswa_study' => $request->mahasiswa_study,
        ]);

        Mahasiswa::create($data);
        return redirect()->route('mahasiswa');
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
        //
        $data = Mahasiswa::find($id);
        return view('mahasiswa.update', compact('data'));
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
        //
        $data = Mahasiswa::find($id);
        
        $data = array_merge([
            // 'mahasiswa_id' => $request->mahasiswa_id,
            'mahasiswa_name' => $request->mahasiswa_name,
            'mahasiswa_nim' => $request->mahasiswa_nim,
            'mahasiswa_jk' => $request->mahasiswa_jk,
            'mahasiswa_status' => $request->mahasiswa_status,
            'mahasiswa_semester' => $request->mahasiswa_semester,
            'ipk' => $request->ipk,
            'mahasiswa_tlp' => $request->mahasiswa_tlp,
            'mahasiswa_date' => $request->mahasiswa_date,
   
            'mahasiswa_agama' => $request->mahasiswa_agama,
            'mahasiswa_email' => $request->mahasiswa_email,
            'mahasiswa_address' => $request->mahasiswa_address,
            'mahasiswa_class' => $request->mahasiswa_class,
            'mahasiswa_study' => $request->mahasiswa_study,
        ]);

        Mahasiswa::where('mahasiswa_id', $id)->update($data);
        return redirect()->route('mahasiswa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = Mahasiswa::find($id)->delete();
        return redirect()->route('mahasiswa');
    }
}
