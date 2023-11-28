<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
<<<<<<< HEAD
    protected $fillable = [
        'user_id',
        'copy_id',
        'start',
        'message'
    ];
    protected function setKeysForSaveQuery($query)
    {
        $query
            ->where('user_id','=',$this->getAttribute('user_id'))
            ->where('book_id','=',$this->getAttribute('book_id'))
            ->where('start','=',$this->getAttribute('start')) ;
=======

    protected $fillable = [
        'user_id',
        'book_id',
        'start',
        'message'
    ];

    protected function setKeysForSaveQuery($query)
    {
        $query
            ->where('user_id', '=', $this->getAttribute('user_id'))
            ->where('book_id', '=', $this->getAttribute('book_id'))
            ->where('start', '=', $this->getAttribute('start'));
        return $query;
>>>>>>> 6a9165a445908138911896343ad9dee2860bf814
    }
}
