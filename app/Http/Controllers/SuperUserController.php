<?php

namespace App\Http\Controllers;

use App\Models\SuperUser;
use App\Models\User;
use App\Models\Course;
use App\Models\Student;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Models\Course_unit;
use App\Models\Registration;
use App\Models\Accountant;
use App\Models\Admin;
use App\Models\Lecture_Course_units;
use App\Models\Lecturer;
use Auth;
use Illuminate\Support\Facades\Hash;

class SuperUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = User::where('role', 'Student')->get();
        $accountants = User::where('role', 'Accountant')->get();
        $courses = Course::all();
        $admins = User::where('role', 'Admin')->get();
        $announcements = Announcement::latest()->get();
        return view('superUser.index', compact('students', 'accountants', 'courses', 'admins', 'announcements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function created()
    {
        $prod = Student::all();
        return view('product', compact('prod'));
        // dd($prod);
    }

    public function findProductName(Request $request)
    {


        //if our chosen id and products table prod_cat_id col match the get first 100 data

        //$request->id here is the id of our chosen option id
        $data = Course_unit::select('course_name', 'id')->where('course_code', $request->id)->take(100)->get();
        // $data2= User::where(['id'=>$data1->user_id])->first();
        // $data = $data1->concat($data2);
        return response()->json($data); //then sent this data to ajax success
    }


    public function findPrice(Request $request)
    {

        //it will get price if its id match with Course_unit id
        $p = Student::where('studentID', $request->id)->first();
        $data2 = User::where(['id' => $p->user_id])->first();
        $registration = Registration::where('student_id', $p->id)->first();
        $data = array(
            'p'  => $p,
            'data2'  => $data2,
            'registration' => $registration
        );
        // $p=Course_unit::where('course_code',$request->id)->first();

        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function lecturer_cu(Request $request)
    {
        //
        return view('superUser.lecturer-cu');
    }
    /* public function storelecturer_cu(Request $request)
    {

        $user = User::where(['email'=>$request->studentID])->first();
        
        $user['course_unit_code'] = json_encode( $request->input('CourseUnitCode'));
        
        $course = Lecture_Course_units::create([
            'email' => $request->input('studentID'),
            'user_id' => $user['id'],
            'course_unit_code'=>$user['course_unit_code'],
            
    ]);*/


    public function storelecturer_cu(Request $request)
    {

        $user = User::where(['email' => $request->studentID])->first();

        $course_units = $request->input('CourseUnitCode');
        foreach ($course_units as $course_unit) {
            $course = Lecture_Course_units::create([
                'email' => $request->input('studentID'),
                'user_id' => $user['id'],
                'course_unit_code' => $course_unit
            ]);
        }









        /*    public function storelecturer_cu(Request $request)
    {
        $user =  User::where(['email'=>$request->studentID])->first();
        
        $data = array( json_encode([
            'email' => $request->input('studentID'),
            'user_id' => $user['id'],
            'course_unit_code'=>$request->input('CourseUnitCode'),
        ]));
 
        Lecture_Course_units::create($data);
 
      //  return response()->json(['success'=>'Recoreds inserted']);      
    */

        // Add activity logs
        $userlog = Auth::user();
        activity('course unit assignment')
            ->performedOn($course)
            ->causedBy($userlog)
            //->withProperties(['customProperty' => 'customValue'])
            ->log('Course unit has been assigned' . $userlog->name);


        return redirect()->back()->with('message', 'Course unit has been assigned');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SuperUser  $superUser
     * @return \Illuminate\Http\Response
     */
    public function show(SuperUser $superUser)
    {
        //superUser
        // dd(Auth::user());
        return view('superUser.show');
    }
    public function password(Request $request)
    {
        $user = Auth::user();

        return view('superUser.change', compact('user'));
    }

    public function password_change(Request $request)
    {

        $request->validate([
            'old_password' => ['required'],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        $user = User::find(Auth::user()->id);
        //   dd($request->all(),$user,Auth::user()->id);
        if (Hash::check($request->old_password, auth()->user()->password)) {
            $user->password = Hash::make($request->get('new_password'));
            $user->update();

            // Add activity logs
            $user = Auth::user();
            activity('users')
                ->performedOn($user)
                ->causedBy($user)
                //->withProperties(['customProperty' => 'customValue'])
                ->log('password changed by ' . $user->name);

            return redirect()->back()->with("success", 'password updated successfully');
            // dd('password match');
        } else {
            return back()->with("error", 'password does not match');
        }
    }
    //updating a profile image



    // if($request->get('password') != ''){
    //     $user->password = Hash::make($request->get('password'));
    // }
    // $user->update();
    // return back()->with("success", __('Password updated successfully'));


    public function users()
    {

        $students = User::where('role', '!=', 'Student')->get();
        // dd($students);
        return view('superUser.Uusers', compact('students'));
    }

    public function Addusers()
    {

        $students = User::where('role', '!=', 'Student')->get();
        // dd($students);
        return view('superUser.Uusers', compact('students'));
    }
    public function emp()
    {

        $students = User::where('role', '!=', 'Student')->get();
        // dd($students);
        return view('superUser.create-user', compact('students'));
    }
    public function AdminStore(Request $request)
    {
        //Store Student
        // dd($request->all());
        // dd(rand(0,'9999'));

        $image = $request->file('file');
        if ($image == null) {
            $imageName = 'default.jpg';
        } else {
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images'), $imageName);
        }

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'postal' => $request->input('postal'),
            'Town' => $request->input('Town'),
            'nationality' => $request->input('nationality'),
            'country' => $request->input('country'),
            'district' => $request->input('district'),
            'phone_1' => $request->input('phone_1'),
            'phone_2' => $request->input('phone_2'),
            'gender' => $request->input('gender'),
            'date_of_birth' => $request->input('date_of_birth'),
            'religion' => $request->input('religion'),
            'marital_status' => $request->input('marital_status'),
            'spouse_name' => $request->input('spouse_name'),
            'spouse_contact' => $request->input('spouse_contact'),
            'disability'  => $request->input('disability'),
            'nature_of_disability' => $request->input('nature_of_disability'),
            'role' => $request->input('usertype'),
            'father_name' => $request->input('father_name'),
            'father_contact' => $request->input('father_contact'),
            'mother_name' => $request->input('mother_name'),
            'mother_contact' => $request->input('mother_contact'),
            'password' => Hash::make($request->input('password')),
            'profileImage' => $imageName,

        ]);


        if ($request->input('usertype') == 'Accountant') {

            $accountant = Accountant::create([
                'user_id' => $user->id,
            ]);

            // Add activity logs
            $user = Auth::user();
            activity('accountants')
                ->performedOn($accountant)
                ->causedBy($user)
                //->withProperties(['customProperty' => 'customValue'])
                ->log('accountant account created by ' . $user->name);
        }
        if ($request->input('usertype') == 'Admin') {

            $accountant = Admin::create([
                'user_id' => $user->id,
            ]);

            // Add activity logs
            $user = Auth::user();
            activity('admins')
                ->performedOn($accountant)
                ->causedBy($user)
                //->withProperties(['customProperty' => 'customValue'])
                ->log('admin account created by ' . $user->name);
        }
        if ($request->input('usertype') == 'Super User') {

            $accountant = SuperUser::create([
                'user_id' => $user->id,
            ]);

            // Add activity logs
            $user = Auth::user();
            activity('super_users')
                ->performedOn($accountant)
                ->causedBy($user)
                //->withProperties(['customProperty' => 'customValue'])
                ->log('superuser account created by ' . $user->name);
        }



        return back()->with('student_added', $request->input('usertype') . "" . ' record has been created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SuperUser  $superUser
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        //
        $admin = User::find($id);
        // dd($admin);
        return view('superUser.edit', compact('admin'));
    }
    public function editadmins(Request $request, $id)
    {
        //
        $admin = User::find($id);
        // dd($admin);
        return view('superUser.edit', compact('admin'));
    }
    public function admin123_update(Request $request, SuperUser $superUser)
    {
        //
        //  dd($request->all());
        $user = User::find($request->input('admin'));

        $user->name = $request->input('name');
        $user->nationality = $request->input('nationality');
        $user->email = $request->input('email');
        $user->phone_1 = $request->input('phone_1');
        $user->phone_2 = $request->input('phone_2');
        $user->gender = $request->input('gender');
        $user->date_of_birth = $request->input('date_of_birth');
        $user->religion = $request->input('religion');
        $user->marital_status = $request->input('marital_status');
        $user->spouse_name = $request->input('spouse_name');
        $user->spouse_contact = $request->input('spouse_contact');
        $user->disability  = $request->input('disability');
        $user->nature_of_disability = $request->input('nature_of_disability');
        $user->father_name = $request->input('father_name');
        $user->father_contact = $request->input('father_contact');
        $user->mother_name = $request->input('mother_name');
        $user->mother_contact = $request->input('mother_contact');
        $user->Town = $request->input('Town');
        $user->postal = $request->input('postal');
        $user->country = $request->input('country');
        $user->district = $request->input('district');

        if ($request->file('file')) {
            $old_image = public_path('images') . '/' . $user->profileImage;
            if (file_exists($old_image) & $user->profileImage != 'default.jpg') {
                unlink($old_image);
            }
            $image = $request->file('file');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images'), $imageName);
            $user->profileImage = $imageName;
        }

        $user->update();
        // Add activity logs
        $userlog = Auth::user();
        activity('users')
            ->performedOn($user)
            ->causedBy($userlog)
            //->withProperties(['customProperty' => 'customValue'])
            ->log('User details updated by ' . $userlog->name);

        return redirect()->back()->with('success', 'User details updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SuperUser  $superUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, SuperUser $superUser)
    {
        //
        $lecturer = Lecturer::where(['user_id' => $request->input('admin_id')])->first();
        $accountant = Accountant::where(['user_id' => $request->input('admin_id')])->first();
        $admin = Admin::where(['user_id' => $request->input('admin_id')])->first();
        $user = User::find($request->input('admin_id'));
        if ($lecturer) {
            // $image = public_path('images') . '/' . $user->profileImage;
            // if (file_exists($image) & $user->profileImage != 'default.jpg') {
            //     dd("img");
            //     unlink($image);
            // }

            $lecturer->delete();
            $user->delete();
        } elseif ($accountant) {
            // $image = public_path('images') . '/' . $user->profileImage;
            // if (file_exists($image) & $user->profileImage != 'default.jpg') {
            //     unlink($image);
            // }

            $accountant->delete();
            $user->delete();
        } elseif ($admin) {
            // $image = public_path('images') . '/' . $user->profileImage;
            // if (file_exists($image) & $user->profileImage != 'default.jpg') {
            //     unlink($image);
            // }

            $admin->delete();
            $user->delete();
        } else {
            // $image = public_path('images') . '/' . $user->profileImage;
            // if (file_exists($image) & $user->profileImage != 'default.jpg') {
            //     unlink($image);
            // }
            $user->delete();
        }
        // //  dd( $request->all(),$lecturerq);
        // if (file_exists($image) & $lecturer->profileImage != 'default.jpg') {
        //     dd("img");
        //     unlink($image);
        // } elseif ($lecturerq) {
        //     // code...
        //     dd("del");
        //     $lecturer = User::find($request->input('admin_id'));
        //     // dd($lecturerq);
        //     $lecturerq->delete();
        //     $lecturer->delete();
        //     //  dd($lecturer );
        // } elseif ($accountant !== "") {
        //     // code...

        //     $accountant = Accountant::where(['user_id' => $request->input('admin_id')])->first();
        //     $lecturer = User::find($request->input('admin_id'));
        //     $accountant->delete();
        //     $lecturer->delete();
        // } else {
        //     $lecturer = User::find($request->input('admin_id'));
        //     $admin = Admin::where(['user_id' => $request->input('admin_id')])->first();
        //     $admin->delete();
        //     $lecturer->delete();
        // }

        return redirect()->back()->with('success', 'Employee account deleted successfully.');
    }

    public function updates(Request $request)
    {
        // dd($request->all());
        $user = User::find(Auth::user()->id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone_1 = $request->input('phone_1');
        $user->phone_2 = $request->input('phone_2');
        $user->gender = $request->input('gender');
        $user->date_of_birth = $request->input('date_of_birth');
        $user->religion = $request->input('religion');
        $user->marital_status = $request->input('marital_status');
        $user->spouse_name = $request->input('spouse_name');
        $user->spouse_contact = $request->input('spouse_contact');
        $user->disability  = $request->input('disability');
        $user->nature_of_disability = $request->input('nature_of_disability');
        $user->father_name = $request->input('father_name');
        $user->father_contact = $request->input('father_contact');
        $user->mother_name = $request->input('mother_name');
        $user->mother_contact = $request->input('mother_contact');
        $user->Town = $request->input('City');
        $user->country = $request->input('Country');


        if ($request->file('file')) {
            $old_image = public_path('images') . '/' . $user->profileImage;
            if (file_exists($old_image) & $user->profileImage != 'default.jpg') {
                unlink($old_image);
            }
            $image = $request->file('file');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images'), $imageName);
            $user->profileImage = $imageName;
        }

        $user->update();

        // Add activity logs
        $userlog = Auth::user();
        activity('users')
            ->performedOn($user)
            ->causedBy($userlog)
            //->withProperties(['customProperty' => 'customValue'])
            ->log('profile updated by ' . $userlog->name);

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    public function image_change(Request $request)
    {

        $user = User::find(Auth::user()->id);
        //   dd($request->all(),$user,Auth::user()->id);
        if ($request->file('file')) {
            $old_image = public_path('images') . '/' . $user->profileImage;
            if (file_exists($old_image) & $user->profileImage != 'default.jpg') {
                unlink($old_image);
            }
            $image = $request->file('file');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images'), $imageName);
            $user->profileImage = $imageName;
        }
        $user->update();
        $user = Auth::user();
        activity('users')
            ->performedOn($user)
            ->causedBy($user)
            //->withProperties(['customProperty' => 'customValue'])
            ->log('image changed by ' . $user->name);

        return redirect()->back()->with('message', 'Image Updated successfully');
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return $this->index();
    }
}
