<template>
    <div v-show="errors">
        <template v-for="error in errors">
            <p class="text-sm text-red-600">
                {{ error }}
            </p>
        </template>
    </div>
</template>

<script>
    export default {
        name: "BaseError",
        props: [
            'errors'
        ]
    }
</script>

<style scoped>

</style>
