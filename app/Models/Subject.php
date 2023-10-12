<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'user_id',
        'body'];
    
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
