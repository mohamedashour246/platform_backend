<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Auth;
use Hash;
class Admin extends Authenticatable
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


    public function addedBy()
    {
        return $this->belongsTo(Admin::class , 'admin_id');
    }

    public function  permissions()
    {
        return $this->hasMany(AdminPermission::class , 'admin_id');
    }


    public function type()
    {
        return $this->belongsTo(AdminType::class , 'type_id');
    }


    public function trips()
    {
        return $this->hasMany(Trip::class );
    }



    public function dailyTrips()
    {
        return $this->hasMany(Trip::class)->whereDate('created_at'  , today() );
    }


    public function add($data)
    {
        $this->email = $data['email'];
        $this->username = $data['username'];
        $this->password = Hash::make($data['password']);
        $this->type_id = $data['type'];
        $this->active = isset($data['active']) ? 1 : 0;
        $this->notes = $data['notes'];
        $this->admin_id = Auth::guard('admin')->id();
        $this->name = $data['name'];
        $this->phone = $data['phone'];
        $this->address = $data['address'];
        return $this->save();
    }



    public function edit($data)
    {
        $this->email = $data['email'];
        $this->username = $data['username'];
        $this->password = !empty($data['password']) ? Hash::make($data['password']) : $this->password;
        $this->type_id = $data['type'];
        $this->active = isset($data['active']) ? 1 : 0;
        $this->notes = $data['notes'];
        $this->name = $data['name'];
        $this->phone = $data['phone'];
        $this->address = $data['address'];
        return $this->save();
    }



    public function setImage($image)
    {
        $this->image = $image;
        return $this->save();
    }


    public function isActive()
    {
        return $this->active == 1 ? true : false;    
    }



    public function  remove()
    {
        return $this->delete();
    }
}
