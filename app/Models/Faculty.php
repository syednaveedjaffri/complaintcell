<?php

namespace App\Models;

use App\Models\Campus;
use App\Models\Department;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Faculty extends Model
{
    use HasFactory;
    // protected $table = 'faculties';
    protected $fillable = [
        'id','campus_id','faculty_name',];

    public function campus()
    {
        return $this->belongsTo(Campus::class);
    }
    public function departments()
    {
        return $this->hasMany(Department::class);
    }

}
