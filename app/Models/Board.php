<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasEvents;

class Board extends Model
{
    use HasEvents;

    protected $table = 'boards';
    protected $primaryKey = 'id';

    protected $fillable = ['name', 'email', 'password', 'title', 'content', 'attach'];
}