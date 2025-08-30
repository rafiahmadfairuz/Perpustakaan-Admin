<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AturanPeminjaman extends Model
{
    /** @use HasFactory<\Database\Factories\AturanPeminjamanFactory> */
    use HasFactory;
    protected $guarded = ['id'];
    public function memberType()
    {
        return $this->belongsTo(TipeAnggota::class, 'member_type_id');
    }

    public function collType()
    {
        return $this->belongsTo(TipeKoleksi::class, 'coll_type_id');
    }

    public function gmd()
    {
        return $this->belongsTo(Gmd::class, 'gmd_id');
    }
}
