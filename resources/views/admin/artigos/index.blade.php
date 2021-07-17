@extends('layouts.app')

@section('content')
    <pagina tamanho="12">
        <painel titulo="Lista de Artigos">
            <migalhas v-bind:lista="{{$listaMigalhas}}"></migalhas>
            <modallink tipo="button" nome="meuModalTest" titulo="Criar" css=""></modallink>

            <tabela-lista 
                v-bind:titulos="['#', 'Títulos', 'Descrição']"
                v-bind:itens="[[1, 'php 00', 'curso de php 00'],[2, 'vue js', 'curso de vue js']]"
                ordem="desc" ordemCol="1"
                criar="#criar" detalhe="#detalhe" editar="#editar" deletar="#deletar" token="7575757575"
            ></tabela-lista>

        </painel>
    </pagina>
    <modal nome="meuModalTest">
        <painel titulo="Adicionar">
        
            <formulario css="" action="#" method="put" enctype="multipart/form-data" token="12345" >
                <div class="form-group">
                    <label for="titulo">Títulos</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título" >
                </div>

                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição" >
                </div>

                <button class="btn btn-info">Adicionar</button>
            </formulario>
        </painel>
    </modal>
    
    
@endsection

