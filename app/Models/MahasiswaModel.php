<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MahasiswaModel extends Model
{
    use HasFactory;

    protected $table = 'm_mahasiswa'; // Mendefinisikan nama tabel
    protected $primaryKey = 'mahasiswa_id'; // Mendefinisikan primary key

    protected $fillable = ['user_id', 'nim', 'prodi', 'email', 'tahun_masuk', 'no_telepon'];
    public function tugasMahasiswa(): HasMany {
        return $this->hasMany(TugasMahasiswaModel::class, 'mahasiswa_id', 'mahasiswa_id');
    }


}
