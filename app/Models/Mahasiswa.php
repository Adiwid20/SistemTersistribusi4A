<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'mahasiswas';
    protected $primaryKey = 'mahasiswa_id';
    protected $fillable=[
        'mahasiswa_name','mahasiswa_nim','mahasiswa_jk','mahasiswa_status','mahasiswa_semester','ipk','mahasiswa_tlp','mahasiswa_date','mahasiswa_agama','mahasiswa_email','mahasiswa_tempat','mahasiswa_address','mahasiswa_class','mahasiswa_study'
    ];
}
