<template>
    <div
        @click.prevent="redirect"
        class="text-black"
    >
        ritorna alla home
    </div>

</template>
<script setup>
    const redirect = () => {
        window.location.href = route('general.home')
    }
</script>
