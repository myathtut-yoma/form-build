<?php

namespace App\Models;

use App\Events\FormSubmitEvent;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'form_id',
        'content_attributes',
    ];
    protected $casts = [
        'content_attributes' => 'array',
    ];

    protected $table = 'contents';
    protected $dispatchesEvents = [
        'created' => FormSubmitEvent::class, // Event
    ];
}
