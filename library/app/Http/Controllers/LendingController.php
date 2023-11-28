<?php

namespace App\Http\Controllers;

use App\Models\Lending;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\DB;

class LendingController extends Controller
{
    public function index(){
        return Lending::all();
    }

    public function show ($user_id, $copy_id, $start)
    {
        $lending = Lending::where('user_id', $user_id)->where('copy_id', $copy_id)->where('start', $start)->get();
        return $lending[0];
    }


    public function destroy($user_id, $copy_id, $start){
        LendingController::show($user_id, $copy_id, $start)->delete();
    }
    
    public function update(Request $request, $user_id, $copy_id, $start){
        $lending = Lending::show($user_id, $copy_id, $start);
        $lending->user_id = $request->user_id;
        $lending->copy_id = $request->copy_id;
        $lending->start = $request->start;
        $lending->save();
    }
    
    public function store(Request $request){
        $lending = new Lending();
        $lending->user_id = $request->user_id;
        $lending->copy_id = $request->copy_id;
        $lending->start = $request->start;
        $lending->save();
        
    }

    public function lendingUser(){
        //bejelentkezett felhasználó
        $user = Auth::user();
        $lendings = Lending::with('user')->where('user_id','=',$user->id)->get();
        return $lendings;
    }

    public function lendingUser2(){
        //bejelentkezett felhasználó
        $user = Auth::user();
        $lendings = Lending::with('userHas')->where('user_id','=',$user->id)->get();
        return $lendings;
    }
    public function bookAtUser(){
        $user = Auth::user();
        $books = DB::table('lendings as l')	//egy tábla lehet csak
        ->join('copies as c' ,'c.copy_id','=','l.copy_id') //kapcsolat leírása, akár több join is lehet
        ->join('books as b' ,'c.book_id','=','b.book_id')
        ->select('b.title','b.author')	
        ->where('b.title','=', $user->id)
        ->whereNull('l.end') 	//esetleges szűrés
        ->get();				//esetleges aggregálás; ha select, akkor get() a vége
        return $books;
    }
    public function lengthen($copy_id,$start){
        $user = Auth::user();
        DB::table('lendings')
        ->where('copy_id', $copy_id)
        ->where('start', $start)
        ->where('user_id', $user->id)
        ->update(['extension' => 1]); 
    }
    public function extend_question($copy_id,$start){
        $user = Auth::user();
        DB::table('lendings')
        ->join('users as u.','u.user_id','=','l.user_id')
        ->join('reservation as r','r.user_id','=','l.user_id')
        ->where('copy_id', $copy_id)
        ->where('start', $start)
        ->where('user_id', $user->id)
        ->where('book_id','!=','user_id')
        ->update(['extension' => 1]); 
    }
}
