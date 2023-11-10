<?php

namespace App\Http\Controllers;

use App\Models\settings;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function listUser(){

        $users = User::all();
        return view('pages.list-users', compact('users'));
    }

    public function storeUser(Request $req){
    
        //--- Validate
        $this->validate($req, [
            'name' => 'required|min:3|max:255',
            'email' => 'required|unique:users|email',
        ]
        ); 
         
        //--- Create new user
        $user = new User([  
            'name'=>$req['name'],
           'email'=>$req['email']
       ]);
       
       if($user->save()){
       return response()->json(['status' => 'success', 'message' => 'New User add successfully.', 'user' => $user]);
       }else {  
        return response()->json(['status' => 'error', 'message' => 'Something went wrong.']);
       }   
}

        //--- Update the user table
        public function updateUserTable(){
            $users = User::all();
            foreach ($users as $value) {
                echo "<tr>";
                echo "<td>" . $value->id . "</td>";
                echo "<td>" . $value->name . "</td>";
                echo "<td>" . $value->email . "</td>";
                echo "<td><span class='badge " . ($value->status == 1 ? 'badge-success' : 'badge-danger') . "'>" . ($value->status == 1 ? 'Active' : 'Inactive') . "</span></td>";
                echo "<td>
                    <a href='javascript:void(0)' data-toggle='tooltip' title='Edit' class='btn btn-link edit_data' id='". $value->id ."' data-original-title='Edit'><i class='fa fa-edit'></i></a>
                    <a href='javascript:void(0)' data-toggle='tooltip' title='Delete' class='btn btn-link delete_user' id='{$value->id}' data-original-title='Delete'><i class='fa fa-trash text-danger'></i></a>
                </td>";
                echo "</tr>";
            }            
         }

         // --- Destroy User
        public function userDestroy($id){

            try{
                if($id == Auth::user()->id){
                    return response()->json(['status'=>'error', 'message' => 'You cannot delete yourself.']);
                }

                $users = User::findOrFail($id);
    
                if($users->delete()){
                    return response()->json(['status'=>'success', 'message' => 'User deleted successfully']);
                }else{
                    return response()->json(['status'=>'error', 'message' => 'Deletion failed! Something went wrong.']);
                }
            }catch (Exception $e) {
                return response()->json(['status'=>'error', 'message' => "Error: ".$e->getMessage()]);
            }
        } 

        // --- View Settings
        public function settings(){
            return view('pages.settings');
        }

        //--- Update Settings ---
        public function updateSettings(Request $req){
            $req->validate([
                'fineamount' => 'required|numeric',
                'finedays' => 'required|numeric'
            ]);

            $condition = ['id' => 1];
            $data = [
                'fine_amount' => $req->fineamount,
                'fine_days' => $req->finedays,
                'updated_at' => now()
            ];

            $settings = settings::updateOrInsert($condition, $data);
            if($settings){
                return response()->json(['status' => 'success', 'message' => 'Setting updated successfully']);
            }else{
                return response()->json([
                    'status' => 'error',
                    'message' => 'Sorry, we encountered an issue while updating the settings. Please try again later.'
                ]);
                
            }
        }
}
