<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function index(){
        return $this->all();
    }

    public function show ($user_id, $book_id, $start)
    {
        $reservation=$this->where('user_id', $user_id)->where('book_id', $book_id)->where('start', $start)->first();
        return $reservation[0];
    }

    public function destroy($user_id, $book_id, $start){
       $this->show($user_id, $book_id, $start)->delete();
    }
    /*
    public function update(Request $request, $user_id, $book_id, $start){
        $reservation = Reservation::show($user_id, $book_id, $start);
        $reservation->user_id = $request->user_id;
        $reservation->book_id = $request->book_id;
        $reservation->start = $request->start;
        $reservation->save();
    }
    */
    public function store(Request $request){
        $reservation = new Reservation();
        $reservation->user_id = $request->user_id;
        $reservation->book_id = $request->book_id;
        $reservation->start=$request->start;
        $reservation->message=$request->message;
        $reservation->start = $request->start;
        $reservation->save();
        
    }

    public function reservationUser(){
        //bejelentkezett felhasználó
        $user = Auth::user();
        $reservations = $this->with('user')->where('user_id','=',$user->id)->get();
        return $reservations;
    }

    public function reservationUser2(){
        //bejelentkezett felhasználó
        $user = Auth::user();
        $reservations = $this->with('userHas')->where('user_id','=',$user->id)->get();
        return $reservations;
    }
}
