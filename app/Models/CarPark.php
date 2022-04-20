<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarPark extends Model
{
    use HasFactory;

    protected $fillable = [
        'mall_id','nama_ruang','lantai','status'
    ];

    public function mall(){
        return $this->belongsTo(mall::class, 'mall_id');
    }
}
