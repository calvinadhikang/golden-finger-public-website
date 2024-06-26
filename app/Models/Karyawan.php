<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;
    protected $table = 'karyawan';
    protected $primaryKey = 'id';
    protected $fillable = ['nama', 'username', 'password', 'telp', 'role', 'status'];
}
