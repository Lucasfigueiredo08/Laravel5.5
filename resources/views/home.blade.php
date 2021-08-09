@extends('layouts.app')

@section('content')
    <pagina tamanho="10">
        {{-- component painel.vue --}}
        <painel titulo="Dashboard">
            <migalhas v-bind:lista="{{$listaMigalhas}}"></migalhas>

            <div class="row">
                <div class="col-md-4">
                    <caixa qtd="80" titulo="Artigos" url="{{route('artigos.index')}}" cor="orange" icone="ion ion-pie-graph"></caixa>
                </div>

                <div class="col-md-4">
                    <caixa qtd="500" titulo="Usuários" url="{{route('usuarios.index')}}" cor="red" icone="ion ion-person-stalker"></caixa>
                </div>

                <div class="col-md-4">
                    <caixa qtd="4" titulo="Autores" url="#" cor="blue" icone="ion ion-person-stalker"></caixa>
                </div>
            </div>
        </painel>
    </pagina>
@endsection

