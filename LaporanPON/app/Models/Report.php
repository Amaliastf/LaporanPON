<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    // Nama tabel jika berbeda dari nama model
    protected $table = 'reports';

    // Atribut yang dapat diisi secara massal
    protected $fillable = [
        'tanggal', 
        'time_start', 
        'time_finish', 
        'km_start', 
        'km_finish', 
        'description'
    ];

    // Jika tidak menggunakan timestamps (created_at, updated_at)
    public $timestamps = false;
}

