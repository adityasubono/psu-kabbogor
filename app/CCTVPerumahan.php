<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, $perumahan)
 * @method static create($value)
 */
class CCTVPerumahan extends Model
{
    protected $table='cctvperumahans';
    public $fillable=['perumahan_id','nama_cctv','ip_cctv'];

    public function r_perumahan() {
        return $this->belongsTo('App/Perumahan', 'id');
    }
}
