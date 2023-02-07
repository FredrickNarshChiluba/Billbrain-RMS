<?php

namespace App\Http\Controllers\Auth;

use App\Models\Student;
use Illuminate\Support\Facades\DB;
use App\Models\Accountant;
use App\Models\Admin;
use App\Models\Announcement;
use App\Models\Lecturer;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        // $this->studentID = $this->findUsername();
    }

    public function login(Request $request)
    {

        $input = $request->all();

        // $this->validate($request, [
        //     'email' => 'required|email',
        //     'password' => 'required',
        // ]);
        $usernameinput = $request->input('email');
        $password = $request->input('password');
        // dd($input);
        // $pswrd=Hash::make($password);
        // DB::table('users')->where(['email' => $usernameinput])->update(['password'=>$pswrd]);
        // dd($pswrd);

        // validate email
        $field = filter_var($usernameinput, FILTER_VALIDATE_EMAIL) ? 'email' : 'studentID';

        if (Auth::attempt([$field => $usernameinput, 'password' => $password])) {

        // if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        // {
            if (auth()->user()->role == 'Student') {
                $user_id = auth()->user()->id;
                //Retrieve student from array
                $student = Student::where('user_id', $user_id)->get();
                //Store session of Student
                session(['user'=>$student]);
                return redirect()->route('student.show' ,['student'=>$user_id]);
            } elseif (auth()->user()->role == 'Admin'){
                $user_id = Auth::user()->id;
                $admin = Admin::where('user_id', $user_id)->get()[0];
                //Store session of admin
                session(['user'=>$admin]);
                return redirect()->route('admin.show', compact('admin'));
            } elseif (auth()->user()->role == 'Accountant') {
                $user_id = Auth::user()->id;
                $accountant = Accountant::where('user_id', $user_id)->first();
                //Store session of admin
                session(['user'=>$accountant]);
                return redirect()->route('accountant.show', $accountant);
            } elseif (auth()->user()->role == 'Super User') {
                return redirect()->route('superUser');

            } elseif(auth()->user()->role == 'Lecturer'){
                $user_id = Auth::user()->id;
                $lecturer = Lecturer::where('user_id', $user_id)->first();
                //Store session of admin
                session(['user'=>$lecturer]);
                return redirect()->route('lecturer.show', $lecturer);

            }
            else{
                return redirect()->route('home');
            }
        }else{
            return redirect()->route('login')
                ->with('error','Credentials do not match,try again please.');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
