<?php

namespace App\Http\Controllers\Admin;

use App\Indicador;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class IndicadoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.indicador.index');
    }

    public function getList() {
        Session::put('indicadorSearch', Input::has('ok') ? Input::get('search') : (Session::has('indicadorSearch') ? Session::get('indicadorSearch') : ''));
        Session::put('indicadorField', Input::has('field') ? Input::get('field') : (Session::has('indicadorField') ? Session::get('indicadorField') : 'nombre'));
        Session::put('indicadorSort', Input::has('sort') ? Input::get('sort') : (Session::has('indicadorSort') ? Session::get('indicadorSort') : 'asc'));
        $indicadores = Indicador::where('nombre', 'like', '%' . Session::get('indicadorSearch') . '%')
            ->orwhere('clave', 'like', '%' . Session::get('indicadorSearch') . '%')
            ->orderBy(Session::get('indicadorField'), Session::get('indicadorSort'))->paginate(8);
        return view('admin.indicador._list', compact('indicadores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.indicador.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Indicador  $indicador
     * @return \Illuminate\Http\Response
     */
    public function show(Indicador $indicador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Indicador  $indicador
     * @return \Illuminate\Http\Response
     */
    public function edit(Indicador $indicador)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Indicador  $indicador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Indicador $indicador)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Indicador  $indicador
     * @return \Illuminate\Http\Response
     */
    public function destroy(Indicador $indicador)
    {
        //
    }
}
