<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailProduksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal',
        'note',
        'model',
        'id_pemesan',
        'jumlah_produksi',
        'berat',
        'nama_model',
        'status',
        'profit',
        'id_bahan',
        'id_mesin',
        'waktu',
        'id_produksi',
        'harga_jual',
        'petugas',
    ];

    protected $primaryKey = 'id';

    /**
     * Get the user that owns the Pesanan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Bahan()
    {
        return $this->belongsTo(Bahan::class, 'id_bahan', 'id');
    }
    public function Mesin()
    {
        return $this->belongsTo(Mesin::class, 'id_mesin', 'id');
    }
    public function Pemesan()
    {
        return $this->belongsTo(User::class, 'id_pemesan', 'id');
    }
    public function Petugas()
    {
        return $this->belongsTo(User::class, 'petugas', 'id');
    }
    public function Produksi()
    {
        return $this->belongsTo(Produksi::class, 'id_produksi', 'id');
    }
}
