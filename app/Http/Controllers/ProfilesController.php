<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profiles;
use App\Models\Post;
use Illuminate\Support\Facades\File;
use Session;

class ProfilesController extends Controller
{
        public function index(Request $request){

        // $jobs=Searchjobs::all();
        $search=$request->input('search_key');
        if(($search!="") || (isset($_GET['search_key']))){
            Session::put('search_key', $search);
        }

        $profiles = $request->input('query');
        $profiles = Profiles::where('name','LIKE','%'.Session::get('search_key').'%')->orderBy('id', 'DESC')
        ->paginate(2);

        return view('pages.profiles.profiles', compact('profiles'));
    }

        public function create(){
        return view('pages.profiles.add');
    }

    public function store(Request $request){
        $profiles= new Profiles;
        $profiles->name=$request->input('name');
        $profiles->address=$request->input('address');
        $profiles->city=$request->input('city');
        $profiles->active=$request->input('active');
        $profiles->save();
        $insertedId = $profiles->id;

        return redirect('profiles')->with('status','Profile Added');
    }

    public function edit($id){
        $profile=Profiles::find($id);

        return view('pages.profiles.edit',compact('profile'));
    }

    public function update(Request $request, $id){
        $profiles=Profiles::find($id);
        $profiles->name=$request->input('name');
        $profiles->address=$request->input('address');
        $profiles->city=$request->input('city');
        
        // if($request->hasfile('image')){
        //     $file=$request->file('image');
        //     $extension=$file->getClientOriginalExtension();
        //     $filename=time() . '.' . $extension;
        //     $file->move('uploads/profiles',$filename);
        //     $profiles->image=$filename;
        // }


         if($request->hasfile('image')){
            $destination_path='uploads/profiles/'.$profiles->image;
            if(File::exists($destination_path)){
                File::delete($destination_path);
            }

            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $filename=time() . '.' . $extension;
            $file->move('uploads/profiles',$filename);
            $profiles->image=$filename;
        }

        $profiles->active=$request->input('active')==true ? 1:0;
        $profiles->update();

        return redirect('profiles')->with('status', 'Profile updated');
    }

        public function delete($id){
        $profiles=Profiles::find($id);
        $profiles->delete();
        return redirect('profiles')->with('status', 'Profile deleted');
    }
}
