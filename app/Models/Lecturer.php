<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    use HasFactory;

    protected $fillable = ['nidn', 'name', 'email', 'phone','photo_path'];

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
