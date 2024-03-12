<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Peminjaman extends Model
{
    use HasFactory;
    protected $table = 'peminjamans';
    protected $fillable = [
        'mobil_id',
        'user_id',
        'tanggal_mulai',
        'tanggal_selesai'
    ];

    public function mobil(): BelongsTo
    {
        return $this->belongsTo(Mobil::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
