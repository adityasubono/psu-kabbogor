<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, $id)
 * @method static create($value)
 */
class KoordinatTaman extends Model
{
    protected $table='koordinattamans';
    protected $fillable=['perumahan_id','taman_id','longitude','latitude'];

    public function r_taman() {
        return $this->belongsTo('App\Taman', 'id');
    }

    public function r_koordinat_taman() {
        return $this->belongsTo('App\KoordinatTaman', 'id');
    }

}
