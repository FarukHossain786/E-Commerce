<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Rules\Capthca;
use App\Profile;
use App\User;
use App\Country;
use App\State;
use App\City;



class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        return view('admin.userHandel.userProfile', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required', 'string', 'min:6', 'confirmed',
            'password_confirm'=>'required|same:password',
            'address'=>'required',
            'pin'=>'required',
            'phone'=>'required|min:10',
            'g-recaptcha-response' => new Capthca(),
            
        ]);
            $path = 'images/default-image.jpg';
            if($request->has('photo')){
                $ext =".".$request->photo->getClientOriginalExtension();
                $name =basename($request->photo->getClientOriginalName(), $ext).time();
                $name =$name.$ext;
                $path = $request->photo->storeAs('images/profile', $name, 'public');
            }
    
        $user =User::create([
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
        ]);
        if($user){
            $profile = Profile::create([
                'user_id'=>$user->id,
                'name'=>$request->name,
                'address'=>$request->address,
                'phone'=>$request->phone,
                'photo'=>$path,
                'country_id'=>$request->country_id,
                'state_id'=>$request->state_id,
                'city_id'=>$request->city_id,
                'pin'=> $request->pin,  
            ]);
        }
        
        if($user && $profile){
            return redirect('home')->with('message','Product successfully added');
        }
        else{
            return back()->with('error','Something going Wrong');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {

        // $country =Country::all();
        // $state   =State::all();
        // $city    =City::all();
       // $profile =Profile::all();
        return view('user.profile', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        $countries =Country::all();
        return view('user.edit', compact('profile', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        if($request->has('photo')){
            \Storage::delete($profile->photo);
           $extension = ".".$request->photo->getClientOriginalExtension();
           $name = basename($request->photo->getClientOriginalName(), $extension).time();
           $name = $name.$extension;
           $path = $request->photo->storeAs('images/profile', $name, 'public');
           $profile->photo = $path;
         }

         $profile->name =$request->name;
         $profile->address =$request->address;
         $profile->pin =$request->pin;
         $profile->phone =$request->phone;
         $profile->country_id =$request->country_id;
         $profile->state_id =$request->state_id;
         $profile->city_id =$request->city_id;
         
         if($profile->save()){
            return redirect(route('user.profile.show',$profile->id))->with('message', "Profile Successfully Updated!");
        }else{
            return back()->with('error', "Error Updating Profile");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
    public function indexshow()
    {
        $users = User::with('role','profile')->paginate(3);
        //dd($users);
        return view('admin.userHandel.index', compact('users'));
    }
    public function getStates(Request $request, $id)
    {
        if($request->ajax()){
            return State::where('country_id', $id)->get();
        }else{
            return 0;
        }
    }
    public function getCities(Request $request, $id)
    {
        if($request->ajax()){
            return City::where('state_id', $id)->get();
        }else{
            return 0;
        }

    }
}
