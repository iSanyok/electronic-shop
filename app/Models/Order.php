<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'name',
        'phone',
    ];

    public function products() {

        return $this->belongsToMany(Product::class)->withPivot('count');
    }

    public function customer() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
