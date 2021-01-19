<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;
class Market extends Model
{
    


    protected $dates = [
        'expiration_date'
    ];



	public function admin()
	{
		return $this->belongsTo(Admin::class , 'admin_id');
	}

	public function documents()
	{
		return $this->hasMany(MarketDocument::class , 'market_id');
	}




	public function marketAdmin()
	{
		return $this->hasOne(Merchant::class , 'market_id' )->where('type'  , 'superadmin' );
	}


	public function emails()
	{
		return $this->hasMany(MarketEmail::class , 'market_id');
	}


	public function bank_accounts()
	{
		return $this->hasMany(MarketBankAccount::class , 'market_id');
	}


	public function isActive()
	{
		return $this->active == 1 ? true : false;
	}


	public function branches()
	{
		return $this->hasMany(Branch::class , 'market_id');
	}

	
    public function delivery_prices()
    {
    	return $this->hasMany(CityDeliveryPrice::class , 'market_id');
    }


    public function add($data)
    {
    	$this->name = $data['market_name'];
    	$this->notes = $data['notes'];
    	$this->address = $data['address'];
    	$this->phones = $data['phones'];
    	$this->active = isset($data['active']) ? 1 : 0;
    	$this->admin_id = Auth::guard('admin')->id();
    	return $this->save();
    }


     public function edit($data)
    {
    	$this->name = $data['market_name'];
    	$this->notes = $data['notes'];
    	$this->address = $data['address'];
    	$this->phones = $data['phones'];
    	$this->active = isset($data['active']) ? 1 : 0;
    	return $this->save();
    }


    public function setLogo($logo)
    {
    	$this->logo = $logo;
    	return $this->save();
    }



    public function setContractImage($image)
    {
        $this->contract_image = $image;
        return $this->save();
    }


    public function remove()
    {
    	return $this->delete();
    }
}
