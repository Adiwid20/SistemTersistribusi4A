<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }



    public function dosen(Request $request)
    {
    
        if($request->has('search')){
            $data = Dosen::where('dosen_name','LIKE','%'.$request->search.'%')->sortable()->paginate(5)->onEachSide(1)->fragment('dosen');
        }else{
            $data = Dosen::paginate(5);
        }
        $title ='Dosen';
        return view('dosen.list', compact('title', 'data'));
      
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dosen.upload', ['Title' => 'Upload Data']); 

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
        $save = $request->file('image');
        $name = time() . $save->getClientOriginalName('image');
        $path = $request->file('image')->storeAs('/assets/img/dosen', $name);
        $save->move(\base_path() . '/public/assets/img/dosen', $name);
        $data = array_merge([
            'dosen_id' => $request->dosen_id,
            'dosen_name' => $request->dosen_name,
            'dosen_nip' => $request->dosen_nip,
            'dosen_jk' => $request->dosen_jk,
            'dosen_job' => $request->dosen_job,
            'dosen_photo' => $path,
        ]);

        Dosen::create($data);
        return redirect()->route('dosen');
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
        $data = Dosen::find($id);
        return view('dosen.update', compact('data'));
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
        $save = $request->file('image');
        $name = time() .$save->getClientOriginalName();
        $path = $request->file('image')->storeAs('/assets/img/dosen', $name);
        $save->move(\base_path() . '/public/assets/img/dosen', $name);
        $data = array_merge([
            // 'dosen_id' => $request->dosen_id,
            'dosen_name' => $request->dosen_name,
            'dosen_nip' => $request->dosen_nip,
            'dosen_jk' => $request->dosen_jk,
            'dosen_job' => $request->dosen_job,
            'dosen_photo' => $path,
        ]);
        Dosen::where('dosen_id', $id)->update($data);
        return redirect()->route('dosen');
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
        $data = Dosen::find($id)->delete();
        return redirect()->route('dosen');
    }
}
