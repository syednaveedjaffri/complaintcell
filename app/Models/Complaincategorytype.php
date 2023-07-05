<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Complaincategorytype extends Model
{
    use HasFactory;
    use HasRoles;
    use SoftDeletes;
    protected $fillable=['complaincategory_id','complain_category_type'];

    public function complaincategoryname(){
        return $this->belongsTo(Complaincategory::class,'complaincategory_id','id');
    }
}
