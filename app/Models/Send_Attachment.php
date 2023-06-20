<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Send_Attachment extends Model
{
    use HasFactory;
    protected $table='send_attachment';
    protected $fillable = [
        'file_name',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
