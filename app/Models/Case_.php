<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Case_ extends Model
{
    use HasFactory;

    protected $table = 'cases';
    protected $fillable = [
        'id', '
        title',
        'room',
        'court_id',
        'claim',
        'facts',
        'isArchived',
        'state',
    ];

    /**
     * Get the court associated with the case.
     */
    public function court(): HasOne
    {
        return $this->hasOne(Court::class);
    }
 /**
     * Get the base numbers associated with the case.
     */
    public function baseNumbers(): HasMany
    {
        return $this->hasMany(BaseNumbers::class);
    }

    /**
     * Get the plaintaif lawyers associated with the case.
     */

    public function plaintaiffLawyers():HasMany
    {
        return $this->hasMany(PlaintaiffLawyer::class);
    }

    /**
     * Get the plaintaif clients associated with the case.
     */

     public function plaintaiffClients(): HasMany
     {
         return $this->hasMany(PlaintaiffClient::class);
     }

    /**
     * Get the defendent clients associated with the case.
     */
    public function DefendentClient()
    {
        return $this->belongsToMany(DefendentClient::class);
    }

    /**
     * Get the defendent lawyers associated with the case.
     */
    public function DefendentLawyer()
    {
        return $this->belongsToMany(DefendentLawyer::class);
    }

}
