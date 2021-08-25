<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


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
}
