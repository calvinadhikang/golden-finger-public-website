<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Barang extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'barang';
    protected $primaryKey = 'part';
    protected $keyType = 'string';
    protected $fillable = ['part', 'nama', 'harga', 'stok', 'batas', 'image', 'public'];
}