@extends('layouts.app')

@section('content')
    <pagina tamanho="12">
        <painel titulo="Lista de Artigos">
            <tabela-lista 
            
            v-bind:titulos="['#', 'Títulos', 'Descrição']"
            v-bind:itens="[[1, 'php 00', 'curso de php 00'],[2, 'vue js', 'curso de vue js']]"
            criar="#criar" detalhe="#detalhe" editar="#editar" deletar="#deletar" token="7575757575"
            ></tabela-lista>
        </painel>
    </pagina>
@endsection

