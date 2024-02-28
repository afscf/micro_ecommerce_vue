<template>
    <section class="grid grid-cols-4 gap-4">
        <ProductCard
            v-for="product in products" :key="product.id"
            :product="product"
        />
    </section>

</template>
<script setup>
    import ProductCard from "./Index/Components/ProductCard.vue";
    defineProps({
        products: Array
    })
</script>
