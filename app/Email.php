<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Carbon\Carbon;

class Email extends Model
{
    //
    use SoftDeletes;
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at','date'];

    protected $guarded = ['id','created_at','updated_at','deleted_at'];


     /**
     * Scope a query to only include inbound email.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeRecieved($query)
    {
        return $query->where('direction', 'Recieved');
    }

    /**
     * Scope a query to only include outbound email.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSent($query)
    {
        return $query->where('direction', 'Sent');
    }

    /**
     * Scope a query to only include unmoderated email.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeQueued($query)
    {
        return $query->where('moderation_status', 'Queued');
    }

    /**
     * Scope a query to only include moderater-approved email.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAccepted($query)
    {
        return $query->where('moderation_status', 'Accepted');
    }

    /**
     * Scope a query to only include moderater-approved email.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeRejected($query)
    {
        return $query->where('moderation_status', 'Rejected');
    }


}
