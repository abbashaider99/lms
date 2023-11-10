<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\IssuedBooks;
use App\Models\Students;
use App\Models\User;
use App\Notifications\SendEmailNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{

    public function index(){

        $data['stu_count'] = Students::get()->count();
        $data['books_count'] = Books::get()->count();
        $data['issued_books'] = IssuedBooks::get()->count();
        $data['fine_amount'] = IssuedBooks::sum('fine_amount');
       
        return view("welcome", compact('data'));
    }
    public function login()
    {
        return view('auth.login');
    }
    
    public function register(){
        return view('auth.register');
    }
    public function logout(){
        Auth::logout();
        return redirect('/login')->with('success', 'You have been successfully <strong>logged out </strong>.');
    }
    public function registerPost(Request $req){

        $req->validate([
            'name'=>'required',
            'email'=>'required|unique:users,email',
            'password'=>'required|min:6|max:12|confirmed'
        ]);
        
        $user = User::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => Hash::make($req->password)
        ]);

        if (Auth::attempt(['email' => $req['email'], 'password' => $req['password']]) && $user)
        {

            //Send email
            $EmailDetails = [
                'greetings' => 'Dear '.$req->name,
                'heading' => 'Welcome to the Library',
                'actionText' => 'Follow Us',
                'actionURL' => 'google.com',
                'signature' => 'Thanks, Team Abbas Library'
            ];

            //  $user->notify(new SendEmailNotification($EmailDetails));
            // Authentication passed...
            return redirect()->intended('/')->with('success', 'Email sent successfully.');
            }else{
               return back()->with('error', 'Something went wrong.');
                }
    }


    public function loginAuth(Request $req)
    {
       $req->validate([
        'email' => ['required', 'email'],
        'password' => ['required']
       ]);

        $user = $req->only('email', 'password');
        if (Auth::attempt($user)) {
            return redirect('/')->withSuccess('Signed in successfully. Welcome back!');
        } else {
            return redirect()->back()->withError('You have entered invalid credentials!');
        }
    }
}
