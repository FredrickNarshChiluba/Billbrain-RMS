<?php

namespace App\Http\Controllers;

use App\Models\Accountant;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;

class AccountantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Accountant::class);

        $accountants =  User::where('role', 'Accountant')->get();;


        return view('accounts.index', compact('accountants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('accounts.create');
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
        $image = $request->file('file');
        if ($image == null) {
            $imageName = 'default.jpg';
        } else {
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('images'),$imageName);
        }

        //Store accountant details
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
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
        $accountant = Accountant::create([
            'user_id' => $user->id,
        ]);

        // Add activity logs
        $user = Auth::user();
        activity('accountant')
        ->performedOn($accountant)
        ->causedBy($user)
        //->withProperties(['customProperty' => 'customValue'])
        ->log('accountant account created by ' . $user->name);
        
        return redirect()->route('accountant.create')->with("success",'Accountant account created successfully');
        ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Accountant  $accountant
     * @return \Illuminate\Http\Response
     */
    public function show(Accountant $accountant)
    {
        $this->authorize('view', $accountant);
        
        $students = User::where('role', 'Student')->get();
        $courses = Course::all();
        return view('accounts.show', compact('students', 'courses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Accountant  $accountant
     * @return \Illuminate\Http\Response
     */

        public function edit($id)
        {
            // dd($id);
            $accountant = User::findOrFail($id);
            return view('accounts.edit', compact('accountant'));
        }
    
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Accountant  $accountant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Accountant $accountant)
    {

        $id = $accountant->user_id;
        $user = User::find($request->id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone_1 = $request->input('phone_1');
        $user->phone_2 = $request->input('phone_2');
        $user->gender = $request->input('gender');
        $user->religion = $request->input('religion');
        $user->marital_status = $request->input('marital_status');
        $user->spouse_name = $request->input('spouse_name');
        $user->spouse_contact = $request->input('spouse_contact');
        $user->disability = $request->input('disability');
        $user->nature_of_disability = $request->input('nature_of_disability');
        $user->father_name = $request->input('father_name');
        $user->father_contact = $request->input('father_contact');
        $user->mother_name = $request->input('mother_name');
        $user->mother_contact = $request->input('mother_contact');

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

        $accountant->update();

        // Add activity logs
        $user = Auth::user();
        activity()
        ->performedOn($user)
        ->causedBy($user)
        //->withProperties(['customProperty' => 'customValue'])
        ->log('accountant account updated by ' . $user->name);

         return back()->with("success",'Accountant account updated successfully');
        
        ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Accountant  $accountant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Accountant $accountant)
    {
        $accountant->user->delete();
        $accountant->delete();

        // Add activity logs
        $user = Auth::user();
        activity('accountants')
        ->performedOn($accountant)
        ->causedBy($user)
        //->withProperties(['customProperty' => 'customValue'])
        ->log('accountant deleted by ' . $user->name);

        return redirect()->route('accountant.index')->with("success",'accountant deleted successfully');
        ;
    }

    public function password(Request $request){
        $user = Auth::user();
        
        return view('accountant.change', compact('user'));
    }

    public function password_change(Request $request){
        $request->validate([
            'old_password' => ['required'],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
        $user = Auth::user();
        if (Hash::check($request->old_password,auth()->user()->password)) {
            $admin= auth()->user()->password = Hash::make($request->get('password'));
            $user->update();

            // Add activity logs
            activity('users')
                ->performedOn($admin)
                ->causedBy($user)
                //->withProperties(['customProperty' => 'customValue'])
                ->log('password changed by ' . $user->name);

            return redirect()->route('login')->with("success",'password updated successfully');
             // dd('password match');
         }else{
             return back()->with("error",'password does not match');
         }
        
        // if($request->get('password') != ''){
        //     $user->password = Hash::make($request->get('password'));
        // }        
        // $user->update();
        // return back()->with("success", __('Password updated successfully'));
    }
}
