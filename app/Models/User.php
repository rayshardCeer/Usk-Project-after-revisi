<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Models\Role;

#[Fillable(['name', 'email', 'password'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     * 
     */

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function peserta()
    {
        return $this->hasOne(Peserta::class);
    }

    protected static function booted(): void{
        if(! Role::where('name','peserta')->exists()){
            Role::create(['name'=>'peserta', 'guard_name'=>'web']);
        }

        if(app()->runningInConsole()){
            return;
        }

        static::created(function (User $user){
            $user->assignRole('peserta');

            $user->peserta()->create([
                'nama' => $user->name,
                'email' => $user->email,
            ]);
        });
    }
}
