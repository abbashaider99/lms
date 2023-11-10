<?php

namespace App\Http\Controllers;

use App\Mail\bookIssueEmail;
use App\Mail\bookReturnEmail;
use App\Models\BorrowedBooks;
use App\Models\IssuedBooks;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Books;
use App\Models\Category;
use App\Models\settings;
use App\Models\Students;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;


class BooksController extends Controller
{
    public function addCategoryView(){
        return view('pages.add-category');
    }

    public function addCategoryPost(Request $req){

        $req->validate([
            'catName' => 'required|unique:categories,cat_name',
            'catDesc' => 'required'
        ]);

        try{
        $category = new Category;

        $category->cat_name = $req->catName;
        $category->cat_desc = $req->catDesc;
        $category->user_id = 1;
        // $category->user_id = Auth::user()->id;

        if($category->save()){
            return back()->with('success','New category add successfully!');
        }else{
            return back()->with('error','Something went wrong');
        }
    }catch(Exception $e){
        return back()->with('error', 'An error occured: '.$e->getMessage());
    }
    }

    public function categoryList() {
        $categories = Category::withCount('books')->get();
        return view('pages.list-categories', compact('categories'));
    }

    public function editCategory($id){
        $category = Category::find($id);
        return view('pages.edit-category', compact('category'));
    }

    public function editCategoryPost(Request $req, $id){
        
        $req->validate([
            'catName' => 'required|unique:categories,cat_name,'.$id,
            'catDesc' => 'required'
        ]);

        try{
        $category = Category::find($id);

        if(!$category){
            return back()->with('error', 'Category not found.');
        }

        $category->cat_name = $req->catName;
        $category->cat_desc = $req->catDesc;

        if($category->save()){
            return back()->with('success','Category updated successfully!');
        }else{
            return back()->with('error','Something went wrong');
        }
    }catch(Exception $e){
        return back()->with('error', 'An error occured: '.$e->getMessage());
    }

    }

    public function deleteCategory($id){
        
        try{
            $delete = Category::where('id', $id)->delete();
            if($delete){
                return back()->with('success', "Category delete successfully");
            }else{
                return back()->with("error","Something went wrong");
            }
        }catch(Exception $e){
            return back()->with("error", "An error occurred: The selected category cannot be deleted or updated because it has associated books. To delete this category, please first delete the corresponding books linked to it.");
        }
    }

    /*========================== Books ============================= */

    public function booksList(){

        $booksList = Books::get();
        return view('pages.list-books', compact('booksList'));
    }
    public function addBookView(){
        $bookCat = Category::select('cat_name', 'id')->distinct()->get();
        
        return view('pages.add-book', compact('bookCat'));
    }

    public function addBookPost(Request $req){
        
        
        $req->validate([
            'bookTitle' => 'required',
            'bookAuthor' => 'required',
            'isbn' => 'required',
            'bookCat' => 'required'
        ]);
        
        try{
            $book = new Books;
            
            $book->title = $req->bookTitle;
            $book->author = $req->bookAuthor;
            $book->isbn = $req->isbn;
            $book->category_id = $req->bookCat;
            $book->user_id = 1;
            // $book->user_id = Auth::user()->id;

            if($book->save()){
                return back()->with('success', 'New book added successfully.');
            }else{
                return back()->with('error', 'Something went wrong.');
            }
        }catch(Exception $e){
            return back()->with('error', 'An error occured: '.$e->getMessage());
        }

    }

    public function deleteBook($id){

        try{
            $delete = Books::where('id', $id)->delete();
            if($delete){
                return back()->with('success','Book deleted successfully');
            }else{
                return back()->with('error','Something went wrong');
            }
        }catch(Exception $e){
            return back()->with('error', 'An error occured: '.$e->getMessage());
        }
    }
    
    public function checkoutBookForm() {
        return view('pages.checkout-book');
    }
 
