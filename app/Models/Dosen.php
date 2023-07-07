<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;
    use HasFactory;
   
    protected $table = 'dosens';
    protected $primaryKey = 'dosen_id';
    protected $fillable=[
        'dosen_name','dosen_nip','dosen_jk','dosen_job','dosen_photo',
    ];

    public $sortable = [
        'dosen_name','dosen_nip','dosen_jk','dosen_job',
    ];
}
