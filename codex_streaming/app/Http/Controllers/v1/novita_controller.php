<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\categoria_store_request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class novita_controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $tipo = $request->query('tipo');
        $query = DB::table('vista_novita');

        if ($tipo) {
            $query->where('tipo', $tipo);
        }

        $risorsa = $query->get();

        return $risorsa;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(categoria_store_request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($novita)
    {
        $risorsa = DB::table('vista_novita')->where('id', $novita)->first();
        return $risorsa;
    }


}
