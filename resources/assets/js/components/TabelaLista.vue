<template>
    <div>
        <div class="form-inline" >
            <a v-if="criar  && !modal" v-bind:href="criar">Criar</a>
            <modallink v-if="criar  && modal" tipo="link" nome="adicionar" titulo="Criar" css=""></modallink>
            <div class="form-group pull-right" >
                <input type="search" class="form-control" placeholder="Buscar" v-model="buscar"></input>
            </div>
        </div>

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th style="cursor:pointer" v-on:click="ordenarColuna(index)" v-for="(titulo,index) in titulos">{{titulo}}</th>

                    <th v-if="detalhe || editar || deletar" >Ação</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(item, index) in lista">
                    <td v-for="i in item" >{{i}}</td>
                    
                    <td v-if="detalhe || editar || deletar" >
                        <form v-bind:id="index" v-if="deletar && token" action="index.html" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" v-bind:value="token">

                            <a v-if="detalhe" v-bind:href="detalhe">Detalhe |</a>
                            <a v-if="editar && !modal"  v-bind:href="editar"> Editar |</a>
                            <modallink v-if="editar && modal" v-bind:item="item" tipo="link" nome="editar" titulo=" Editar |" css="" ></modallink>

                            <a href="#" v-on:click="executaForm(index)">Deletar</a>              

                        </form>
                        <span v-if="!token" > 
                            <a v-if="detalhe" v-bind:href="detalhe">Detalhe |</a>
                            <a v-if="editar && !modal" v-bind:href="editar"> Editar |</a>
                            <modallink v-if="editar && modal" v-bind:item="item" tipo="link" nome="editar" titulo=" Editar |" css="" ></modallink>
                            <a v-if="deletar" v-bind:href="deletar"> Deletar </a>
                        </span>
                        <span v-if="token && !deletar"> 
                            <a v-if="detalhe" v-bind:href="detalhe">Detalhe |</a>
                            <a v-if="editar && !modal" v-bind:href="editar"> Editar </a>
                            <modallink v-if="editar && modal" v-bind:item="item" tipo="link" nome="editar" titulo=" Editar " css="" ></modallink>
                        </span>

                    </td>

                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        props:['titulos', 'itens', 'ordem', 'ordemcol', 'criar', 'detalhe',
        'deletar', 'editar', 'token','modal', 'index'
        ],
        data: function() {
            return {
                buscar: "",
                ordemAux: this.ordem || "asc",
                ordemAuxCol: this.ordemcol  || 0
            }
        },
        methods: {
            executaForm: function (index){
            document.getElementById(index).submit();
            },
            ordenarColuna: function (coluna) {
                this.ordemAuxCol = coluna;
                if (this.ordemAux.toLowerCase() == "asc"){
                    this.ordemAux = "desc";
                }else {
                    this.ordemAux = "asc";
                }
            }

        },
        // metodos computados para listagem e busca
        computed: {
            lista: function() {
                //let busca = "php";

                // Sort para ordenar a lista
                // this.itens.sort(function(a,b){
                //     if (a[0] < b[0]){ return 1;} // se o a for maior que o b, crescente
                //     if (a[0] > b[0]){ return -1;} //se o a for menor que b, descrescente
                //     return 0;
                // });

                let ordem = this.ordemAux || "asc";
                let ordemCol = this.ordemAuxCol || 0;

                ordem = ordem.toLowerCase(); 
                ordemCol = parseInt(ordemCol); //transforma a variavel em int

                if(ordem == "asc"){
                this.itens.sort(function(a,b){
                    if (Object.values(a)[ordemCol] > Object.values(b)[ordemCol]){ return 1;} // se o a for maior que o b, crescente
                    if (Object.values(a)[ordemCol] < Object.values(b)[ordemCol]){ return -1;} //se o a for menor que b, descrescente
                    return 0;
                });
                }else{
                this.itens.sort(function(a,b){
                    if (Object.values(a)[ordemCol] < Object.values(b)[ordemCol]){ return 1;} // se o a for maior que o b, crescente
                    if (Object.values(a)[ordemCol] > Object.values(b)[ordemCol]){ return -1;} //se o a for menor que b, descrescente
                    return 0;
                });
                }

                if(this.buscar){
                    return this.itens.filter(res => {
                    // regras da busca
                    for(let id_items = 0; id_items < res.length; id_items++){
                        // transformando em string com javascript
                        if((res[id_items]+ "").toLowerCase().indexOf(this.buscar.toLowerCase()) >= 0){
                            return true;
                        }
                    }
                    return false;
                });
                }


                

                return this.itens;
            }
        }
    }
</script>
