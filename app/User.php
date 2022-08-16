<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// use Laravel\Passport\HasApiTokens;
use App\DebtDetail;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
     
    public function activity()
    {
        return $this->hasMany('App\Activity')
            ->with(['user', 'subject'])
            ->latest();
    }

    public function sheets(){
        return $this->belongsToMany(Sheet::class,'sheet_user','worker_id','sheet_id')
        ->withTimestamps();
    }

    // public function viewedSheets($sheet)
    // {
    //     return $this->sheets()->attach($sheet);
    // }
    
    
}






 //  public function followers(){
    //      return $this->belongsToMany(User::class,'follows','following_id','follower_id');
    //  }
    //  public function following(){
    //     return $this->belongsToMany(User::class,'follows','follower_id','following_id');
    // }
    
    // public function follow(User $user){
    //      $this->following()->attach($user);
    // }
    // public function unfollow(User $user){
    //      $this->following()->detach($user);
    // }