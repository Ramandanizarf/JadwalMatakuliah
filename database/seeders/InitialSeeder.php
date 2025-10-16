<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\{User, Role, Program, Lecturer, Room, Course, Timeslot};

class InitialSeeder extends Seeder
{
    public function run(): void
    {
        // ===== ROLES =====
        $roles = ['admin', 'dosen', 'petugas'];
        foreach ($roles as $r) {
            Role::firstOrCreate(['name' => $r]);
        }

        // ===== ADMIN USER =====
        $admin = User::firstOrCreate(
            ['email' => 'admin@local'],
            ['name' => 'Administrator', 'password' => Hash::make('password')]
        );
        $adminRole = Role::where('name', 'admin')->first();
        if (!$admin->roles()->where('role_id', $adminRole->id)->exists()) {
            $admin->roles()->attach($adminRole->id);
        }

        // ===== PROGRAM STUDI =====
        $prodi = Program::firstOrCreate(
            ['code' => 'IF'],
            ['name' => 'Informatika']
        );

        // ===== DOSEN =====
        $lecturers = [
            ['nidn' => '1234567890', 'name' => 'Dr. Andi Wijaya', 'email' => 'andi@if.ac.id'],
            ['nidn' => '9876543210', 'name' => 'Prof. Siti Rahma', 'email' => 'siti@if.ac.id'],
        ];
        foreach ($lecturers as $lec) {
            Lecturer::firstOrCreate(['nidn' => $lec['nidn']], $lec);
        }

        // ===== RUANGAN =====
        $rooms = [
            ['code' => 'R101', 'name' => 'Ruang Teori 1', 'capacity' => 30],
            ['code' => 'R102', 'name' => 'Ruang Teori 2', 'capacity' => 40],
            ['code' => 'LAB1', 'name' => 'Lab Komputer 1', 'capacity' => 25],
        ];
        foreach ($rooms as $room) {
            Room::firstOrCreate(['code' => $room['code']], $room);
        }

        // ===== MATA KULIAH =====
        $courses = [
            ['code' => 'IF101', 'name' => 'Pemrograman Dasar', 'credits' => 3],
            ['code' => 'IF102', 'name' => 'Struktur Data', 'credits' => 3],
            ['code' => 'IF103', 'name' => 'Basis Data', 'credits' => 3],
        ];
        foreach ($courses as $c) {
            Course::firstOrCreate(
                ['code' => $c['code']],
                ['name' => $c['name'], 'credits' => $c['credits'], 'program_id' => $prodi->id]
            );
        }

        // ===== TIME SLOTS =====
        $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];
        $times = [
            ['08:00:00', '09:40:00'],
            ['10:00:00', '11:40:00'],
            ['13:00:00', '14:40:00'],
            ['15:00:00', '16:40:00'],
        ];

        foreach ($days as $day) {
            foreach ($times as $t) {
                Timeslot::firstOrCreate([
                    'day' => $day,
                    'start_time' => $t[0],
                    'end_time' => $t[1],
                ]);
            }
        }

        $this->command->info('✅ InitialSeeder selesai. Data awal berhasil dimasukkan.');
    }
}
