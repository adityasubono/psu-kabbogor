<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create($value)
 * @method static where(string $string, $id)
 * @method join(string $string, string $string1, string $string2, string $string3)
 */
class KoordinatPertamanan extends Model
{
    //
    protected $table ='koordinatpertamanans';
    protected $fillable=['pertamanan_id','longitude','latitude'];

    public function r_pertamanan() {
        return $this->belongsTo('App\Pertamanan', 'id');
    }
}
