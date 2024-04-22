<template>
    <div class="w-screen overflow-x-hidden">
        <div>
            <div id="contenedor-cabecera" class="bg-sky-100" >
                <div class="py-10 px-4">
                    <h2 class="text-4xl font-bold mb-4 text-blue-900">Trabajá con nosotros</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                </div>
            </div>

            <div class="w-screen p-4 flex justify-center">
                <form @submit.prevent="handleSubmit" class="w-full container">
                    <div id="contenedor-datos-personales" class="flex flex-col mb-4">
                        <h3 class="text-2xl  text-blue-500">Datos Personales</h3>

                        <div class="flex flex-col">
                            <label for="nombre" class="mt-4 mb-2 font-bold text-blue-900">Nombre y Apellido</label>
                            <input
                                type="text"
                                id="nombre"
                                v-model="usuario.nombre"
                                class="border border-blue-300 p-3 rounded-lg"
                                required
                                placeholder="Nombre y Apellido"
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
                                placeholder="09XX XXX XXX"
                            >
                        </div>
                    </div>

                    <hr class="mb-8 mt-10 border-gray-300">

                    <div id="contenedor-experiencia-laboral" class="mb-4">
                        <h3 class="text-2xl text-blue-500 mb-8">Experiencia Laboral</h3>

                        <div id="experiencias" class="flex flex-col gap-4 mb-8">
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
                            class="bg-blue-300 w-full text-blue-800 p-4 mt-4 font-bold rounded-md mt-2 flex justify-between mt-4"
                            @click="addExperiencia"
                        >
                            <div class="text-left">
                                Agregar Experiencia
                            </div>
                            <div>
                                <i class="fas fa-plus"></i>
                            </div>
                        </button>
                    </div>

                    <hr class="mb-8 mt-10 border-gray-300">

                    <div id="contenedor-idiomas" class="mb-4">
                        <h3 class="text-2xl text-blue-500 mb-8">Idiomas</h3>

                        <div id="idiomas" class="flex flex-col gap-4 mb-8">
                            <div v-for="(idioma, index) in usuario.idiomas" :key="index">
                                <div class="flex flex-col">
                                    <div id="contenedor-inputs-idiomas" v-if="idioma.editable">
                                        <div class="">
                                            <div class="flex flex-col">
                                                <label for="idioma" class="mb-2 font-bold text-blue-900">Idioma</label>
                                                <select
                                                    v-model="idioma.idioma"
                                                    id="idioma"
                                                    class="border border-blue-300 p-3 rounded-lg focus:outline-none w-full cursor-pointer appearance-none"
                                                    required
                                                >
                                                    <option value="" disabled selected>Selecciona un idioma</option>
                                                    <option v-for="(lidioma,index) in listas.idiomas" :key="index" :value="lidioma.descripcion">
                                                        {{ lidioma.descripcion }}
                                                    </option>
                                                </select>
                                            </div>

                                            <div class="flex flex-col">
                                                <label for="idioma" class="mb-2 font-bold text-blue-900">Idioma</label>
                                                <select
                                                    v-model="idioma.nivel"
                                                    id="nivel"
                                                    class="border border-blue-300 p-3 rounded-lg focus:outline-none w-full cursor-pointer appearance-none"
                                                    required
                                                >
                                                    <option value="" disabled selected>Selecciona un idioma</option>
                                                    <option v-for="(lnivel, index) in listas.nivel" :key="index" :value="lnivel.descripcion">
                                                        {{ lnivel.descripcion }}
                                                    </option>
                                                </select>
                                            </div>

                                        </div>
                                    </div>

                                    <div v-else class="rounded-md bg-sky-100 p-4 mt-2">
                                        <div>
                                            <h4 class="font-bold text-blue-900">Idioma</h4>
                                            <p>{{ idioma.idioma }}</p>
                                        </div>

                                        <hr class="my-4 border-gray-300">

                                        <div>
                                            <h4 class="font-bold text-blue-900">Nivel</h4>
                                            <p>{{ idioma.nivel }}</p>
                                        </div>

                                        <hr class="my-4 border-gray-300">

                                        <div class="flex items-center gap-2" v-if="!idioma.editable" >
                                            <button class="font-bold bg-white w-1/2 text-blue-800 px-4 py-2 rounded-md" @click="removeIdioma(index)">
                                                <i v-if="idioma.editable" class="fas fa-pencil-alt"></i>
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
                            class="bg-blue-300 w-full text-blue-800 p-4 mt-4 font-bold rounded-md mt-2 flex justify-between "
                            @click="addIdioma"
                        >
                            <div class="text-left">
                                Agregar Idioma
                            </div>
                            <div>
                                <i class="fas fa-plus"></i>
                            </div>
                        </button>
                    </div>

                    <hr class="mb-8 mt-10 border-gray-300">

                    <div id="contenedor-archivo" class="mb-8 text-center">
                        <div class="mb-2">
                            <h3 class="text-2xl text-blue-500">Adjuntar Archivo</h3>
                            <p class="text-gray-400">(Formato PDF o Word, peso máximo 10mb)</p>
                        </div>

                        <button
                            class="bg-blue-300 w-full text-blue-800 p-4 mt-4 font-bold rounded-md mt-2  "
                        >
                        <i class="fa-solid fa-paperclip"></i> Subir CV
                        </button>
                    </div>

                    <hr class="mb-8 mt-10 border-gray-300">

                    <button type="submit" class="bg-blue-800 text-white text-center w-full text-md p-4  rounded-md">
                        POSTULARME
                    </button>
                </form>
            </div>
        </div>

    </div>


