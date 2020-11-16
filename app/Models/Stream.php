<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stream extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'url',
        'speaker',
        'topic',
    ];

    protected $dates = [
        'deleted_at'
    ];
}
