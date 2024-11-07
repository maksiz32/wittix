<template>
    <div class="container">
        <h2>User List</h2>
        <div class="form-group">
            <input v-model="search" type="text" class="form-control" placeholder="Search by name or username" />
        </div>
        <table class="table">
            <thead>
            <tr>
                <th>Username</th>
                <th>Full Name</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="user in users" :key="user.id">
                <td>{{ user.username }}</td>
                <td>{{ user.first_name }} {{ user.last_name }}</td>
                <td>
                    <button @click="deleteUser(user.id)" class="btn btn-danger">Delete</button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>

export default {
    data() {
        return {
            users: [],
            search: '',
        };
    },
    watch: {
        search(value) {
            this.fetchUsers(value);
        }
    },
    created() {
        this.fetchUsers();
    },
    methods: {
        fetchUsers(search = null) {
            this.$axios.post('/users', { search })
                .then(response => {
                    this.users = response.data;
                })
                .catch(error => {
                    console.error('There was an error fetching the users:', error);
                });
        },
        deleteUser(id) {
            this.$axios.delete(`/users/${id}`);
            this.fetchUsers();
        }
    }
};
</script>
