<template>
    <div>
        <base-layout>
            <div class="grid grid-cols-12">
                <div class="col-span-12 xl:col-start-4 xl:col-end-10">
                    <div class="p-8">
                        <form @submit.prevent="register">
                            <div class="grid grid-cols-12 gap-y-8 xl:gap-x-8">
                                <div class="col-span-12">
                                    <base-input label="Name" v-model="form.name" />

                                    <base-error :errors="errors['name']" />
                                </div>
                                <div class="col-span-12">
                                    <base-input type="email" label="Email" v-model="form.email" />
                                    <base-error :errors="errors['email']" />
                                </div>
                                <div class="col-span-12">
                                    <base-input type="password" label="Password" v-model="form.password" />
                                    <base-error :errors="errors['password']" />
                                </div>
                                <div class="col-span-12">
                                    <base-input type="password" label="Confirm Password" v-model="form.password_confirmation" />
                                    <base-error :errors="errors['confirm_password']" />
                                </div>
                                <div class="col-start-7 col-end-13">
                                    <base-button buttonType="submit">
                                        Register
                                    </base-button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </base-layout>
    </div>
</template>

<script>
    import BaseLayout from "../../layouts/BaseLayout";
    import BaseInput from '../../components/BaseInput'
    import BaseButton from '../../components/BaseButton'
    import BaseError from "../../components/BaseError";

    export default {
        name: "Register",
        components: {
            BaseLayout,
            BaseInput,
            BaseButton,
            BaseError
        },
        data()
        {
            return {
                form: {
                    name: '',
                    email: '',
                    password: '',
                    password_confirmation: ''
                },
                success: null,
                errors: {}
            }
        },
        methods: {
            register()
            {
                this.$store.dispatch('auth/register', {
                    ...this.form
                })
                .then()
                .catch(error => this.errors = error.response.data.errors);
            }
        }
    }
</script>

<style scoped>

</style>
