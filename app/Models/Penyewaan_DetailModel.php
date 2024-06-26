<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PenyewaanModel;
use App\Models\AlatModel;

class Penyewaan_DetailModel extends Model
{
    use HasFactory;

    protected $table = 'penyewaan_detail';
    protected $primaryKey = 'penyewaan_detail_id';
    protected $fillable = [
        'penyewaan_detail_penyewaan_id',
        'penyewaan_detail_alat_id',
        'penyewaan_detail_jumlah',
        'penyewaan_detail_subharga',
    ];

    // Relasi ke model Penyewaan
    public function penyewaan()
    {
        return $this->belongsTo(PenyewaanModel::class, 'penyewaan_detail_penyewaan_id', 'penyewaan_id');
    }

    // Relasi ke model Alat
    public function alat()
    {
        return $this->belongsTo(AlatModel::class, 'penyewaan_detail_alat_id', 'alat_id');
    }
    public function getAllPenyewaan_Detail()
    {
        return $this->all();
    }
    public function findPenyewaan_Detail($id)
    {
        return $this->find($id);
    }
    public function updatePenyewaan_Detail($data, $id)
    {
        $Penyewaan_Detail = $this->find($id);
        $Penyewaan_Detail->fill($data);
        $Penyewaan_Detail->save();

        return $Penyewaan_Detail;
    }
    public function deletePenyewaan_Detail($id)
    {
        $Penyewaan_Detail = $this->find($id);
        if ($Penyewaan_Detail) {
            $Penyewaan_Detail->delete();
        }
        return $Penyewaan_Detail;
    }
}
