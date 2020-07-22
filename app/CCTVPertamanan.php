<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, $id)
 * @method static create($value)
 */
class CCTVPertamanan extends Model
{
    //
    protected $table='cctvpertamanans';
    protected $fillable=['pertamanan_id','nama_cctv','ip_cctv','title'];

    public function r_pertamanan() {
        return $this->belongsTo('App\Pertamanan', 'id');
    }
}
