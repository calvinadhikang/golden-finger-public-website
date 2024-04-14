<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'cart';
    protected $fillable = ['customer_id', 'part', 'type', 'qty', 'subtotal'];

    public function barang(){
        return $this->hasOne(Barang::class, 'part', 'part');
    }
}
