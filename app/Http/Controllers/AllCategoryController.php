<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\AllCategory ; 
use Auth ; 
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class AllCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function AllCat()
    {

        //$categories = DB::table('all_categories')
            //->join('users', 'all_categories.user_id','users.id')
            //->select('all_categories.*', 'users.name')
            //->latest()->paginate(5);




        $categories = AllCategory::paginate(5);
        $trachCat = AllCategory::onlyTrashed()->latest()->paginate(3) ; 
        //$categories = DB::table('all_categories')->paginate(5);
        return view('Admin.Category.index',compact('categories','trachCat'));
    }

    public function AddCat(Request $request){
        $validated = $request->validate([
            'category_name' => 'required|unique:all_categories|max:255',
        ], 

        [

            'category_name.required' => 'Please input category name'
           
        ]);

        //AllCategory::insert([
            //'category_name' => $request->category_name ,
            //'user_id' => Auth::user()->id ,
            //'created_at' => Carbon::now()
        //]);

       //$category = new AllCategory ; 
       //$category->category_name = $request->category_name;
       //$category->user_id = Auth::user()->id;

       //$category->save();
            // query builder 
       $data = array() ; 

       $data['category_name'] = $request->category_name ; 
       $data['user_id']  = Auth::user()->id;
       DB::table('all_categories')->insert($data);


       return redirect()->back()->with('success','Category Interested Succesfull');
    
    }

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
    public function Edit($id)
    {
       //$categories = AllCategory::find($id) ; 
       $categories = DB::table('all_categories')->where('id',$id)->first();
       return view('Admin.Category.edit',compact('categories')) ; 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Update(Request $request ,$id)
    {
        $update = AllCategory::find($id)->update([
            'category_name' => $request->category_name ,
            'user_id' => Auth::user()->id 
        ]) ; 

       //$data = array() ; 
       //$data['category_name'] = $request->category_name ; 
       //$data['user_id'] = Auth::user()->id ;
       //DB::table('all_categories')->where('id',$id)->update($data);
       return redirect()->back()->with('success','Category Interested Succesfull');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SoftDelete($id)
    {
       // $delete = AllCategory::findOrFail($id);
        //$delete->delete();

        AllCategory::destroy($id);
        return redirect()->back()->with('success','Category deleted Succesfully');

    }
}
