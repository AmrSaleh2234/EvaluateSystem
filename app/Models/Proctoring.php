<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proctoring extends Model
{
    use HasFactory;
    protected $table="proctoring";
    protected $fillable=['quiz_id','user_id','voice_db','user_movement_updown','user_movement_ir','user_movement_eyes','phone_detection','person_status'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }public function quiz()
{
    return $this->belongsTo(Quiz::class);
}

}
