<template>
    <div class="relative bg-white">
        <header>
            <div class="max-w-7xl mx-auto px-4 sm:px-6">
                <div class="flex justify-between items-center border-b-2 border-gray-100 py-6 md:justify-start md:space-x-10">
                    <div class="flex justify-start lg:w-0 lg:flex-1">
                        <a href="#">
                            <span class="sr-only">Workflow</span>
                            <img class="h-8 w-auto sm:h-10" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="">
                        </a>
                    </div>
                    <div class="-mr-2 -my-2 md:hidden">
                        <button
                            type="button"
                            class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
                            aria-expanded="false"
                            @click="menuOpen = true"
                        >
                            <span class="sr-only">Open menu</span>
                            <!-- Heroicon name: outline/menu -->
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                    </div>
                    <nav class="hidden md:flex space-x-10">
                        <div class="relative">

                        </div>
                    </nav>
                    <div class="hidden md:flex items-center justify-end md:flex-1 lg:w-0">
                        <router-link :to="{name: 'login'}" class="whitespace-nowrap text-base font-medium text-gray-500 hover:text-gray-900">
                            Sign in
                        </router-link>
                        <router-link :to="{name: 'register'}" class="ml-8 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                            Sign up
                        </router-link>
                    </div>
                </div>
            </div>

            <transition
                enter-class="opacity-0 scale-0 duration-200 ease-out"
                enter-to-class="opacity-100 scale-100"
                leave-class="duration-100 ease-in"
                leave-to-class="opacity-0 scale-95"
            >
                <div
                    v-show="menuOpen"
                    class="absolute top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden"
                >
                    <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 bg-white divide-y-2 divide-gray-50">
                        <div class="pt-5 pb-6 px-5">
                            <div class="flex items-center justify-between">
                                <div>
                                    <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="Workflow">
                                </div>
                                <div class="-mr-2">
                                    <button
                                        type="button"
                                        class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
                                        @click="menuOpen = false"
                                    >
                                        <span class="sr-only">Close menu</span>
                                        <!-- Heroicon name: outline/x -->
                                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="py-6 px-5 space-y-6">
                            <div>
                                <template v-if="$auth.user()">
                                    <button @click="logout" class="w-full flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                                        Logout
                                    </button>
                                </template>
                                <template v-else>
                                    <router-link :to="{ name: 'login' }" class="w-full flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                                        Sign up
                                    </router-link>
                                    <p class="mt-6 text-center text-base font-medium text-gray-500">
                                        Existing customer?
                                        <router-link :to="{ name: 'register' }" class="text-indigo-600 hover:text-indigo-500">
                                            Sign in
                                        </router-link>
                                    </p>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>
            </transition>
        </header>

        <main>
            <slot />
        </main>

        <footer>

        </footer>
    </div>
</template>

<script>
    export default {
        name: "BaseLayout",
        data()
        {
            return {
                menuOpen: false
            }
        },
        methods: {
            logout()
            {
                this.$store.dispatch('auth/logout')
                .then()
                .catch();
            }
        }
    }
</script>

<style scoped>

</style>
