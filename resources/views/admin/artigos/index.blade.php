@extends('layouts.app')

@section('content')
    <pagina tamanho="12">
        <painel titulo="Lista de Artigos">
            <migralhas v-bind:lista="{{$listaMigalhas}}"></migralhas>
            <tabela-lista 
            v-bind:titulos="['#', 'Títulos', 'Descrição']"
            v-bind:itens="[[1, 'php 00', 'curso de php 00'],[2, 'vue js', 'curso de vue js']]"
            ordem="desc" ordemCol="1"
            criar="#criar" detalhe="#detalhe" editar="#editar" deletar="#deletar" token="7575757575"
            ></tabela-lista>
        </painel>
    </pagina>
@endsection

