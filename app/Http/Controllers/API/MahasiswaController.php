<?php

namespace App\Http\Controllers\API;
use App\Helpers\ApiFormatter;
use App\Models\Mahasiswa;
use Exception;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Mahasiswa::all();
        
        if($data){
            return ApiFormatter::createApi(200,'Succes',$data);

        } else {
            return ApiFormatter::createApi(400,'Failed');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'mahasiswa_name'=>'required',
                'mahasiswa_nim'=>'required',
                'mahasiswa_jk'=>'required',
                'mahasiswa_status'=>'required',
                'mahasiswa_semester'=>'required',
                'ipk'=>'required',
                'mahasiswa_tlp'=>'required',
                'mahasiswa_date'=>'required',
                'mahasiswa_agama'=>'required',
                'mahasiswa_email'=>'required',
                'mahasiswa_tempat'=>'required',
                'mahasiswa_address'=>'required',
                'mahasiswa_class'=>'required',
                'mahasiswa_study'=>'required',

            ]);
            $mahasiswa = Mahasiswa::create([

                'mahasiswa_name'=>$request->mahasiswa_name,
                'mahasiswa_nim'=>$request->mahasiswa_nim,
                'mahasiswa_jk'=>$request->mahasiswa_jk,
                'mahasiswa_status'=>$request->mahasiswa_status,
                'mahasiswa_semester'=>$request->mahasiswa_semester,
                'ipk'=>$request->ipk,
                'mahasiswa_tlp'=>$request->mahasiswa_tlp,
                'mahasiswa_date'=>$request->mahasiswa_date,
                'mahasiswa_agama'=>$request->mahasiswa_agama,
                'mahasiswa_email'=>$request->mahasiswa_email,
                'mahasiswa_tempat'=>$request->mahasiswa_tempat,
                'mahasiswa_address'=>$request->mahasiswa_address,
                'mahasiswa_class'=>$request->mahasiswa_class,
                'mahasiswa_study'=>$request->mahasiswa_study,
            ]);

            $data = Mahasiswa::where('mahasiswa_id','=', $mahasiswa->id)->get();

            if($data){
                return ApiFormatter::createApi(200,'Succes',$data);
    
            } else {
                return ApiFormatter::createApi(400,'tolol');
            }

        }catch(Exception $error){
            return ApiFormatter::createApi(400,'Failed');
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
        //
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
    }
}