    public function checkoutBookSearch(Request $req) {
        
                $studentId = $req->stuID;
            
                // Check if the input is numeric (treat as ID) or a string (treat as name)
                if (is_numeric($studentId)) {
                    $student = Students::where('id', $studentId)
                        ->select('id', 'name', 'class', 'email')
                        ->first();
                    if(!$student){
                        return response()->json(['status' => 'error', 'message' => 'No student found.']);
                    }    
                } else {
                    $students = Students::where('name', 'like', '%' . $studentId . '%')
                        ->select('id', 'name', 'class', 'email')
                        ->get();
                
                    if ($students->count() === 1) {
                        // Single student found
                        $student = $students->first();
                    } elseif ($students->count() > 1) {
                        // Multiple students found, return an error response
                        return response()->json(['status' => 'error', 'message' => 'Multiple students found. Please search with the ID.']);
                    } else {
                        // No student found
                        return response()->json(['status' => 'error', 'message' => 'No student found.']);
                    }
                }
                
            
                if ($student) {
                    $stuID = $student;
                }
    
    

        // Get the fine and days from settings
        $fineFromSettings = settings::get()->first();
        
        
            try {
                $students = DB::table('issued_books')
                    ->join('students', 'students.id', '=', 'issued_books.stu_id')
                    ->join('books', 'books.id', '=', 'issued_books.book_id')
                    ->select('students.id as student_id', 'students.name as student_name', 'students.class', 'books.title', 'books.isbn', 'issued_books.id as issued_id', 'issued_books.date_return', 'issued_books.created_at as issuedate', 'issued_books.is_returned', 'issued_books.fine_amount')
                    ->where('students.id', $studentId)
                    ->orWhere('students.name', 'like', '%' . $studentId . '%') 
                    ->get();

         
                    // --- append the student info on the page.
                $stuHTML = "<div class='col-md-4'>
                <a href='javascript:void(0)' class='btn btn-primary btn-sm mr-2 IssueBookBtn' data-stuID = '$stuID->id'>
                    <i class='fas fa-book'></i> Issue Book
                </a>
                <a href='javascript:void(0)' class='btn btn-warning btn-sm studentDetailsBtn' data-stuID = '$stuID->id' data-toggle='modal' data-target='#studentDetailsModal'>
                    <i class='fas fa-user'></i> Student Details
                </a>
                </div>
                <div class='col-md-8 d-flex align-items-center justify-content-end'>
                    <span class='btn btn-secondary btn-sm'>
                        <i class='fas fa-id-card'></i> #ID: $stuID->id  | <i class='fas fa-user'></i> Name: $stuID->name | <i class='fas fa-graduation-cap'></i> Class: $stuID->class | <i class='fas fa-envelope'></i>
                        Email: $stuID->email
                    </span>
                </div>";
                  
            
                if($students->isEmpty()){
                    return response()->json(['status' => 'error', 'message' => 'No book issued to this student.', 'stuHTML' => $stuHTML]);
                }



                $html = '';
                //--- append the data into table rows
                foreach ($students as $key => $stu) {
                    $html .= "<tr>";
                    $html .= "<td>{$key}</td>";
                    $html .= "<td>{$stu->isbn}</td>";
                    $html .= "<td>{$stu->title}</td>";
                    $html .= "<td>{$stu->issuedate}</td>";
                    $html .= "<td>{$stu->date_return}</td>";
                    $html .= "<td>{$stu->fine_amount}</td>";
                    $html .= "<td><span class='badge badge-sm " . ($stu->is_returned == 1 ? 'badge-success' : 'badge-warning') . "'>";
                    $html .= ($stu->is_returned == 1 ? 'Returned' : 'Issued') . "</span></td>";
                    $html .= "<td>";
            
                    if ($stu->is_returned == 0) {
                        $html .= "<a href='javascript:void(0)' class='btn btn-warning btn-sm bookReturnBtn' data-id='$stu->issued_id'>";
                        $html .= "<i class='fas fa-arrow-circle-left'></i> Return</a>";
                    } else {
                        $html .= "<button class='btn btn-secondary btn-sm disabled'>";
                        $html .= "<i class='fa-solid fa-circle-check'></i> Done</button>";
                    }
            
                    $html .= "</td>";
                    $html .= "</tr>";
                }
                return response()->json(['status' => 'success', 'message' => 'Issued book found', 'html' => $html, 'stuHTML' => $stuHTML, 'finefromSettings' => $fineFromSettings]);
            } catch (Exception $e) {
                return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
            } 
    }

