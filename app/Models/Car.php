<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'car_parks_id','mall_id', 'plat_nomor', 'jam_masuk','tanggal_masuk', 'status', 'jam_keluar', 'biaya_parkir'
    ];


    public function mall(){
        return $this->belongsTo(mall::class, 'mall_id');
    }
    public function car_park(){
        return $this->belongsTo(CarPark::class, 'car_parks_id');
    }
}
