<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, $id)
 * @method static create(array $all)
 */
class KoordinatSarana extends Model
{

    protected $table= 'koordinatsaranas';
    protected $fillable=['sarana_id','perumahan_id','longitude','latitude','latlong'];

    public function r_perumahan() {
        return $this->belongsTo('App\Perumahans', 'id');
    }

    public function r_sarana() {
        return $this->belongsTo('App\Sarana', 'id');
    }

}
