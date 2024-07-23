<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Transaction;
use Hash;
use Auth;
use DB;
class TransactionController extends Controller
{
    public function register_view(){
        return view('Register');
    }

    public function postregister(Request $request){

                 $user =User::where('email',$request->email)->first();
                 if($user){
                    return response()->json([
                        'status'=>'email',
                 ]);  
                 }
                  $data = new User;
                  $data->name=$request->name;
                  $data->email=$request->email;
                  $data->password=Hash::make($request->password);
                  $data->save();
                        return response()->json([
                               'status'=>200,
                        ]);      
    }

    public function login_view(Request $request){
        return view('login');

    }

     public function login(Request $request){
        $credentials = [
            'email' => $request['email'],
            'password' => $request['password'],
        ];
        if (Auth::attempt($credentials)) {
             return redirect()->route('dashboard');
        
        }
        return back()->with('failpass','This is not credentials');
     }
     public function tration_view(){
        $transactions=Transaction::all();
        return view('transactions.index',compact('transactions'));
     }
     public function dashboard(){
         $total_amount=Transaction::all();
         $tota_val=$total_amount->sum('amount');

        $transactions = Transaction::where('type','expense')->get();
        $expense_Amount = $transactions->sum('amount');
        $income = Transaction::where('type','income')->get();
        $income_totalAmount = $income->sum('amount');


        return view('transactions.dashboard',compact('expense_Amount','income_totalAmount','tota_val'));
     }
     public function tration_create(){
        return view('transactions.transactions_create');
     }
     public function tration_post(Request $request){

        $user_data= new Transaction; 
        $user_data->description=$request->description;
        $user_data->amount=$request->amount;
        $user_data->date=$request->date;
        $user_data->type=$request->type;
        $user_data->save();
        return redirect()->route('tration_view');
     }
     public function tration_edit($id){
              $transactions_edit=Transaction::where('id',$id)->first();
              return view('transactions.transactions_edit',compact('transactions_edit'));  
     }
   public function logout(){
    Auth::logout();
    return redirect('/login');
   }

   public function tration_update(Request $request){
            $user_data =Transaction::find($request->get_id);
            $user_data->description=$request->description;
            $user_data->amount=$request->amount;
            $user_data->date=$request->date;
            $user_data->type=$request->type;
            $user_data->save();
            return redirect()->route('tration_view');
            
   }

   public function delete_data(Request $request)
   {
       Transaction::where('id',$request->id_delete)->delete();
  
       return redirect()->route('tration_view')->with('success', 'Transaction deleted successfully.');
   }
}
