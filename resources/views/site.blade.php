@extends('layouts.app')

@section('content')
    <pagina tamanho="12">
        <painel titulo="Artigos">

          <p>
            <form class="form-inline text-center" action="{{route('site')}}" method="get">
              <input type="search"
              class="form-control"
              name="busca"
              placeholder="Buscar"
              value="{{isset($busca) ? $busca : ""}}"
              >
              <button class="btn btn-info">Buscar</button> 
            </form>
          </p>

            <div class="row">
              @foreach ($lista as $key => $value)

              <artigocard
                titulo="{{str_limit($value->titulo, 40, "...")}}"
                descricao="{{str_limit($value->descricao, 40, "...")}}"
                link=" {{route('artigo', [$value->id, str_slug($value->titulo)])}}"
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

