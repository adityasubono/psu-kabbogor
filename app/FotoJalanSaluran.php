<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, $id)
 * @method static find($id)
 */
class FotoJalanSaluran extends Model
{
    protected $table='fotojalansalurans';
    protected $fillable=['perumahan_id','jalansaluran_id','nama_foto','file_foto','keterangan'];

    public function r_perumahan() {
        return $this->belongsTo('App\Perumahans', 'id');
    }

    public function r_jalan_saluran() {
        return $this->belongsTo('App\JalanSaluran', 'id');
    }
}
