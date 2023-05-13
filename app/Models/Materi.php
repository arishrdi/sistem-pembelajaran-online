<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{

    protected $table = 'materi';
    protected $primaryKey = 'id_materi';
    protected $fillable = ['id_mapel', 'judul_materi', 'isi_materi', 'file'];

    use HasFactory;
}