</template>

<script>
    export default {
        data() {
            return {
                usuario: {
                    nombre: '',
                    fechaNacimiento: this.toDay(),
                    celular: '',
                    experiencias: [
                        {
                            empresa: '',
                            cargo: '',
                            fechaDesde: this.toDay(),
                            fechaHasta: this.toDay(),
                            editable: true, // Estado inicial editable
                        },
                    ],
                    idiomas: [
                        {
                            idioma: '',
                            nivel: '',
                            editable: true, // Estado inicial editable
                        },
                    ],
                    archivo: null,
                },
                listas: {
                    idiomas:[
                        {
                            descripcion: 'Español',
                        },
                        {
                            descripcion: 'Inglés',
                        },
                        {
                            descripcion: 'Portugués',
                        },
                        {
                            descripcion: 'Alemán',
                        },
                    ],
                    nivel:[
                        {
                            descripcion: 'Básico',
                        },
                        {
                            descripcion: 'Intermedio',
                        },
                        {
                            descripcion: 'Avanzado',
                        },
                    ],
                }
            };
        },
        computed:{

        },
        methods: {
            addExperiencia() {

                let experiencia = this.usuario.experiencias;

                if (experiencia.every(exp =>
                    (!exp.empresa || exp.empresa == '') &&
                    (!exp.cargo || exp.cargo == '') &&
                    (!exp.fechaDesde || exp.fechaDesde == '') &&
                    (!exp.fechaHasta || exp.fechaHasta == '')
                )) {
                    return; // All fields empty, do nothing
                }

                // Get the last index after pushing the new experience
                const lastIndex = this.usuario.experiencias.length - 1;

                // Set editable to false for the last experience
                this.usuario.experiencias[lastIndex].editable = false;

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

            addIdioma() {

                console.log(this.usuario.idiomas)

                // Get the last index after pushing the new experience
                const lastIndex = this.usuario.idiomas.length - 1;

                // Set editable to false for the last experience
                this.usuario.idiomas[lastIndex].editable = false;

                this.usuario.idiomas.push({
                    idioma: '',
                    nivel: '',
                    editable: true,
                });
            },

            removeIdioma(index) {
                this.usuario.idiomas.splice(index, 1);
            },

            handleSubmit() {
                // Validar datos y enviar formulario
                console.log('Formulario enviado:', this.usuario);
            },
            toDay(){
                return new Date().toISOString().slice(0, 10)
            },
        },
    };
</script>
