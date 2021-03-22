<template>
    <div>
        <label :for="label" class="block text-sm font-medium text-gray-700">
            {{ label }}
        </label>
        <input :type="type" :id="label" @input="$emit('input', $event.target.value)" class="my-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md px-2 py-4" />
    </div>
</template>

<script>
export default {
    name: "BaseInput",
    props: {
        type: {
            type: String,
            default: 'text'
        },
        label: '',
        value: ''
    }
}
</script>

<style scoped>

</style>
