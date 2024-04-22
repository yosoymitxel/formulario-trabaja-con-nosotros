<template>


    <div class=" w-screen">
        <div id="contenedor-cabecera" class="bg-sky-100" >
            <div class="py-10 px-4">
                <h2 class="text-4xl font-bold mb-4 text-blue-900">Trabajá con nosotros</h2>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
            </div>
        </div>

        <div class="w-full p-4">
            <form @submit.prevent="handleSubmit">
                <div id="contenedor-datos-personales" class="flex flex-col mb-4">
                    <h3 class="text-2xl  text-blue-500 mb-8">Datos Personales</h3>

                    <div class="flex flex-col">
                        <label for="nombre" class="mt-4 mb-2 font-bold text-blue-900">Nombre y Apellido</label>
                        <input
                            type="text"
                            id="nombre"
                            v-model="usuario.nombre"
                            class="border border-blue-300 p-3 rounded-lg"
                            required
                        >
                    </div>
                    <div class="flex flex-col">
                        <label for="fechaNacimiento" class="mt-4 mb-2 font-bold text-blue-900">Fecha de Nacimiento</label>
                        <input
                            type="date"
                            id="fechaNacimiento"
                            v-model="usuario.fechaNacimiento"
                            class="border border-blue-300 p-3 rounded-lg"
                            required
                        >
                    </div>

                    <div class="flex flex-col">
                        <label for="celular" class="mt-4 mb-2 font-bold text-blue-900">Número de Celular</label>
                        <input
                            type="tel"
                            id="celular"
                            v-model="usuario.celular"
                            class="border border-blue-300 p-3 rounded-lg"
                            required
                        >
                    </div>
                </div>

                <hr class="mb-8 mt-10 border-gray-300">

                <div id="contenedor-experiencia-laboral" class="mb-4">
                    <h3 class="text-2xl text-blue-500 mb-8">Experiencia Laboral</h3>

                    <div id="experiencias" class="flex flex-col gap-4">
                        <div v-for="(experiencia, index) in usuario.experiencias" :key="index">
                            <div class="flex flex-col">
                                <div id="contenedor-inputs-experiencia" v-if="experiencia.editable">
                                    <div class="">
                                        <div class="flex flex-col">
                                            <label for="empresa" class="mb-2 font-bold text-blue-900">Empresa</label>
                                            <input
                                                type="text"
                                                id="empresa"
                                                v-model="experiencia.empresa"
                                                class="border border-blue-300 p-3 rounded-lg"
                                                required
                                                placeholder="Nombre empresa"
                                            >
                                        </div>
                                        <div class="flex flex-col">
                                            <label for="cargo" class="mt-4 mb-2 font-bold text-blue-900">Cargo Ocupado</label>
                                            <input
                                                type="text"
                                                id="cargo"
                                                v-model="experiencia.cargo"
                                                class="border border-blue-300 p-3 rounded-lg"
                                                required
                                                placeholder="Ingresá el Cargo que ocupaste"
                                            >
                                        </div>

                                        <div class="flex flex-col">
                                            <label for="fechaDesde" class="mt-4 mb-2 font-bold text-blue-900">Fecha desde</label>
                                            <input
                                                type="date"
                                                id="fechaDesde"
                                                v-model="experiencia.fechaDesde"
                                                class="border border-blue-300 p-3 rounded-lg"
                                                required
                                            >
                                        </div>

                                        <div class="flex flex-col">
                                            <label for="fechaHasta" class="mt-4 mb-2 font-bold text-blue-900">Fecha hasta</label>
                                            <input
                                                type="date"
                                                id="fechaHasta"
                                                v-model="experiencia.fechaHasta"
                                                class="border border-blue-300 p-3 rounded-lg"
                                                required
                                            >
                                        </div>
                                    </div>

                                    <button
                                        class="bg-blue-500 text-white px-4 py-2 rounded mt-2"
                                        @click="saveExperiencia(index)"
                                    >
                                        Guardar
                                    </button>
                                </div>

                                <div v-else class="rounded-md bg-sky-100 p-4 mt-2">
                                    <div>
                                        <h4 class="font-bold text-blue-900">Nombre de la Empresa</h4>
                                        <p>{{ experiencia.empresa }}</p>
                                    </div>

                                    <hr class="my-4 border-gray-300">

                                    <div>
                                        <h4 class="font-bold text-blue-900">Cargo Ocupado</h4>
                                        <p>{{ experiencia.cargo }}</p>
                                    </div>

                                    <hr class="my-4 border-gray-300">

                                    <div>


                                        <div class="flex ">
                                            <div class="w-1/2">
                                                <h4 class="font-bold text-blue-900">Desde</h4>
                                                <p>{{ (experiencia.fechaDesde) }}</p>
                                            </div>
                                            <div class="w-1/2">
                                                <h4 class="font-bold text-blue-900">Hasta</h4>
                                                <p>{{ (experiencia.fechaHasta) }}</p>
                                            </div>
                                        </div>

                                    </div>
                                    <hr class="my-4 border-gray-300">
                                    <div class="flex items-center gap-2" v-if="!experiencia.editable" >
                                        <button class="font-bold bg-white w-1/2 text-blue-800 px-4 py-2 rounded-md" @click="removeExperiencia(index)">
                                            <i v-if="experiencia.editable" class="fas fa-pencil-alt"></i>
                                            <i v-else class="fas fa-lock"></i> Eliminar
                                        </button>

                                        <button class="font-bold bg-white  w-1/2 text-blue-800 px-4 py-2 rounded-md" @click="toggleEditable(index)">
                                            Editar
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <button
                        class="bg-blue-300 w-full text-blue-800 px-4 py-3 font-bold rounded-md mt-2"
                        @click="addExperiencia"
                    >
                        <div>
                            Agregar Experiencia
                        </div>
                        <div>
                            <i class="fas fa-plus"></i>
                        </div>
                    </button>
                </div>

                <button type="submit" class="bg-blue-800 text-white text-center w-full text-md  px-4 py-4 rounded-md">
                    POSTULARME
                </button>
            </form>
        </div>
    </div>


