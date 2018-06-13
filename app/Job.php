<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'urgency',
        'subject',
        'body'
    ];

    /**
     * Get the user that owns the task.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the supporter thats working on a given Ticket.
     */
    public function supporter()
    {
        return $this->belongsTo(User::class, 'supporter_id');
    }

    /**
     * Return
     *  + true if supporter_id isset
     *  - false it no supporter_id isset (== NULL)
     */
    public function isSupported()
    {
        return isset($this->supporter_id);
    }
}
