<template>
    <div class="flex flex-col">
        <label :for="id" class="mt-4 mb-2 font-bold text-blue-900">{{ labelText }}</label>
        <input
            :type="type"
            :id="id"
            :v-model="modelValue"
            :class="[inputClass, 'border border-blue-300 p-3 rounded-lg']"
            :required="required"
            :placeholder="placeholderText"
        >
    </div>
</template>

<script>
    export default {
        props: {
            id: {
                type: String,
                required: '',
            },
            labelText: {
                type: String,
                required: true,
            },
            modelValue: {
                type: String,
                required: true,
            },
            placeholderText: {
                type: String,
                default: '',
            },
            inputClass: {
                type: String,
                default: '',
            },
            type: {
                type: String,
                default: 'text',
            },
            required: {
                type: String,
                default: 'false',
            },
        },
    };
</script>
