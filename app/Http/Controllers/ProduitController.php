<?php

namespace App\Http\Controllers;
use App\Models\categoree;
use Illuminate\Support\Facades\DB;
use App\Models\Produit;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Redirect;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function edite_ctgr($id)
    {
       //dd($id);
       $ctg = categoree::where('id', $id)->first();
       if($ctg){
        return view('dasshbord.edite_categorie',compact('ctg'));}
        else  return Redirect::back()->with('msg', 'No');
        
    }

public function produite_dt($id)
    {
       //dd($id);
       $prd = Produit::where('id', $id)->first();
       if($prd){
        return view('site.produite_dt',compact('prd'));}
        else  return Redirect::back()->with('msg', 'No');
        
    }


    
 public function index($id)
    {
       //dd($id);
      

        return view('site.produits',compact('id'));
        
    }

     public function Categories_edite($id ,Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:2|max:255',
        
        ]); 
        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
        else{
       
        $ctg = categoree::where('id', $id)->first();
    
         if($ctg){
            
            
           
           $ctg->name  = $request->input('name');
            
             $ctg->save();}
            return Redirect::back()->with('msg', 'La catégorie a été modifiée');
    }}



    public function edite_prod($id ,Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:2|max:255',
        
           'Materiels' => 'required',
           
           'id_prod' => 'required',
           'description' => 'required',
           'files' => 'image|mimes:png,jpg,jpeg|max:2048'
        ]); 
        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
        else{
          
        
        
        $prd = Produit::where('id', $id)->first();
    
         if($prd){
            
            
           
            $prd->name = $request->input('name');
          
            $prd->Materiels = $request->input('Materiels');
            $prd->colors =$request->input('colors');
            $prd->description =$request->input('description');
            $prd->id_prod  = $request->input('id_prod');
            $prd->prix  = $request->input('prix');
            
            if($request->hasfile('files'))
            {
          
               $file = $request->file('files');
              $extenstion = $file->getClientOriginalExtension();
              $filename = time().'.'.$extenstion;
             $file->move('assets/images/', $filename);
              $prd->imageName = $filename; 
             
          } 
            $prd->save();}
            return Redirect::back()->with('msg', 'Le produit  a été modifiée');

    }}
//----------------------------------------------------------------------



    public function produits_edite($id ,Request $request){
      
      
        $prd = Produit::where('id', $id)->first();
    
         if($prd){
            return view('dasshbord.edite_prouduit',compact('prd'));
         }
            
        else    return Redirect::back()->with('msg', 'makinach');
    }



    /**
     * Show the form for creating a new resource.
     */
    public function affiche_prod()
    {
         return view('dasshbord.produits');
    }
public function affiche_ctg()
    {
         return view('dasshbord.categouris');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function detais()
    {
        return view('dasshbord.product-details');
    
    }

    /**
     * Display the specified resource.
     */
    
    public function Ajouter()
    {
       return view('dasshbord.ajout_prouduit');
       
    }
 public function add_catgrosie()
    {
       return view('dasshbord.ajout_categorie');
       
    }
    /**
     * Show the form for editing the specified resource.
     */
      public function add_ctg(Request $request){


        $validator = Validator::make($request->all(), [
    'name' => 'required|string|min:2|max:255',
  
]); 
if($validator->fails()) {
    return Redirect::back()->withErrors($validator);
}
else{


$add = new categoree;
    
$add->name = $request->input('name');
$add->save();
     

    return Redirect::back()->with('msg', "Le Catégorie a été enregistré");

      }}

    public function add_prod(Request $request){

       
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:2|max:255',
          'categori' => 'required',
           'description' => 'required',
           'Materiels' => 'required',
        //    'colors' => 'required',
           'id_prod' => 'required|unique:produits',
        //    'prix' => 'required',
           'files' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ]); 
        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
        else{
          
        
    
    
    $add = new Produit;
    
    $add->name = $request->input('name');
    $add->catg_id  = $request->categori;
    $add->Materiels = $request->input('Materiels');
    $add->colors =$request->input('colors');
    $add->description =$request->input('description');
    $add->id_prod  = $request->input('id_prod');
    $add->prix  = $request->input('prix');
    
    

     if($request->hasfile('files'))
      {
    
         $file = $request->file('files');
        $extenstion = $file->getClientOriginalExtension();
        $filename = time().'.'.$extenstion;
       $file->move('assets/images/', $filename);
        $add->imageName = $filename; 
        $add->save();
     

    return Redirect::back()->with('msg', "Le produit a été enregistré");
    
    } 
    else return Redirect::back()->with('msg', "dsl");
    
    
    
    
    
    }}


    public function produits_delete($id)
    {
        Produit::find($id)->delete();
        return redirect()->back()->with('msg','Le produit a été supprimé');
    }
public function Categories_delete($id)
    {
        DB::table('produits')->where('catg_id', '=', $id)->delete();
        categoree::find($id)->delete();
        return redirect()->back()->with('msg','Le produit a été supprimé');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produit $produit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produit $produit)
    {
        //
    }
}
