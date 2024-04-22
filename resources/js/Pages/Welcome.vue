<template>
    <header class='flex p-6 bg-blue-400 font-[sans-serif] min-h-[70px] tracking-wide relative z-50'>
        <div class='flex flex-wrap items-center justify-between gap-5 w-full'>
            <a href="javascript:void(0)" class="font-bold text-white text-lg"> <i class="fa-solid fa-circle text-blue-800"></i> <span class="text-blue-800">N</span>test
            </a>

            <div id="collapseMenu" v-if="collapseMenu">
                <button id="toggleClose" @click="toggleCollapseMenu" class='lg:hidden fixed top-2 right-4 z-[100] rounded-full p-3'>
                </button>

                <ul
                    class='lg:flex gap-x-5 max-lg:space-y-3 max-lg:fixed max-lg:bg-white max-lg:w-1/2 max-lg:min-w-[300px] max-lg:top-0 max-lg:left-0 max-lg:p-6 max-lg:h-full max-lg:shadow-md max-lg:overflow-auto z-50'>
                    <li class='mb-6 hidden max-lg:block'>
                        <a href="javascript:void(0)" class="font-bold text-lg"> <i class="fa-solid fa-circle text-blue-800"></i> <span class="text-blue-800">N</span>test
                        </a>
                    </li>
                    <li class='max-lg:border-b border-gray-300 max-lg:py-3 px-3'>
                        <a href='/'
                           class='hover:text-[#007bff] text-[#007bff] block font-semibold text-[15px]'>Trabaja con nosotros</a>
                    </li>
                </ul>
            </div>

            <div class='flex max-lg:ml-auto space-x-3'>
                <button id="toggleOpen" @click="toggleCollapseMenu" >
                    <i class="text-blue-800 fa-solid fa-bars"></i>
                </button>
            </div>
        </div>
    </header>
    <main class="w-screen overflow-x-hidden">
        <div>
            <div id="contenedor-cabecera" class="bg-sky-100" >
                <div class="py-10 px-4">
                    <h2 class="text-4xl  mb-4 text-blue-900 font-black">Trabajá con nosotros</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                </div>
            </div>

            <div class="w-screen p-4 flex justify-center">
                <form @submit.prevent="handleSubmit" class="w-full container mb-6">
                    <div id="contenedor-datos-personales" class="flex flex-col mb-4">
                        <h3 class="text-2xl  text-blue-500">Datos Personales</h3>

                        <div class="flex flex-col">
                            <label for="nombre" class="mt-4 mb-2 font-bold text-blue-900 font-black">Nombre y Apellido</label>
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
                            <label for="fecha_nacimiento" class="mt-4 mb-2 font-bold text-blue-900 font-black">Fecha de Nacimiento</label>
                            <input
                                type="date"
                                id="fecha_nacimiento"
                                v-model="usuario.fecha_nacimiento"
                                class="border border-blue-300 p-3 rounded-lg"
                                required
                            >
                        </div>

                        <div class="flex flex-col">
                            <label for="celular" class="mt-4 mb-2 font-bold text-blue-900 font-black">Número de Celular</label>
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
                                                <label for="cargo" class="mt-4 mb-2 font-bold text-blue-900 font-black">Cargo Ocupado</label>
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
                                                <label for="fechaDesde" class="mt-4 mb-2 font-bold text-blue-900 font-black">Fecha desde</label>
                                                <input
                                                    type="date"
                                                    id="fechaDesde"
                                                    v-model="experiencia.fechaDesde"
                                                    class="border border-blue-300 p-3 rounded-lg"
                                                    required
                                                >
                                            </div>

                                            <div class="flex flex-col">
                                                <label for="fechaHasta" class="mt-4 mb-2 font-bold text-blue-900 font-black">Fecha hasta</label>
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
                                            <div class="flex flex-col mb-4">
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
                                                <label for="idioma" class="mb-2 font-bold text-blue-900">Nivel</label>
                                                <select
                                                    v-model="idioma.nivel"
                                                    id="nivel"
                                                    class="border border-blue-300 p-3 rounded-lg focus:outline-none w-full cursor-pointer appearance-none"
                                                    required
                                                >
                                                    <option value="" disabled selected>Selecciona un nivel</option>
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

                        <input type="file" id="fileInput" ref="fileInput" hidden @change="handleFileUpload" accept=".pdf,.docx,.doc" />

                        <button
                            type="button"
                            class="bg-blue-300 w-full text-blue-800 p-4 mt-4 font-bold rounded-md mt-2"
                            @click="openFileInput"
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

    </main>
    <footer>
        <div id="modal-content" class="fixed z-10 inset-0 overflow-y-auto " v-if="showComponent">
            <div class="flex items-center justify-center min-height-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 transition-opacity">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>
                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4 flex flex-col items-center text-center">
                        <div v-if="tituloModal === 'ok'" class="flex items-center justify-center w-20 h-20 rounded-full bg-green-200">
                            <span  class="text-3xl text-green-500"><i class="fa fa-check"></i></span>
                        </div>
                        <div v-else-if="tituloModal === 'error'" class="flex items-center justify-center w-20 h-20 rounded-full bg-red-200" >
                            <span class="text-3xl text-red-500"><i class="fa fa-times"></i></span>
                        </div>
                        <p class="my-4 text-sm text-blue-800 font-bold ">
                            {{ mensajeModal }}
                        </p>
                        <button id="closeButton" type="button" @click="handleCloseClick" class="w-full inline-flex justify-center rounded-md bg-blue-800 px-4 py-2 text-white font-medium text-gray-700 hover:bg-blue-900 focus:outline-none ">
                            Cerrar
                        </button>
                    </div>

                </div>
            </div>
        </div>
        <div class="flex py-8 bg-blue-400 text-center justify-center">
            <a href="javascript:void(0)" class="font-bold text-white text-2xl"> <i class="fa-solid fa-circle text-blue-800"></i> <span class="text-blue-800">N</span>test
            </a>
        </div>
    </footer>
