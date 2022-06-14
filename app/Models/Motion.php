<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motion extends Model
{  
    use HasFactory;
    protected $fillable=['id','user_id','quiz_id','motion','DateOfMotion'];
    public function quiz()
    {
       return $this->belongsTo(Quiz::class);
    }
    public function user()
    {
       return $this->belongsTo(User::class);
    }
}
