<?php

namespace App\Http\Controllers;

use App\Models\Course_unit;
use Illuminate\Http\Request;
use App\Models\Course;
use Auth;

class Course_unitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course_unit::all();
        return view('course_unit.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('course_unit.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $courseunit = Course_unit::where([
            'course_name' => $request->input('name'),
            'course_code' => $request->input('course'),
            'course_unit_code'=>$request->input('code'),
       ])->first();



        if($courseunit){
            return redirect()->route('course_unit.create')->with('error','Course unit already exists');
               
        }else{
            $course_id = Course::where(['code' => $request->input('course')])->first()->id;

            $course = Course_unit::Create([            
                'course_name' => $request->input('name'),
                'course_code' => $request->input('course'),
                'course_unit_code'=>$request->input('code'),
                // 'teaches' => $request->input('code').'-'. $request->input('name'),
                'YearOfStudy' => $request->input('YearOfStudy'),
                'Semester' => $request->input('Semester'),
                'L' => $request->input('L'),
                'P' => $request->input('P'),
                'CH' => $request->input('CH'),
                'CU' => $request->input('CU'),
                'course_id' => $course_id
            ]);

        }
       

         // Add activity logs
         $userlog = Auth::user();
         activity('course unit')
         ->performedOn($course)
         ->causedBy($userlog)
         //->withProperties(['customProperty' => 'customValue'])
         ->log('course unit saved by ' . $userlog->name); 

        return redirect()->route('course_unit.create')->with('message','Course unit record has been saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course_unit $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($id);
        $course = Course_unit::findOrFail($id);
        $courses = Course::where(['code'=>$course['course_code']])->first();
        return view('course_unit.edit', compact('course','courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($request->all());
        $course = Course_unit::find($request->id);
        $course->course_name = $request->input('name');
        $course->course_unit_code = $request->input('code');
        $course->YearOfStudy = $request->input('YearOfStudy');
        $course->Semester = $request->input('Semester');
        $course->L = $request->input('L');
        $course->P = $request->input('P');
        $course->CH = $request->input('CH');
        $course->CU = $request->input('CU');
        
        $course->update();

         // Add activity logs
         $userlog = Auth::user();
         activity('course unit')
         ->performedOn($course)
         ->causedBy($userlog)
         //->withProperties(['customProperty' => 'customValue'])
         ->log('course unit updated by ' . $userlog->name); 

        return redirect()->route('course_unit.index')->with('success', 'Course unit updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
   public function destroy(Request $request ,Course_unit $course)
    {
      // dd($request->all());
      Course_unit::find($request->id)->delete();


        return redirect()->route('course_unit.index')->with('success', 'Course unit deleted successfully');
    }
}
