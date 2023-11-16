<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'name',
        'period',
        'user_id',
        'body'];
        
    protected static function boot()
        {
            parent::boot();
        
            static::deleting(function($subject) {
                $subject->lectures()->delete();
            });
        }

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function lectures()
    {
        return $this->hasMany(Lecture::class);
    }
    
    public function weeks()
    {
        return $this->belongsToMany(Week::class, 'subject_week');
    }
}
