<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'mother_name',
        'father_name',

        'phone',
        'current_address',

        'date_of_birth',
        'place_of_birth',

        'email',

        'status',
        'role_name',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier() {
        return $this->getKey();
    }
    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims() {
        return [];
    } 
    
    // public function tasks(): HasMany
    // {
    //     return $this->hasMany(Task::class,'task_id');
    // }
    public function sendAttachments()
    {
        return $this->hasMany(Send_Attachment::class,'user_id');
    }

    public function lawyer_cases()
    {
        return $this->belongsToMany(Cases::class, 'lawyer_of_case', 'case_id', 'user_id');
    }

    public function client_cases()
    {
        return $this->belongsToMany(Cases::class, 'client_of_case', 'case_id', 'user_id');
    }

    public function tasks()
    {
        return $this->belongsToMany(Task::class, 'users_of_tasks', 'user_id', 'task_id');
    }

    public function assignedTasks()
    {
        return $this->hasMany(User_Of_Task::class, 'user_id');
    }
}