</template>

<script>
    export default {
        data() {
            return {
                usuario: {
                    nombre: '',
                    fechaNacimiento: '',
                    celular: '',
                    experiencias: [
                        {
                            empresa: '',
                            cargo: '',
                            fechaDesde: '',
                            fechaHasta: '',
                            editable: true, // Estado inicial editable
                        },
                    ],
                    idiomas: [
                        {
                            idioma: '',
                            nivel: '',
                        },
                    ],
                    archivo: null,
                },
            };
        },

        methods: {
            addExperiencia() {

                let experiencia = this.usuario.experiencias

                console.log(this.usuario.experiencias.length)

                experiencia = experiencia[this.usuario.experiencias.length]

                console.log(experiencia)

                if( experiencia.empresa == '' &&
                    experiencia.cargo == '' &&
                    experiencia.fechaDesde == '' &&
                    experiencia.fechaHasta == ''){
                    return;
                }

                this.usuario.experiencias[this.usuario.experiencias.length].editable = false;

                this.usuario.experiencias.push({
                    empresa: '',
                    cargo: '',
                    fechaDesde: '',
                    fechaHasta: '',
                    editable: true, // Estado inicial editable
                });
            },

            removeExperiencia(index) {
                this.usuario.experiencias.splice(index, 1);
            },

            toggleEditable(index) {
                this.usuario.experiencias[index].editable = !this.usuario.experiencias[index].editable;
            },

            saveExperiencia(index) {
                // Validar datos antes de guardar
                // ...

                // Guardar cambios en el backend (si es necesario)
                // ...
                // Validar que todos los campos estén completos
                /*if (!this.usuario.experiencias[index].empresa || !this.usuario.experiencias[index].cargo || !this.usuario.experiencias[index].fechaDesde || !this.usuario.experiencias[index].fechaHasta) {
                    alert('Debes completar todos los campos de la experiencia laboral para guardarla.');
                    return; // No guardar si faltan datos
                }*/

                // Marcar la experiencia como no editable

                console.log(this.usuario.experiencias)

                this.usuario.experiencias[index].editable = false;
            },

            addIdioma() {
                this.usuario.idiomas.push({
                    idioma: '',
                    nivel: '',
                });
            },

            removeIdioma(index) {
                this.usuario.idiomas.splice(index, 1);
            },

            handleSubmit() {
                // Validar datos y enviar formulario
                console.log('Formulario enviado:', this.usuario);
            },
        },
    };
</script>
