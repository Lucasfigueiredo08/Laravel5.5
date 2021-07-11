<template>
    <div v-bind:class="defineCor">
        <div class="panel-heading">{{titulo}}</div>

        <div class="panel-body">
            <slot></slot>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['titulo', 'cor'],
        computed: {
            defineCor: function(){
                return "panel "+ (this.cor || "panel-default");
            }
        }
    }
</script>

<style media="screen">
    .pink {
        border-color: #b800d3 ;
    }

    .pink > .panel-heading {
    color: #f1f1f1;
    background-color: #b800d3;
    border-color: #b800d3;
    }
    
    .red {
        border-color: #ca0808;
    }

    .red > .panel-heading {
    color: #f1f1f1;
    background-color: #ca0808;
    border-color: #ca0808;
    }

    .green {
        border-color: #2fcc47;
    }

    .green > .panel-heading {
    color: #f1f1f1;
    background-color: #2fcc47;
    border-color: #2fcc47;
    }

</style>
