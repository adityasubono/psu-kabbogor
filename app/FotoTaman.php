<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, $id)
 * @method static find($id)
 */
class FotoTaman extends Model
{
    protected $table='fototamans';
    protected $fillable=['perumahan_id','taman_id','nama_foto','file_foto','keterangan'];

    public function r_taman() {
        return $this->belongsTo('App\Taman', 'id');
    }

    public function r_foto_taman() {
        return $this->hasMany('App\FotoTaman', 'id');
    }
}
