<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'contents',
        'user_id',
        'form_name',
        'attributes',
    ];
    protected $casts = [
        'attributes' => 'array',
    ];
    protected $table = 'forms';
}
