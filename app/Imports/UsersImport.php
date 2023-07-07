<?php

namespace App\Imports;

use App\Models\Mahasiswa;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Mahasiswa([
            //
        'mahasiswa_name'    => $row[0],
        'mahasiswa_nim'     => $row[1], 
        'mahasiswa_jk'      => $row[2],
        'mahasiswa_status'  => $row[3],
        'mahasiswa_email'   => $row[4],
        'mahasiswa_semester'=> $row[5],
        'ipk'     => $row[6],
        'mahasiswa_tlp'     => $row[7],
        'mahasiswa_tempat'  => $row[8],
        'mahasiswa_date'    => $row[9],
        'mahasiswa_photo'    => $row[10],
        'mahasiswa_agama'    => $row[11],
        'mahasiswa_address'    => $row[12],
        'mahasiswa_class'    => $row[13],
        'mahasiswa_study'    => $row[13],
        // Hash::make($row[2]),
        ]);
    }
}
