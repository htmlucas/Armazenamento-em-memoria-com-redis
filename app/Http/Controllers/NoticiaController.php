<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use App\Http\Requests\StoreNoticiaRequest;
use App\Http\Requests\UpdateNoticiaRequest;
use Illuminate\Support\Facades\Cache;

class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* $noticias = [];
        //$noticias = Noticia::orderByDesc('created_at')->limit(10)->get();
        
        //criar um dado dentro do bd redis
        Cache::put('site','google.com.br',10);
        // chave, valor e tempo em s

        //recuperar o dado dentro do bd redis

        $site = Cache::get('site');
        echo $site; */

        $noticias = [];
        

       /*  if(Cache::has('Dez primeiras noticias do dia')){
            $noticias = Cache::get('Dez primeiras noticias do dia');
        }else{
            $noticias = Noticia::orderByDesc('created_at')->limit(10)->get();
            Cache::put('Dez primeiras noticias do dia',$noticias,15);
        } */

        $noticias = Cache::remember('Dez primeiras noticias do dia',15,function(){
            return Noticia::orderByDesc('created_at')->limit(10)->get();
        });
       
        
        return view('noticias',['noticias' => $noticias]);

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNoticiaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNoticiaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function show(Noticia $noticia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function edit(Noticia $noticia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNoticiaRequest  $request
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNoticiaRequest $request, Noticia $noticia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Noticia $noticia)
    {
        //
    }
}
