<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 * @method static where(string $string, Perumahans $perumahan)
 * @method static find($id)
 * @method static insert(array $array)
 */
class FotoPerumahan extends Model
{
    protected $table='fotoperumahans';
    protected $fillable=['perumahan_id','file_foto','keterangan'];

    public function r_perumahan() {
        return $this->belongsTo('App\Perumahans', 'id');
    }
}
