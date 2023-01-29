<template>
    <div>
        <router-link :to="{ name: 'Home' }">Home</router-link> |
        <router-link :to="{ name: 'Users' }">Users</router-link>
    </div>

    <p>
        <button @click="$router.go(-1)">Go back 1 step</button>
        <button @click="$router.go(1)" >Go forward 1 step</button>

        <button @click="$router.push('/user/1')">Redirect to "/user/1"</button>
    </p>

    <router-view/>
</template>
