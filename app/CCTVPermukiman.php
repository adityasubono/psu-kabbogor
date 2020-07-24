<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, $id)
 * @method static create($value)
 */
class CCTVPermukiman extends Model
{
    //
    protected $table='cctvpermukimans';
    protected $fillable=['permukiman_id','nama_cctv','ip_cctv','title'];

    public function r_permukiman() {
        return $this->belongsTo('App\Permukiman', 'id');
    }
}
