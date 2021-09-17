<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;


class Artigo extends Model
{
    use SoftDeletes;

    protected $fillable = ['titulo', 'descricao', 'conteudo', 'data'];

    protected $dates = ['deleted_at'];

    //relacionamentos
    
    public function user()
    {
        return $this->belongsTo('App\User'); // traz o usuário que tem relação com o artigo
    }

    public static function listaArtigo ($paginate){
        $listaArtigos = Artigo::select('id', 'titulo', 'descricao', 'user_id', 'data')->paginate($paginate);
        
        /*
        foreach ($listaArtigos as $key => $value){
            $value->user_id = User::find($value->user_id)->name;
            //$value->user_id = $value->user->name;
            //unset($value->user);
        }*/

        $listaArtigos = DB::table('artigos')
                        ->join('users', 'users.id', '=', 'artigos.user_id')
                        ->select('artigos.id', 'artigos.titulo','artigos.descricao', 'users.name', 'artigos.data')
                        // Verifica se o arquivo de data de excluído
                        ->whereNull('deleted_at')
                        ->paginate(5);

        return $listaArtigos;
    }

    public static function listaArtigoSite ($paginate){
        $listaArtigos = Artigo::select('id', 'titulo', 'descricao', 'user_id', 'data')->paginate($paginate);


        $listaArtigos = DB::table('artigos')
                        ->join('users', 'users.id', '=', 'artigos.user_id')
                        ->select('artigos.id', 'artigos.titulo','artigos.descricao', 'users.name as autor', 'artigos.data')
                        // Verifica se o arquivo de data de excluído
                        ->whereNull('deleted_at')
                        ->whereDate('data', '<=', date('Y-m-d'))
                        ->orderBy('data', 'DESC')
                        ->paginate(5);

        return $listaArtigos;
    }
}
