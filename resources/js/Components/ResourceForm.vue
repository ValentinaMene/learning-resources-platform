<script setup>
import {ref} from "vue";
    
let tittle = ref("");
let description = ref("");
let link = ref("");

function createResource() {
    axios
    .post("/api/resources",{
        tittle: tittle.value,
        description: description.value,
        link: link.value,
    })
    .then((response) => {
        console.log(response);
    });

    /*
    console.log("Creando recurso...");
    console.log(tittle.value);
    console.log(description.value);
    console.log(link.value)
    */
}

</script>


<template>
    <div class="m-8">
    <input type="text" v-model="tittle" />
    <input type="text" v-model="description"/>
    <input type="text" v-model="link"/>
    <button @click="createResource">Crear recurso</button>
    </div>
</template>