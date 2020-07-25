<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 * @method static where(string $string, $perumahan)
 */
class Basta extends Model
{
    protected $table='basta';
    protected $fillable=['perumahan_id','no_basta','tanggal'];

    public function r_perumahan() {
        return $this->belongsTo('App\Perumahans', 'id');
    }
}
