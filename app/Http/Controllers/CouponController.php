<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CouponController extends Controller
{
	
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function display()
    {
        //
		return view ('pages.display');
    }
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {

		$loginUser = \Auth::id();
		$coupons = DB::select( DB::raw("SELECT a.id, a.name_of_store, a.description, a.date_valid_from, a.time_valid_from, a.date_valid_until, a.time_valid_until  FROM coupons as a, coupon_user as b WHERE  b.coupon_id = a.id AND b.user_id = '$loginUser'") );

		
		return view('pages.index')->with('coupons',$coupons);
    }

	public function getcreate()
    {
		
        return view('pages.create');
		
	}
	
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postcreate(Request $request)
    {
		// Validate the request data
		$this->validate($request, [
			'name_of_store' => 'required|min:3',
		]);
		$this->validate($request, [
			'description' => 'required|min:3',
		]);
		$this->validate($request, [
			'date_valid_from' => 'required|min:8',
		]);
		$this->validate($request, [
			'time_valid_from' => 'required|min:6',
		]);
		$this->validate($request, [
			'date_valid_until' => 'required|min:8',
		]);
		$this->validate($request, [
			'time_valid_until' => 'required|min:6',
		]);
        
		$coupon = new \App\Coupon();
		$coupon->name_of_store = $request->name_of_store;
		$coupon->description = $request->description;
		$coupon->date_valid_from = $request->date_valid_from;
		$coupon->time_valid_from = $request->time_valid_from;
		$coupon->date_valid_until = $request->date_valid_until;
		$coupon->time_valid_until = $request->time_valid_until;
		$coupon->save();
		
		$user = \App\User::where('id','=',\Auth::id())->first();

            
            $coupon->users()->save($user);
		
		
		\Session::flash('flash_message','Your coupon was added');
		return redirect('/coupons');

	}
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getEdit($id = null)
    {
		$coupon = \App\Coupon::find($id);
		//$coupon = \App\Coupon::with('user')->find($id);
		
		if(is_null($coupon)) {
            \Session::flash('flash_message','Coupon not found.');
            return redirect('\coupons');
        }
		
		return view('pages.edit')->with('coupon',$coupon);
    }

	public function postEdit(Request $request) {
		
        $coupon = \App\Coupon::find($request->id);
		
        $coupon->name_of_store = $request->name_of_store;
		$coupon->description = $request->description;
		$coupon->date_valid_from = $request->date_valid_from;
		$coupon->time_valid_from = $request->time_valid_from;
		$coupon->date_valid_until = $request->date_valid_until;
		$coupon->time_valid_until = $request->time_valid_until;
		$coupon->save();
		
		
        \Session::flash('flash_message','Your coupon was updated.');
        return redirect('/coupons/edit/'.$request->id);
    }
	
	
	public function getConfirmDelete($coupon_id) {
		
        $coupon = \App\Coupon::find($coupon_id);
        return view('pages.delete')->with('coupon', $coupon);
    }
	
	public function getDoDelete($coupon_id) {
		
		$coupon = \App\Coupon::find($coupon_id);
        if(is_null($coupon)) {
            \Session::flash('flash_message','Coupon not found.');
            return redirect('\coupons'); 
        }
       
	   if($coupon->users()) {
            $coupon->users()->detach();
        }
	   
        $coupon->delete();
        \Session::flash('flash_message',$coupon->name_of_store.' '.$coupon->description.' was deleted.');
        return redirect('/coupons');

		
	}
	
}
