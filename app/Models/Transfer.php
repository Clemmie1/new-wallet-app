<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Transfer extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'sender_id',
        'recipient_id',
        'sum',
        'comment',
    ];
}
