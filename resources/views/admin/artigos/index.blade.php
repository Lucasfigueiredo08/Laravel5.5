@extends('layouts.app')

@section('content')
    <pagina tamanho="12">
        <painel titulo="Lista de Artigos">
            <migalhas v-bind:lista="{{$listaMigalhas}}"></migalhas>

            {{-- <modallink tipo="link" nome="meuModalTest" titulo="Criar" css=""></modallink> --}}

            <tabela-lista 
                v-bind:titulos="['#', 'Títulos', 'Descrição']"
                v-bind:itens="{{$listaArtigos}}"
                ordem="desc" ordemCol="1"
                criar="#criar" detalhe="#detalhe" editar="#editar" deletar="#deletar" token="7575757575"
                modal="sim"
            ></tabela-lista>

        </painel>
    </pagina>
    <modal nome="adicionar">
        <painel titulo="Adicionar">
        
            <formulario css="" action="#" method="put" enctype="multipart/form-data" token="12345" >
                <div class="form-group">
                    <label for="titulo">Títulos</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" v-model="$store.state.item.titulo" placeholder="Título" >
                </div>

                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <input type="text" class="form-control" id="descricao" name="descricao" v-model="$store.state.item.descricao" placeholder="Descrição" >
                </div>

                <button class="btn btn-info">Adicionar</button>
            </formulario>
        </painel>
    </modal>

    <modal nome="editar">
        <painel titulo="Adicionar">
        
            <formulario css="" action="#" method="put" enctype="multipart/form-data" token="12345" >
                <div class="form-group">
                    <label for="titulo">Títulos</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" v-model="$store.state.item.titulo" placeholder="Título" >
                </div>

                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <input type="text" class="form-control" id="descricao" name="descricao" v-model="$store.state.item.descricao" placeholder="Descrição" >
                </div>

                <button class="btn btn-info">Adicionar</button>
            </formulario>
        </painel>
    </modal>
    {{-- s   --}}
    
@endsection

