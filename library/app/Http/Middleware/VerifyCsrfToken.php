<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
<<<<<<< HEAD
        //'/api/books/*',
        //'/api/books',
        //'/api/lendings/*/*/*',
        //'/api/user_password/*',
        //'/api/reservation/*/*/*'
=======
      
>>>>>>> 6a9165a445908138911896343ad9dee2860bf814
    ];
}
