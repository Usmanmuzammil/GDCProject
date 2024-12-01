<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Teacher;
use Exception;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\validate;
use Validator;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.auth.login');
    }

    public function facultyIndex()
    {
        return view('faculty.auth.login');
    }

    public function facultySignUp()
    {
        return view('faculty.auth.signup');
    }

     // This method stores the data in the session

     public function submitFacultySignup(Request $request)
     {
        // return $request->all();
         // Validate the form data
         $validated = Validator::make($request->all(),[
             'name' => 'required|string|max:255',
             'email' => 'required|email|unique:users,email',
             'password' => 'required|string|min:8|confirmed',
             'phone' => 'required|string|max:15',
             'desgination' => 'required|string',
             'facebook_link' => 'nullable|url',
             'youtube_link' => 'nullable|url',
             'twitter_link' => 'nullable|url',
             'description' => 'nullable|string',
             'upload_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate image upload
         ]);
        //  return $validated;
     
         // Handle the profile image upload
              
         $imageName = '';
         if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $path = public_path('/upload_images');
            $image->move($path, $imageName);
        } 
     
         try {
             $teacher = new Teacher();
             $teacher->name = $request->input('name');
             $teacher->email = $request->input('email');
             $teacher->password = Hash::make($request->input('password')); // Encrypt password
            $teacher->phone = $request->input('phone');
             $teacher->desgination = $request->input('desgination');
             $teacher->facebook_link = $request->input('facebook_link');
             $teacher->youtube_link = $request->input('youtube_link');
             $teacher->twitter_link = $request->input('twitter_link');
             $teacher->description = $request->input('description');
             $teacher->image = '/upload_images/'.$imageName;
             $teacher->save();
             return redirect()->to('/faculty/login')->with('success', 'Your account has been created successfully!');

         } catch (Exception $e) {
             return back()->withErrors(['error' => $e->getMessage()]);
         }
     }
     

    /**
     * Show the form for creating a new resource.
     */
    public function adminLogin(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (Auth::guard('admin')->attempt($request->only(['email','password']), $request->get('remember'))){
            return redirect()->intended('/admin/dashboard');
        }

        return back()->withInput($request->only('email', 'remember'))->withErrors(['email' => 'These credentials do not match our records']);

    }


    public function facultyLogin(Request $request)
    {
        $credentials = $request->only(['email','password']);
        if (Auth::guard('faculty')->attempt($request->only(['email','password']),$request->get('remember'))) {
            return redirect()->intended('/faculty/profile_update/view');
        }
        // if (Auth::guard('faculty')->check()) {
        //     return redirect()->intended('/faculty/profile_update/view');
        // }
        return back()->withInput($request->only('email','remember'))->withErrors(['email' => 'These credentials do not match our records!']);
    }

    public function profile_update_view()
    {
        return view('admin.settings.profile_update');
    }

    public function faculty_profile_update_view()
    {
        return view('faculty.settings.profile_update_view');
    }

    public function faculty_profile_update_edit()
    {
        return view('faculty.settings.profile_edit');
    }

    public function logout()  {
        Auth::guard('admin')->logout();
        return redirect('/login');
    }

    public function facultyLogout()  {
        Auth::guard(name: 'faculty')->logout();
        return redirect('/faculty/login');
    }

    public function update_profile(Request $request){

        $data = $request->validate([
            'email'   => 'email',
            'password' => 'min:6'
        ]);

        $email = $request->email;
        $password = $request->password;

        if ($password == "") {
            Admin::where('id', Auth::user()->id)->update(['email' => $email]);
            Auth::guard('admin')->logout();
        } else {
            Admin::where('id', Auth::user()->id)->update(['email' => $email, 'password' => Hash::make($password)]);
            Auth::guard('admin')->logout();
        }

        return redirect('/login')->with(['success'=> 'Your data is updated successfully. Now you have to Login!']);

    }
}
