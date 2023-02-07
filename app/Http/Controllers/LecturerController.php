<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
use App\Models\Registration;
use App\Models\Course;
use App\Models\Payment;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Course_unit;
use Database\Seeders\SuperUserSeeder;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Lecturer;
use App\Models\Announcement;
use App\Models\Lecture_Course_units;
use Auth;

class LecturerController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Student::class);

        $students = Lecturer::all();
    
        // dd($students);
        return view('lecturers.index', compact('students'));
    }


    public function findLecturerDetails(Request $request){
        $query = Lecturer::select('users.*','lecturers.*')
        ->where('lecturers.id',$request->user_id)
        ->join('users', 'lecturers.user_id','=', 'users.id')
        ->first();
 
         $data = array(
             'data'  => $query,
            );
           
 
         return response()->json($data);
     }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Student::class);
        //create a new students
        $courses = Course_unit::all();
        return view('lecturers.create', compact('courses'));
    }

    public function my_courses(){
        $asign = Lecture_course_units::where(['user_id'=>auth()->user()->id])->get();
        $coursesunit = Course_unit::all();
        $courses=Course::all();
        return view('lecturers.Lecture_courses', compact('coursesunit','asign','courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Store Student
        // dd($request->all());

       $image = $request->file('file');
        if ($image == null) {
            $imageName = 'default.jpg';
        } else {
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('images'),$imageName);
        }
        
        $user = User::where([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ])->first();

        if($user){
            return redirect()->route('lecturers.create')->with('error','Lecturer already exists');
        }
        else{
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'postal'=>$request->input('postal'),
            'Town'=>$request->input('Town'),
            'nationality'=>$request->input('nationality'),
            'country'=>$request->input('country'),
            'district'=>$request->input('district'),
            'phone_1' => $request->input('phone_1'),
            'phone_2' => $request->input('phone_2'),
            'gender' => $request->input('gender'),
            'date_of_birth' => $request->input('date_of_birth'),
            'religion' => $request->input('religion'),
            'marital_status'=> $request->input('marital_status'),
            'spouse_name' => $request->input('spouse_name'),
            'spouse_contact' => $request->input('spouse_contact'),
            'disability'  => $request->input('disability'),
            'nature_of_disability' => $request->input('nature_of_disability'),
            'role' => $request->input('role'),
            'father_name' => $request->input('father_name'),
            'father_contact' => $request->input('father_contact'),
            'mother_name' => $request->input('mother_name'),
            'mother_contact' => $request->input('mother_contact'),
            'password' => Hash::make($request->input('password')),
            'profileImage' => $imageName,

        ]);

        $user_id =  $user->id;
        $sponsorship = $request->sponsorship;
        $nextOfKin1Name = $request->nextOfKin1Name;
        $nextOfKin1Contact = $request->nextOfKin1Contact;
        $nextOfKin1Email = $request->nextOfKin1Email;
        $nextOfKin1Address = $request->nextOfKin1Address;
        $nextOfKin2Name = $request->nextOfKin2Name;
        $nextOfKin2Contact = $request->nextOfKin2Contact;
        $nextOfKin2Email = $request->nextOfKin2Email;
        $nextOfKin2Address = $request->nextOfKin2Address;
        $qualification = $request->qualification;
        $yearOfStudy = $request->yearOfStudy;
        $institution = $request->institution;
        $specialzation = $request->specialzation;

        //Save lecturer Details
        $student = new Lecturer();
        $student->user_id = $user_id;
        $student->nextOfKin1Name = $nextOfKin1Name;
        $student->nextOfKin1Contact = $nextOfKin1Contact;
        $student->nextOfKin1Email = $nextOfKin1Email;
        $student->nextOfKin1Address = $nextOfKin1Address;
        $student->nextOfKin2Name = $nextOfKin2Name;
        $student->nextOfKin2Contact = $nextOfKin2Contact;
        $student->nextOfKin2Email = $nextOfKin2Email;
        $student->nextOfKin2Address = $nextOfKin2Address;
        $student->qualification = $qualification;
        $student->yearOfStudy = $yearOfStudy;
        $student->institution = $institution;
        $student->specialzation = $specialzation;
        // $student->EmployID = "BIT" .'/'.rand(2,'9999');
        $student->EmployID = (new LecturerController)->lecturerID($student);
        $student->save();


         // Add activity logs
         $userlog = Auth::user();
         activity('Lecturer')
         ->performedOn($student)
         ->causedBy($userlog)
         //->withProperties(['customProperty' => 'customValue'])
         ->log('Lecturer details saved by ' . $userlog->name);


        return redirect()->route('lecturer-cu')->with('success','Lecture record has been saved,assign course unit');

    }
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lecturer  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Lecturer $accountant)
    {

        $students = User::where('role', 'Lecturer')->get();
        $accountants = User::where('role', 'Accountant')->get();
        $courses = Course::all();
        $announcements = Announcement::latest()->get();
       $asign = Lecture_Course_units::where(['user_id'=>auth()->user()->id])->get();
        return view('lecturers.show', compact('students','accountants','courses', 'announcements'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lecturer  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Lecturer $student,$id)
    {
        //Display edit form for students

        $admin = User::findOrFail($id);
        $lect = Lecturer::findOrFail($admin['id']);
        $courses = Lecture_Course_units::firstWhere('user_id',$lect['user_id']);
  
        //$courses = Lecture_Course_units::where('user_id', $lect['id'])->get();
        
       
        
    
        // dd($id,$admin);
        return view('lecturers.edit', compact('admin','lect', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lecturer  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lecturer $student)
    {
        //Update Lecturer Record
    
        $id = $student->user_id;
        $user = User::find($request->id);
        // dd($request->all());

        $user->name = $request->input('name');
         $user->email = $request->input('email');
         $user->phone_1 = $request->input('phone_1');
         $user->phone_2 = $request->input('phone_2');
         $user->gender = $request->input('gender');
         $user->date_of_birth = $request->input('date_of_birth');
         $user->religion = $request->input('religion');
         $user->marital_status= $request->input('marital_status');
         $user->spouse_name = $request->input('spouse_name');
         $user->spouse_contact = $request->input('spouse_contact');
         $user->disability  = $request->input('disability');
         $user->nature_of_disability = $request->input('nature_of_disability');
         $user->Town = $request->input('Town');
         $user->postal = $request->input('postal');
         $user->district = $request->input('district');
         $user->country = $request->input('country');
         $user->nationality = $request->input('nationality');


         $user2 = Lecturer::find($request->id);
         $user2->nextOfKin1Name = $request->input('nextOfKin1Name');
         $user2->nextOfKin1Contact = $request->input('nextOfKin1Contact');
         $user2->nextOfKin1Email = $request->input('nextOfKin1Email');
         $user2->nextOfKin1Address = $request->input('nextOfKin1Address');
         $user2->nextOfKin2Name = $request->input('nextOfKin2Name');
         $user2->nextOfKin2Contact = $request->input('nextOfKin2Contact');
         $user2->nextOfKin2Email = $request->input('nextOfKin2Email');
         $user2->nextOfKin2Address = $request->input('nextOfKin2Address');
         $user2->qualification = $request->input('qualification');
         $user2->yearOfStudy = $request->input('yearOfStudy');
         $user2->institution = $request->input('institution');
         $user2->specialzation = $request->input('specialzation');
          
        
        $user3 =  Lecture_Course_units::firstWhere('user_id',($request->id));
         //$user3->course_unit_code = $request->input('course_unit_code');
        $user3['course_unit_code'] = implode(", ",$request->input('CourseUnitCode'));
        
        
     if($request->file('file')) {
            $old_image = public_path('images').'/'.$user->profileImage;
            if (file_exists($old_image) & $user->profileImage != 'default.jpg') {
                unlink($old_image);
            }
            $image = $request->file('file');
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('images'),$imageName);
            $user->profileImage = $imageName;
        }

        $user->update();
        $user2->update();
        $user3->update();


         // Add activity logs
         $userlog = Auth::user();
         activity('lecturer')
         ->performedOn($user)
         ->causedBy($userlog)
         //->withProperties(['customProperty' => 'customValue'])
         ->log('lecturer details updated by ' . $userlog->name);



        return redirect()->route('lecturers.index')
            ->with('success', 'Lecturer updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lecturer  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lecturer $lecturer)
    {
        //Delete Lecturer
        // dd($lecturer->user);
        $image = public_path('images').'/'.$lecturer->user->profileImage;
        if (file_exists($image) & $lecturer->profileImage != 'default.jpg') {
            unlink($image);
        }
        $lecturer->delete();
        $lecturer->user->delete();


        return redirect()->route('lecturers.index')->with('success','Lecturer account deleted successfully.');
    }

    public function Lecture_courses()
    {
        $courses = Course::all();
        return view('course.index', compact('courses'));
    }

    public function semster(Lecturer $student)
    {
        $new_year = new Carbon('first day of January');
        $end_of_year = new Carbon('last day of December');
        $current_date = Carbon::now();

        if ($student->intake == 'January') {
            $sem_1 = new Carbon('first day of January');
            $sem_2 = new Carbon('first day of July');
            if ($current_date >= $sem_1 & $current_date < $sem_2) {
                $academic_year = $sem_1->year."/".$sem_2->addYear(1)->year;
                $semster = 1;
                return [$academic_year, $semster];
            } else {
                $academic_year = $current_date->year."/".$current_date->addYear(1)->year;
                $semster = 2;
                return [$academic_year, $semster];
            }

        } else if ($student->intake == 'May') {
            $sem_1 = new Carbon('first day of May');
            $sem_2 = new Carbon('first day of November');
            if ($current_date >= $sem_1 & $current_date < $sem_2) {
                $academic_year = $sem_1->year."/".$sem_1->addYear(1)->year;
                $semster = 1;
                return [$academic_year, $semster];
            } else {
                if ($current_date->month >= $new_year->month) {
                    $academic_year = $current_date->subYear(1)->year."/".$current_date->year;
                } else {
                    $academic_year = $current_date->year."/".$current_date->addYear(1)->year;
                }
                $semster = 2;
                return [$academic_year, $semster];
            }

        } else if ($student->intake == 'September') {
            $sem_1 = new Carbon('first day of September');
            $sem_2 = (new Carbon('first day of February'));
            if ($current_date >= $sem_1 & $current_date < $end_of_year) {
                $academic_year = $sem_1->year."/".$sem_1->addYear(1)->year;
                $semster = 1;
                return [$academic_year, $semster];
            } elseif($current_date->month == 1) {
                $academic_year = $sem_1->subYear(1)->year."/".$sem_1->year;
                $semster = 1;
            } else {
                $academic_year = $sem_2->subYear(1)->year."/".$sem_2->year;
                $semster = 2;
                return [$academic_year, $semster];
            }

        }
    }


    public function lecturerID(Lecturer $student)
    {
        //Generating student id
        $model = new Lecturer;
        $trow = 'lecturerID';
        $prefix = 'BIT';
        $length = 2;
        $count =  $model->count();
        $data = $model::orderBy('id', 'desc')->first();
        error_log($count);

       
        if(!$data){
            $og_length = $length;
            $last_number = sprintf("%03d", 1);
        }else{
            $code = substr($data->$trow, strlen($prefix)+1);
            $actual_last_number = ((int)$code/1)*1;
           
            $last_number =sprintf("%03d", $count + 1);
            // $last_number = sprintf("%03d", $increment_last_number);
        }

        

        $lecturerID = "BIT/".$last_number;
        return $lecturerID;
    }


    
}
