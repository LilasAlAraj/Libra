<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cases extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'title',
        'court_id',
        'case_room',
        'Status',
        'Value_Status',
        'facts',
        'claim',

        //'task_id'
    ];

    public function attachments(): HasMany
    {
        return $this->hasMany(Case_attachment::class,'case_id');
    }
    public function tasks()
    {

        return $this->belongsToMany(tasks::class, 'case_of_task');
    }
    public function sessions(): HasMany
    {
        return $this->hasMany(Sessions::class,'case_id');
    }
    public function decisions()
    {
        return $this->hasMany(Decision::class, 'case_id');
    } public function clients_case()
    {
        return $this->hasMany(Client_of_Cases::class, 'case_id');
    }public function lawyers_case()
    {
        return $this->hasMany(Lawyer_of_Cases::class, 'case_id');
    }
    public function enemy_lawyers()
    {
        return $this->belongsToMany(Enemy_Lawyers::class, 'enemy_lawyer_of_cases', 'case_id', 'enemy_lawyer_id');
    }
    public function enemy_clients():BelongsToMany
    {
        return $this->belongsToMany(Enemy_Clients::class, 'enemy_client_of_cases', 'case_id', 'enemy_client_id');
    }

    public function lawyers()
    {
        return $this->belongsToMany(User::class, 'lawyer_of_case', 'case_id', 'user_id');
    }

    public function clients()
    {
        return $this->belongsToMany(User::class, 'client_of_case', 'case_id', 'user_id');
    }
    public function baseNumbers(): HasMany
    {
        return $this->hasMany(BaseNumber::class, 'case_id');
    }

    public function court()
    {
        return $this->belongsTo(Courts::class, 'court_id');
    }
}
