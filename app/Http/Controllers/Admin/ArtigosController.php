<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use App\Artigo;

class ArtigosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaMigalhas = json_encode([
            ["titulo" => "Home", "url"=> route('home')],
            ["titulo" => "Lista de Artigos", "url"=> ""]
        ]);

        $listaArtigos = Artigo::select('id', 'titulo', 'descricao', 'data')->paginate(5); //->get());
        // $listaArtigos = json_encode([
        //     ["id" => 1, "titulo"=> "PHP OO", "descricao"=> "Curso de PHP OO", "data"=>"2021-07-30"],
        //     ["id" => 2, "titulo"=> "Vue JS", "descricao"=> "Curso de Vue JS", "data"=>"2021-07-20"]
        //                         ]);


        return view('admin.artigos.index', compact('listaMigalhas', 'listaArtigos'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //dd($request->all());
        $data = $request->all();

        $validacao = \Validator::make($data,[
            "titulo" => "required",
            "descricao" => "required",
            "conteudo" => "required",
            "data" => "required",
        ]);

        if($validacao->fails()){
            return redirect()->back()->withErrors($validacao)->withInput();
        }
       // $artigo = new Artigo;
       // $artigo->titulo = $data['titulo'];
       // $artigo->save();
        Artigo::create($data);
        return redirect()->back();
    }

    /**s
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //mostrar as informações dos artigos
        return Artigo::find($id);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $data = $request->all();

         $validacao = \Validator::make($data,[
             "titulo" => "required",
             "descricao" => "required",
             "conteudo" => "required",
             "data" => "required",
         ]);
 
         if($validacao->fails()){
             return redirect()->back()->withErrors($validacao)->withInput();
         }
        //  procure o id e toque as informações pelas que estão no $data
         Artigo::find($id)->update($data);
         return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Artigo::find($id)->delete();
        return redirect()->back();
        //$artigo->delete();
    }
}