</template>

<script>
    import SimpleModal from '@/Components/SimpleModal.vue';

    export default {
        data() {
            return {
                usuario: {
                    nombre: '',
                    fecha_nacimiento: this.toDay(),
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
                },
                collapseMenu: false,
                tituloModal: '' ,
                mensajeModal: '',
                showComponent: false,
            };
        },
        components: {
            SimpleModal,
        },
        methods: {
            toggleCollapseMenu() {
                this.collapseMenu = !this.collapseMenu;
            },
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
                const formData = new FormData();


                // Append usuario data to FormData (including nested JSON)
                Object.entries(this.usuario).forEach(([key, value]) => {
                    if (key === 'experiencias' || key === 'idiomas') {
                        formData.append(key, JSON.stringify(value)); // Convert arrays to JSON
                    } else {
                        formData.append(key, value);
                    }
                });

                // Append file if selected
                const file = this.$refs.fileInput.files[0];
                if (file) {
                    formData.append('archivo', file);
                }

                // Send the form data to the Laravel API
                axios.post('/api/usuarios', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(response => {
                    console.log('Usuario creado:', response.data);
                    this.tituloModal =  'ok'
                    this.mensajeModal  = 'Tu postulación fue enviada con éxito'
                    this.showComponent = true;
                    // Handle successful response (e.g., clear form, show success message)
                })
                .catch(error => {
                    console.error('Error al crear usuario:', error);
                    this.tituloModal =  'Error'
                    this.mensajeModal  = 'Tu postulación fue enviada con éxito'
                    this.showComponent = true;
                    // Handle error response (e.g., show error message)
                });
            },

            toDay(){
                return new Date().toISOString().slice(0, 10)
            },
            openFileInput() {
                this.$refs.fileInput.click();
            },
            handleFileUpload(event) {
                const file = event.target.files[0];

                // Validate file size (optional)
                if (file.size > 10 * 1024 * 1024) {
                    alert("Archivo demasiado grande. Máximo 10mb");
                    return;
                }

                // Validate file type (optional)
                const allowedExtensions = [".pdf", ".docx", ".doc"];
                const extension = file.name.split(".").pop().toLowerCase();

                console.log(extension)
                console.log(file.name)

                if (!allowedExtensions.includes('.'+extension)) {
                    alert("Formato de archivo no válido. Solo PDF y Word");
                    return;
                }

                // Handle file upload (replace with your logic)
                console.log("File selected:", file);
                // You can use FormData or other methods to upload the file to your server.
            },
            handleCloseClick() {
                this.showComponent = false;
            },
        },
    };

</script>
