<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, $id)
 * @method static findOrFail($id)
 * @method static find($id)
 */
class FotoPertamanan extends Model
{
    //
    protected $table='fotopertamanans';
    protected $fillable=['pertamanan_id','nama_foto','file_foto'];

    public function r_pertamanan() {
        return $this->belongsTo('App\Pertamanan', 'id');
    }
}
