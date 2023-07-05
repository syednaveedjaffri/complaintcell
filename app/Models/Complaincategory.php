<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Complaincategory extends Model
{
    use HasFactory;
    use HasRoles;
    use SoftDeletes;
    protected $fillable=['id','complain_category_name'];

    public function complaincategorytype(){
        return $this->hasMany(Complaincategorytype::class);
    }

}
