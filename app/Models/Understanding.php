<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Understanding extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'lecture_id',
        'user_id',
        'level'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function lecture()
    {
        return $this->belongsTo(Lecture::class);
    }
    

    
    
}
