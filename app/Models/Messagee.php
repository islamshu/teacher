<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Messagee extends Model
{
    use HasFactory;
    /**
     * Get the user that owns the Messagee
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sender()
    {
        return $this->belongsTo(Teacher::class, 'sender_id');
    }
    public function receiver()
    {
        return $this->belongsTo(Teacher::class, 'receiver_id');
    }
}
