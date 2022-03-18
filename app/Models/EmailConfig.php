<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailConfig extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'driver',
        'host',
        'port',
        'encryption',
        'user_name' ,
        'password',
        'sender_name',
        'sender_email'
    ];
    protected $table = 'email_configs';
}
