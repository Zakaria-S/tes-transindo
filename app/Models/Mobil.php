<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Mobil extends Model
{
    use HasFactory;
    protected $table = "mobils";
    protected $fillable = [
        'merk',
        'model',
        'nomor_plat',
        'tarif',
        'ketersediaan'
    ];

    public function peminjaman(): HasMany
    {
        return $this->hasMany(Peminjaman::class);
    }

    public function getMobil($filter = null)
    {
        $data_mobil = $this;
        if ($filter->merk !== null && $filter->merk !== '') {
            $data_mobil->where('merk', 'like', $filter->merk);
        }
        if ($filter->model !== null && $filter->model !== '') {
            $data_mobil->where('model', 'like', $filter->merk);
        }
        if (
            $filter->tersedia !== null
            && $filter->tersedia !== ''
            && $filter->tersedia === true
        ) {
            $data_mobil->where('ketersediaan', 'Tersedia');
        }
        return $data_mobil->get();
    }
}
