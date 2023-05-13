<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MapelSiswa extends Model
{
    protected $table = 'mapel_siswa';
    protected $primaryKey = 'id_list';
    protected $fillable = ['id_mapel', 'id_siswa'];
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
