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
    protected $fillable=['perumahan_id','sarana_id','longitude','latitude','nama_koordinat'];

    public function r_perumahan() {
        return $this->belongsTo('App\Perumahan', 'id');
    }

    public function r_sarana() {
        return $this->belongsTo('App\Sarana', 'id');
    }

}
