<?php

namespace App\Http\Controllers;

use App\Mail\newStudentEmail;
use App\Models\Students;

use App\Models\User;
use App\Notifications\SendEmailNotification;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class StudentsController extends Controller
{
    public function studentList(){
        $students = Students::get();
        return view('pages.list-students', compact('students'));
    }

    //Add New Student View//
    public function addStudentView(){
        return view('pages.add-student');
    }

    //Add New Student Post//
    public function addStudentPost(Request $req){
        $req->validate([
            'stuName' => 'required',
            'stuEmail' => 'required|email|unique:students,email',
            'stuClass' => 'required',
        ]);
        
        try {

            $student = new Students;

            $student->name = $req->stuName;
            $student->email = $req->stuEmail;
            $student->class = $req->stuClass;
            $student->user_id = 1;
            // $student->user_id = Auth::user()->id;
        
            // Check if the student was created successfully and return a response.
            if ($student->save()) {

                $mailData = [
                    'studentID' => $student->id,
                    'studentName' => $student->name,
                    'studentEmail' => $student->email,
                    'studentClass' => $student->class
                ];

                Mail::to($student->email)->send(new newStudentEmail($mailData));

                return response()->json(['status' => 'success', 'message' => 'Student added successfully', 'student' => $student]);
            } else {
                return response()->json(['status' => 'error', 'message' => 'Student added successfully']);
            }
        } catch (Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Error'. $e->getMessage()]);
        }
        
    }



    //Delete Student//
    public function deleteStudent($id){
        
        try{
        if($id){
           $isExists = Students::find($id);
           if($isExists){
               Students::where('id', $id)->delete();
               return response()->json(['status' => 'success', 'message' => 'Student deleted successfully!']);
           }else{
            return response()->json(['status' => 'error', 'message' => 'Student already deleted! Please try another one.']);
            }
        }else{
            return response()->json(['status' => 'error', 'message' => 'Something went wrong!']);
        }
    }catch (QueryException $e) {
        // Check if it's a foreign key constraint violation
        if ($e->errorInfo[1] === 1451) {
            // This student has some issued books; cannot delete until books are returned
            return response()->json(['status' => 'error', 'message' => 'This student has some issued books. You cannot delete the student until all books are returned or the associations are removed.']);
        } else {
            // Handle other database errors as needed
            return response()->json(['status' => 'error', 'message' => 'An error occurred while trying to delete the student.']);
        }
    } catch (Exception $e) {
        return response()->json(['status' => 'error', 'message' => 'An error occurred while trying to delete the student.']);
    }
    }
    //Edit Student//
    public function editStudent($id){
        $student = Students::where('id', $id)->first();
        if($student){
            return view('pages.edit-student', compact('student'));
        }else{
            return back()->with('error', 'Something went wrong');
        }
    }

    public function editStudentPost(Request $req, $id){
        $req->validate([
            'stuName' => 'required',
            'stuEmail' => 'required|email|unique:students,email,'. $id,
            'stuClass' => 'required',
            'stuStatus' => 'required'
        ]);
        
        try {

            $student = Students::find($id);

            $student->name = $req->stuName;
            $student->email = $req->stuEmail;
            $student->class = $req->stuClass;
            $student->status = $req->stuStatus;
        
            if ($student->save()) {
                return redirect('/list-students')->with('success', 'Student updated successfully!');
            } else {
                return redirect('/list-students')->with('error', 'Failed to add the student.');
            }
        } catch (Exception $e) {
            return redirect('/list-students')->with('error', 'An error occured while updating the student: '. $e->getMessage());
        }
    }

}
