<template>
    <div class="max-w-7xl mx-auto">
        <Header
            :sitename="sitename"
            :user="user"
        />
        <main class="container mx-auto p-4 w-full">
            <slot></slot>
        </main>
    </div>
</template>
<script setup>
    import Header from './Header.vue'
    import {computed} from 'vue'
    import {usePage} from '@inertiajs/vue3'
    const page = usePage()
    const user = computed(
        () => page.props.user
    )
    const sitename = computed(
        () => page.props.sitename
    )

</script>
