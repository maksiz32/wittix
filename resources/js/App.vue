<template>
    <div id="app">
        <nav>
            <ul>
                <li><router-link to="/">Home</router-link></li>
                <li><router-link to="/users">Users</router-link></li>
                <li><router-link to="/register">Register</router-link></li>
            </ul>
        </nav>
        <router-view></router-view>
    </div>
</template>

<script>
export default {
    name: 'App'
};
</script>
