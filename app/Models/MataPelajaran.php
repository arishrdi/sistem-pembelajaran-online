<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    protected $table = 'mata_pelajaran';
    protected $primaryKey = 'id_mapel';
    protected $fillable = ['nama_mapel', 'kelas', 'id_guru', 'kode'];
    
    use HasFactory;


}
