<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, $id)
 * @method static find($id)
 */
class FotoSarana extends Model
{
    protected $table='fotosaranas';
    protected $fillable=['sarana_id','perumahan_id','nama_foto','file_foto'];


    public function r_perumahan() {
        return $this->belongsTo('App\Perumahans', 'id');
    }

    public function r_sarana() {
        return $this->belongsTo('App\Sarana', 'id');
    }
}
