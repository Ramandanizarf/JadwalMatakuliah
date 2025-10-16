<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * INI ADALAH BAGIAN KUNCI YANG MEMPERBAIKI MASALAH ANDA.
     * @var array
     */
    protected $fillable = [
        'course_id',
        'lecturer_id',
        'room_id',
        'timeslot_id',
        'semester',
        'class',
    ];

    // Relasi ke model lain untuk mengambil data terkait
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function lecturer()
    {
        return $this->belongsTo(Lecturer::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function timeslot()
    {
        return $this->belongsTo(Timeslot::class);
    }
}
