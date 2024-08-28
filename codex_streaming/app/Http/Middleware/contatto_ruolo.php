<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class contatto_ruolo
{

    public function handle(Request $request, Closure $next, ...$required_ruoli): Response
    {

        if (0 === count(array_intersect($required_ruoli, $request->contatti_ruoli ?? []))) {
            abort(403, 'ATTENZIONE: non possiedi il ruolo corretto');
        }

        return $next($request);
    }

}
