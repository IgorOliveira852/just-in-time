<template>
    <div class="grid grid-cols-3 gap-4">
        <div v-for="service in services" :key="service.id" class="p-4 border rounded-lg">
            <img :src="service.icon" alt="" class="mb-2"/>
            <h2 class="text-xl mb-2">{{ service.title }}</h2>
            <p>{{ service.description }}</p>
        </div>
    </div>
</template>

<script>
export default {
    name: "Services"
}
</script>

<style scoped>

</style>