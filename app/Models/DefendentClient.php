<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DefendentClient extends Model
{
    use HasFactory;

    /**
     * Get the case that owns the clients.
     */
    public function case(): BelongsTo
    {
        return $this->belongsTo(Case_::class);
    }
}