    public function getBook(){
        $books = Books::get();
        
        $options = '';

        foreach($books as $book){
            $options .= '<option value = "' .$book->id .'">'. $book->title .'</option>';
        }

        return response()->json(['status' => 'success', 'options' => $options]);
    }

    
    // --- Issue New Book Save
    public function issuebookPost(Request $req){

        try{

        $isIssuedExists = IssuedBooks::where('stu_id', $req->stu_id)
        ->where('book_id', $req->book_id)
        ->where('is_returned', 0)
        ->get();


        if($isIssuedExists->count()>0){
            return response()->json(['status' => 'error', 'message' => "This book is already issued to the selected student!"]);
        }
        $issue = new IssuedBooks;
        $issue->stu_id = $req->stu_id;
        $issue->book_id = $req->book_id;

        if($issue->save()){
            $issueBook = DB::table('books')
            ->join('issued_books as ib', 'ib.book_id', '=', 'books.id')
            ->select('books.title', 'books.isbn', 'ib.created_at', 'ib.id')
            ->where('ib.id', '=', $issue->id)
            ->first();
          
        $stuDetails = Students::find($issue->stu_id);    
        $fineInfo = settings::get()->first();
            $mailData = [
                'studentName' => $stuDetails->name,
                'bookTitle' => $issueBook->title,
                'issueDate' => $issue->created_at,
                'fineAmount' => $fineInfo->fine_amount,
                'fineDays' => $fineInfo->fine_days
            ];
            Mail::to($stuDetails->email)->send(new bookIssueEmail($mailData));

            return response()->json(['status' => 'success', 'message' => "Book Issued Successfully.", 'html' => $issueBook]);
        }else{
            return response()->json(['status' => 'error', 'message' => "Something went wrong!"]);
        }
        }catch(Exception $e){
            return response()->json(['status' => 'error', 'message' => "An error occured: ". $e->getMessage()]);
        }
    
    }

    
    // --- Book Return
    public function returnBook($id){

        try{
            $returnBook = IssuedBooks::find($id);
    
            $returnBook->is_returned = 1;
            $returnBook->date_return = now();

            // send email notification 

            //Get fine amount/Days from Settings
            $finefromSettings = settings::get()->first();

            //Fine amount will 50 rupees per 5 days
            $daysDiff = Carbon::parse($returnBook->created_at)->diffInDays(now());

                // Calculate the number of 5-day intervals
                $intervalCount = intdiv($daysDiff, $finefromSettings->fine_days);

                // Calculate the fine amount
                $fineAmount = $intervalCount * $finefromSettings->fine_amount;

                if ($fineAmount > 0) {
                    $fineAmount = max($finefromSettings->fine_amount, $fineAmount);
                }

                $returnBook->fine_amount = $fineAmount;
                $returnBook->fine_days = $daysDiff;
    
                           
            if($returnBook->update()){
                
                $bookinf = DB::table('books')
                ->join('issued_books as ib', 'ib.book_id', '=', 'books.id')
                ->select('books.title', 'books.isbn', 'ib.created_at', 'ib.date_return', 'ib.id', 'ib.fine_amount')
                ->where('ib.id', '=', $id)
                ->first();

                //Student Details fetch
                $stuDetails = Students::find($returnBook->stu_id);

                //Returned Book details
                $BookDetails = Books::find($returnBook->book_id);

                $mailData = [
                    'studentName' => $stuDetails->name,
                    'bookTitle' => $BookDetails->title,
                    'issueDate' => $returnBook->created_at,
                    'returnDate' => $returnBook->date_return,
                    'fineAmount' => $returnBook->fine_amount
                ];

                // Send return book email
                Mail::to($stuDetails->email)->send(new bookReturnEmail($mailData));

                
                return response()->json(['status' => 'success', 'message' => 'Books Return Successfully.', 'bookinf' => $bookinf]);
            }else{
                return response()->json(['status' => 'error', 'message' => 'Something went wrong!']);
            }
        }catch(Exception $e){
            return response()->json(['status' => 'error', 'message' => 'An Error Occured: '. $e->getMessage()]);
        }
    }

}