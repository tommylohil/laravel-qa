<template>
    <div class="container">
        <div class="jumbotron text-center">
            <h1 class="display-4">Page not found!</h1>
            <p class="lead">Sorry page you are looking for is not found.</p>
            <hr class="my-4">
            <router-link :to="{ name: 'home' }" class="btn btn-primary btn-lg">Back to homepage</router-link>
        </div>
    </div>
</template>