import Vue from 'vue';

export default {
    namespaced: true,
    state()
    {
        return {}
    },
    actions: {
        fetch(data)
        {
            return Vue.auth.fetch(data)
        },
        refresh(data)
        {
            return Vue.auth.refresh(data)
        },
        login(ctx, data)
        {
            data = data || {};

            return new Promise((resolve, reject) => {
                Vue.auth.login({
                    url: '/api/auth/login',
                    data: data
                }).then(res => {
                    Vue.router.push({
                        name: 'dashboard'
                    })

                    resolve(res)
                }, reject)
            })
        },
        register(ctx, data)
        {
            return new Promise((resolve, reject) => {
                Vue.auth.register({
                    url: '/api/auth/register',
                    data: data
                }).then(res => {
                    Vue.router.push({
                        name: 'login'
                    })

                    resolve(res)
                }, reject);
            })
        },
        logout(){
            Vue.auth.logout();
        }
    }
}
