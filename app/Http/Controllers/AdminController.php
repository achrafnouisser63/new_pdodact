<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        if(view()->exists($id)){
            return view($id);
        }
        else
        {
            return view('404');
        }

     //   return view($id);
    }


    public function my_profile()
    {
        //$messages = Message::dwhere('id', $id);
       return view('dasshbord.my_profile');


    }
    public function update_my_profile()
    {
        //$messages = Message::where('id', $id);
       return view('dasshbord.edite_my_profile');


    }

    public function edite_profiles(Request $request)
    {
        $validator = Validator::make($request->all(),[
           
            'name' => 'required',
            
            'email' => 'required|email',
            
      ]
    ); 
    if($validator->fails()) {
        return Redirect::back()->withErrors($validator);
    }
    else{

        
        $data = $request->input();
         $me = User::where('id', '=',  Auth::user()->id)->first();
        $me->name = $data['name'];
        $me->email  = $data['email'];
       
      
        $me->save(); 
        return Redirect::back()->with('msg', 'Modifié avec succès');



    
    }}
    public function update_my_password(Request $request){

      
        return view('dasshbord.edite_my_password');


    }
    public function edite_password(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password_old' => 'required',
            'password' => 'required|min:7',
            'password_confirmation' => 'required_with:password|same:password|min:7'
        ]); 
        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
        else{
if(Hash::check($request->password_old, Auth::user()->password)){
  $data = $request->input();
         $me = User::where('id', '=',  Auth::user()->id)->first();
        $me->password = Hash::make($request->password);
      $me->save(); 
        return Redirect::back()->with('msg',  'Modifié avec succès'); 
}
else
{
    return Redirect::back()->with('msg_error', 'La modification n\'a pas été effectuée avec succès');
}
        
    }}



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
