<template>
    <nav>
        <Link
            :href="route('customer.products.index')"
        >
            Prodotti
        </Link>
    </nav>
</template>
<script setup>
    import {Link} from '@inertiajs/vue3'
</script>
