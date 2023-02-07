<?php

namespace App\Http\Controllers;
use App\Models\Finances;
use App\Models\Course;
use App\Models\AcademicYear;
use Auth;


use Illuminate\Http\Request;

class FinanceController extends Controller
{
    //viewing the list
    public function index()
    {    
        
        $finances = Finances::select('finances.*','academic_years.academic_years')
        ->join('academic_years', 'finances.academic_year_id','=','academic_years.id')
        ->get();
        
        return view('finances.index', compact('finances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     //creating a new financial structure
    public function create()
    {
        return view('finances.create');
    }

    public function store(Request $request){

        $course_id = Course::firstWhere('name', $request->input('course_name'))->id;
        $finances = Finances::where([
            'academic_year_id' => $request->input('academic_year'),
            'course_id' => $course_id,
            'course_name' => $request->input('course_name'),
            'intake' => $request->input('intake')
        
       ])->first();

        if($finances){
            return redirect()->route('finances.create')->with('error','This  entry already exists');
               
        }else{
        $finances = Finances::Create([
            'academic_year_id' => $request->input('academic_year'),
            'course_id' => $course_id,
            'course_name' => $request->input('course_name'),
            'semester_1'=>$request->input('semester_1'),
            'semester_2'=>$request->input('semester_2'),            
            'added_by'=>1,
            'intake' =>1
            ]);

        }

        $userlog = Auth::user();
        activity('finances')
        ->performedOn($finances)
        ->causedBy($userlog)
        //->withProperties(['customProperty' => 'customValue'])
        ->log('finance saved by ' . $userlog->name); 

       return redirect()->route('course.index')->with('message','finance record has been saved');
    }


//capturing information related to a structure
    public function edit($id)
    {
        // dd($id);
        $finance = Finances::findOrFail($id);
        $finances = Finances::where(['course_id' => $finance['course_id']])->first();
        return view('finances.edit', compact('finance', 'finances'));
    }

   
    public function update(Request $request)
    {
        // dd($request->all());
        // $course_id = Course::firstWhere('name', $request->input('course_name'))->id;
        $finance = Finances::find($request->id);
        $academic_year_id = AcademicYear::where('academic_years', $request->input('academic_year'))->first();
        echo($finance);
        $finance->academic_year_id= $academic_year_id->id;
        // $finance->course_id = $course_id;
        $finance->course_name= $request->input('course_name');
        $finance->semester_1 = $request->input('semester_1');
        $finance->semester_2 = $request->input('semester_2');	
        
        
        $finance->update();

         // Add activity logs
         $userlog = Auth::user();
         activity('finance edit')
         ->performedOn($finance)
         ->causedBy($userlog)
         //->withProperties(['customProperty' => 'customValue'])
         ->log('finance updated by ' . $userlog->name); 

        return redirect()->route('finances.index')->with('success', 'finance updated successfully');
    }



    public function destroy(Request $request ,Finances $finances)
    {
      // dd($request->all());
      Finances::find($request->id)->delete();


        return redirect()->route('finances.index')->with('success', 'Financial year deleted successfully');
    }
}
