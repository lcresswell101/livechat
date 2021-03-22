<template>
    <div class="flex">
        <button :type="buttonType" class="flex flex-1 justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            <slot />
        </button>
    </div>
</template>

<script>
export default {
    name: "BaseButton",
    props: {
        buttonType: {
            type: String,
            default: 'button'
        },
    }
}
</script>

<style scoped>

</style>
