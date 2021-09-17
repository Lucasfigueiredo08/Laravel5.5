@extends('layouts.app')

@section('content')
    <pagina tamanho="12">
        <painel titulo="Artigos">

            <div class="row">
              <artigocard
                titulo="Titulo"
                descricao="descricao teste"
                link="#"
                imagem="https://cdn.pixabay.com/photo/2017/09/18/16/54/links-2762389_960_720.png"
                data="16/09/2021"
                autor="Lucas"
                sm="6"
                md="4"
              >
              </artigocard>
            </div>

        </painel>
    </pagina>
    
@endsection

