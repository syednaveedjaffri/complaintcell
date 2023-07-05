<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Query extends Model
{
    use HasFactory;
    // use SoftDeletes;
    protected $fillable = ['
    id','campus_id','complainer_name','faculty_id','received_from_vendor','department_id','user_id','status','vendor_id','send_to_vendor','send_to_dept','complain_type','complaincategory_id','complaincategorytype_id','complain_description','extension',];
    // protected $hidden = ['status'];
    // protected $fillable=['
    // id','campus_id','user_id','faculty_id','department_id','vendor_id','complain_id'];

    public function campus()
    {
        return $this->belongsTo(Campus::class,'campus_id','id');
    }
    public function faculty()
    {
        return $this->belongsTo(Faculty::class,'faculty_id','id');
    }
    public function user()
        {
            return $this->belongsTo(User::class);
        }
    // public function complain()
    //     {
    //         return $this->belongsTo(Complain::class,'complain_id','id');
    //     }
    public function department()
    {
        return $this->belongsTo(Department::class,'department_id','id');
    }
    // public function complains()
    //     {
    //         return $this->hasMany(Complain::class,'complain_id','id');
    //     }
        public function vendor()
        {
            return $this->belongsTo(Vendor::class,'vendor_id','id');
        }
        public function complaincategorytype(){
            return $this->belongsTo(Complaincategorytype::class);
        }
        public function complaincategoryname(){
            return $this->belongsTo(Complaincategory::class,'complaincategory_id','id');
        }
    }
