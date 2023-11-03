<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Week extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'name',
        'user_id'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'subject_week');
    }
    
    public function lectures()
    {
        return $this->belongsToMany(Lecture::class, 'lecture_week');
    }
    
}
