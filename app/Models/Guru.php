<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{

    protected $table = 'guru';
    protected $primaryKey = 'nip';
    protected $fillable = ['nip', 'id_user', 'nama_guru', 'gelar', 'jenis_kelamin', 'agama', 'tanggal_lahir', 'alamat'];
    use HasFactory;
}
