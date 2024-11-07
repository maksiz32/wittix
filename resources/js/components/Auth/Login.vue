<template>
    <div class="container py-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong">
                    <div class="card-body p-5">

            <h2>Login</h2>
            <form @submit.prevent="login">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input v-model="username" id="username" type="text" class="form-control" required />
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input v-model="password" id="password" type="password" class="form-control" required />
                </div>
                <button type="submit" class="btn btn-primary mt-1">Login</button>
            </form>
            <p v-if="error" class="text-danger">{{ error }}</p>
        </div>
    </div>
        </div>
    </div>
    </div>
</template>

<script>

export default {
    data() {
        return {
            username: '',
            password: '',
            error: ''
        };
    },
    methods: {
        async login() {
            await this.$axios.post('/login', {
                username: this.username,
                password: this.password
            }, {withCredentials: true})
                .then(response => {
                    console.log(response.data);
                    localStorage.setItem('token', response.data.token);
                    this.$router.push('/users');
                })
                .catch(() => this.error = 'Invalid credentials');
        }
    }
};
</script>
