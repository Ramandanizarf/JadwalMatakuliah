<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'name', 'credits', 'program_id'];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
