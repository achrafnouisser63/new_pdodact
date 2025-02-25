<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use App\Models\msg;
use Illuminate\Http\Request;
use Validator;
class MsgController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function send_message(Request $req){
        $validator = Validator::make($req->all(), [
         'name' => 'required',
         'phone' => 'required',
         'subject' => 'required',
         'email' => 'required',
         'message' => 'required',
         ]);

         if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
        else{
            $msg = new msg;
       
            $msg->name = $req->name;
             $msg->phone = $req->phone;
              $msg->subject = $req->subject;
             $msg->email =$req->email;
             $msg->message =$req->message;
             $msg->is_rade ='no';
             $msg->save();
             return Redirect::back()->with('msg', 'Le message a été envoyé avec succès');
        }



        
        }
        public function messages(){

            return view('dasshbord.messages');
     
            }

            public function show_message($id ,Request $request){

                $msg = msg::where('id', $request->id)->first();
                $msg->is_rade='oui';
                $msg->save();
                return view('dasshbord.show_message')->with('msg',$msg);
            
            }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(msg $msg)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(msg $msg)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, msg $msg)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(msg $msg)
    {
        //
    }
}
