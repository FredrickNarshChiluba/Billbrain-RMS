<?php

namespace App\Http\Controllers;

use App\Models\Course_unit;
use App\Models\Marks;
use Illuminate\Http\Request;
use Auth;
use App\Models\Student;
use App\Models\Course;
use DB;

class MarksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Marks::select('marks.*', 'course_units.course_unit_code', 'marks.studentID')
            ->join('course_units', 'marks.course_unit_id', '=', 'course_units.id')
            ->get();
        return view('marks.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Student::all();
        // dd($student);
        return view('marks.create', compact('students'));
    }
    public function createTest()
    {
        return view('marks.createTest');
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
        // retrieve course unit ID
        $course_unit_id = Course_unit::where('course_unit_code', $request->input('CourseUnitCode'))->first()->id;

        // if($request->test=='test'){
        //     $course = Marks::create([
        //         'studentID' => $request->input('studentID'),
        //         'test' => $request->input('score'),
        //         'course_unit_id'=>$course_unit_id,
        //     ]);
        //      $userlog = Auth::user();
        //      activity('test marks')
        //      ->performedOn($course)
        //      ->causedBy($userlog)
        //      ->log('student test marks saved by ' . $userlog->name);
        //      return redirect()->back()->with('message','student test mark has been saved');
        // }
        // else
        // {

        //check if marks already exists for the student with sepcpcific course unit 
        $final = Marks::where(['studentID' => $request->input('studentID'), 'course_unit_id' => $course_unit_id])->first();
        
        // $categories =DB::table('marks')->where(['studentID'=>$request->input('studentID'),'course_unit_id'=>$course_unit_id])->latest()->first();
        // dd($categories);
        //    dd($final);
        if ($final) {
            // dd($final);
            if ($request->exam == 'exam') {
                if ($final['test']) {
                    $Exa = ((int)$request->input('score') / 60) * 100;
                    $Tes = (int)$final['test'];
                    $toal = ($Exa + $Tes) / 2;

                    // dd($Tes,$Exa,(Integer)$toal);
                    $courseh = Marks::where(['studentID' => $request->input('studentID'), 'course_unit_id' => $course_unit_id])->update(['exam' => $Exa, 'total_score' => (int)$toal]);
                    // dd("done");
                } else {
                    $Exa = ((int)$request->input('score') / 60) * 100;
                    $toal = $Exa;

                    // dd($Tes,$Exa,(Integer)$toal);
                    $courseh = Marks::where(['studentID' => $request->input('studentID'), 'course_unit_id' => $course_unit_id])->update(['exam' => $Exa, 'total_score' => (int)$toal]);
                }
            } else {
                if ($final['exam']) {
                    $Tes = ((int)$request->input('score') / 40) * 100;
                    $Exa = (int)$final['exam'];
                    $toal = ($Exa + $Tes) / 2;

                    // dd($Tes,$Exa,(Integer)$toal);
                    $courseh = Marks::where(['studentID' => $request->input('studentID'), 'course_unit_id' => $course_unit_id])->update(['test' => $Tes, 'total_score' => (int)$toal]);
                    // dd("done");
                } else {
                    $Tes = ((int)$request->input('score') / 40) * 100;
                    $toal = $Tes;

                    // dd($Tes,$Exa,(Integer)$toal);
                    $courseh = Marks::where(['studentID' => $request->input('studentID'), 'course_unit_id' => $course_unit_id])->update(['test' => $Tes, 'total_score' => (int)$toal]);
                }
            }

            // if ($final['exam']) {
            //     $Tes = ((int)$request->input('score') / 100) * 40;
            //     $Exa = ($final['exam'] / 100) * 60;
            //     $toal = $Exa + $Tes;

            //     // dd($Tes,$Exa,(Integer)$toal);
            //     $courseh = Marks::where(['studentID' => $request->input('studentID'), 'course_unit_id' => $course_unit_id])->update(['test' => $request->input('score'), 'total_score' => (int)$toal]);
            // }
        } else {
            if ($request->test == 'test') {

                $Tes = ((int)$request->input('score') / 40) * 100;
                $toal = $Tes;

                $course = Marks::create([
                    'studentID' => $request->input('studentID'),
                    'test' => $Tes,
                    'course_unit_id' => $course_unit_id,
                    'total_score' => $toal
                ]);
                $userlog = Auth::user();
                activity('test marks')
                    ->performedOn($course)
                    ->causedBy($userlog)
                    ->log('student test marks saved by ' . $userlog->name);
                return redirect()->back()->with('message', 'student test mark has been saved');
            } else {

                $Exa = ((int)$request->input('score') / 60) * 100;
                $toal = $Exa;

                $course = Marks::create([
                    'studentID' => $request->input('studentID'),
                    'exam' => $Exa,
                    'course_unit_id' => $course_unit_id,
                    'total_score' => $toal

                ]);
                // Add activity logs
                $userlog = Auth::user();
                activity('exam marks')
                    ->performedOn($course)
                    ->causedBy($userlog)
                    ->log('student exam marks saved by ' . $userlog->name);
                // $coursej = Marks::where([ 'studentID'=>$request->input('studentID'),'course_unit_code'=>$request->input('CourseUnitCode')])->update(['exam'=>$request->input('score')]);

            }
        }

        return redirect()->back()->with('message', 'student mark has been saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(marks $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    // public function edit(marks $course,$id)
    // {
    //     $course= marks::find($id);
    //     // dd($course);
    //     return view('marks.edit', compact('course'));
    // }

    public function edit(marks $course, $id)
    {
        $course = Marks::select('marks.*', 'course_units.course_unit_code')
            ->where('marks.id', $id)
            ->join('course_units', 'marks.course_unit_id', '=', 'course_units.id')
            ->first();

        return view('marks.edit', compact('course'));
    }
    public function marksing_u($id)
    {
        $course = marks::find($id);
        // dd($course);
        return view('marks.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function marksing_update(Request $request)
    {
        // dd($request->all());
        $course_unit_id = Course_unit::where('course_unit_code', $request->input('CourseUnitCode'))->first()->id;
        
        $course = marks::find($request->input('id'));
        
        if ($request->input('test') && $request->input('exam')) {        //     # code...
            
            $Exa = (int)$request->input('exam');
            $Tes = (int)$request->input('test');
            $toal = ($Exa + $Tes)/2;
        }else {
            return redirect()->route('marks.index')->with('Enter both test and exams marks to update');
        }
        // update
        $course->total_score = $toal;
        $course->course_unit_id = $course_unit_id;
        $course->exam = $Exa;
        $course->test = $Tes;
        $course->update();

        // Add activity logs
        $userlog = Auth::user();
        activity('marks')
            ->performedOn($course)
            ->causedBy($userlog)
            //->withProperties(['customProperty' => 'customValue'])
            ->log('student marks updated by ' . $userlog->name);

        return redirect()->route('marks.index')->with('edit_added', $course->studentID . '' . '' . ' Marks updated successfully');
    }

    public function update(Request $request, marks $course)
    {
        // dd('update');

        $course->course_name = $request->input('name');
        $course->course_code = $request->input('code');
        $course->L = $request->input('L');
        $course->P = $request->input('P');
        $course->CH = $request->input('CH');
        $course->CU = $request->input('CU');

        $course->update();

        // Add activity logs
        $userlog = Auth::user();
        activity('marks')
            ->performedOn($course)
            ->causedBy($userlog)
            //->withProperties(['customProperty' => 'customValue'])
            ->log('student marks updated by ' . $userlog->name);

        return redirect()->route('marks.index')->with('success', 'Course unit updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req, Marks $course)
    {
        // dd($req->all());
        Marks::find($req->id)->delete();
        // foreach ($course->student as $student) {
        //     (new StudentController)->destroy($student);
        // }
        // $course->delete();

        // Add activity logs
        $userlog = Auth::user();
        activity('marks')
            ->performedOn($course)
            ->causedBy($userlog)
            //->withProperties(['customProperty' => 'customValue'])
            ->log('student mark deleted by ' . $userlog->name);

        return redirect()->route('marks.index')->with('success', 'Student mark deleted successfully');
    }

    public function findStudentsByCourseUnit(Request $request)
    {
        // $course_id = Course::where('name', $request->course)->id;

        $query = Course_unit::where('course_unit_code', $request->course_unit_code)->first();

        $course = Course::where('code', $query->course_code)->first()->id;

        $students = Student::where('course_id', $course)->get();

        $data = array(
            'data'  => $students,
        );
        // $p=Course_unit::where('course_code',$request->id)->first();


        return response()->json($data);
    }
}
