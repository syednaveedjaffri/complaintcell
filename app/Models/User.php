<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Campus;
use App\Models\Complain;
use Laravel\Sanctum\HasApiTokens;
use Filament\Models\Contracts\HasName;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements HasName ,FilamentUser
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'is_admin',
        'email',
        'password',
        // 'designation',
        'ip_address',


    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
// public function users()
// {
//     return $this->hasMany(complain::class,'user_id','id');
// }
// public function canAccessFilament(): bool
//     {
//         return str_ends_with($this->email, '@gmail.com');

//     }

    public function canAccessFilament():bool
        {
            return $this->hasRole(['super-admin','admin','user','moderator','developer','viewonly']);

            // return str_ends_with($this->email,'@uvas.com');

        }

    public function getFilamentName(): string
        {
            //
            return $this->name;
            //  return "{$this->name}";

            // return "{$this->first_name} {$this->last_name}";
        }
    public function queries()
    {
        return $this->hasMany(Query::class);
    }

}
