@extends('layouts.app')

@section('content')
    <pagina tamanho="12">
        <painel titulo="Artigos">

            <div class="row">
              @foreach ($lista as $key => $value)

              <artigocard
                titulo="{{$value->titulo}}"
                descricao="{{$value->descricao}}"
                link="#"
                imagem="https://cdn.pixabay.com/photo/2017/09/18/16/54/links-2762389_960_720.png"
                data="{{$value->data}}"
                autor="{{$value->autor}}"
                sm="6"
                md="4"
              >       
              </artigocard>
              @endforeach
            </div>

            <div align="center">
                {{$lista}}
            </div>
        </painel>
    </pagina>
    
@endsection

