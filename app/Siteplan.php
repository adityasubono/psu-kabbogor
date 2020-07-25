<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 * @method static where(string $string, $perumahan)
 */
class Siteplan extends Model
{
    protected $table = 'siteplan';
    protected $fillable = ['perumahan_id','no_sk_siteplan','tanggal'];

    public function r_perumahan() {
        return $this->belongsTo('App\Perumahans', 'id');
    }
}
