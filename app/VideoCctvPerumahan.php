<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 */
class VideoCctvPerumahan extends Model
{
    protected $table = 'videos';
    protected $dates = [
        'converted_for_downloading_at',
        'converted_for_streaming_at',
    ];

    protected $guarded = [];
}
