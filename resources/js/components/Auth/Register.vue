<template>
    <div class="container py-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong">
                    <div class="card-body p-5">
                        <h2>Registration Form</h2>
                        <form @submit.prevent="register">
                            <div class="form-group">
                                <label for="first_name">First name</label>
                                <input v-model="first_name" id="first_name" type="text" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last name</label>
                                <input v-model="last_name" id="last_name" type="text" class="form-control" required />
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
            password: '',
            first_name: '',
            last_name: '',
            error: '',
        };
    },
    methods: {
        register() {
            this.$axios.post('/register', {
                first_name: this.first_name,
                last_name: this.last_name,
                password: this.password
            }, { withCredentials: true })
                .then(response => {
                    localStorage.setItem('token', response.data.token);
                    this.$router.push('/users');
                })
                .catch(() => this.error = 'Invalid credentials');
        }
    }
};
</script>
