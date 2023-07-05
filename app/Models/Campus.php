<?php

namespace App\Models;

use App\Models\Faculty;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Campus extends Model
{
    use HasFactory;
    public $timestamps = false;

    // protected $table = 'campuses';

    protected $fillable = [
    'campus_name'];

    public function faculties()
    {
        return $this->hasMany(Faculty::class);
    }
    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function emp()
    {
        return $this->hasMany(Employee::class);
    }
    public function labs()
    {
        return $this->hasMany(Campus::class);
    }

}
