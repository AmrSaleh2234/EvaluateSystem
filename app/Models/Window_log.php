<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Window_log extends Model
{
    use HasFactory;
    protected $fillable=['quiz_id','user_id','window_event','description','credit_hours'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

}

