<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jobs;
use Session;

class JobsController extends Controller
{
    public function index(Request $request){


        // $jobs=Searchjobs::all();
        $search=$request->input('search_key');
        if(($search!="") || (isset($_GET['search_key']))){
            Session::put('search_key', $search);
        }

        $jobs = $request->input('query');
        $jobs = Jobs::where('job_code','LIKE','%'.Session::get('search_key').'%')
        // ->orWhere('SurfaceArea','<', 10)
          ->orWhere('job_title','like','%'.Session::get('search_key').'%')->orderBy('id', 'DESC')
        ->paginate(2);

        return view('pages.jobs.jobs', compact('jobs'));
    }

    public function create(){
        return view('pages.jobs.add');
    }

    public function store(Request $request){
        $job= new Jobs;
        $job->job_code=$request->input('job_code');
        $job->job_title=$request->input('job_title');
        $job->save();
        $insertedId = $job->id;

        return redirect('jobs')->with('status','Job Added');
    }

    public function edit($id){
        $job=Jobs::find($id);

        return view('pages.jobs.edit',compact('job'));
    }

    public function update(Request $request, $id){
        $job=Jobs::find($id);
        $job->job_code=$request->input('job_code');
        $job->job_title=$request->input('job_title');
        $job->description=$request->input('description');
        $job->active=$request->input('active')==true ? 1:0;
        $job->update();

        return redirect('jobs')->with('status', 'job updated');
    }

        public function delete($id){
        $job=Job::find($id);
        $job->delete();
        return redirect('jobs')->with('status', 'Employee deleted');
    }
}