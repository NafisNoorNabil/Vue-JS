<template>
  <div>
    <nav>
      <router-link :to="{name:'books'}">Books</router-link>
      <router-link :to="{name:'admin'}">Admin</router-link>
    </nav>
    <router-view/>
  </div>
</template>

<style>
@import "@/assets/App.css";
</style>
