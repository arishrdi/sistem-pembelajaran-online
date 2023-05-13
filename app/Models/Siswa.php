<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Siswa extends Model
{

    protected $table = 'siswa';
    protected $primaryKey = 'nis';
    protected $fillable = ['nis', 'id_user', 'nama_siswa', 'kelas', 'jenis_kelamin', 'agama', 'tanggal_lahir', 'alamat'];

    use HasFactory, HasRoles;
}
