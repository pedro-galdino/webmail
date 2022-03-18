<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory;

    protected $fillable = ['sender_name', 'sender', 'recipient', 'subject', 'body', 'sender_guarded', 'sender_readed', 'recipient_readed'];
    protected $hidden = 'id';
    protected $table = 'emails';

}