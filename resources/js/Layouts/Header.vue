<template>
    <header>
        <div class="flex items-center justify-between p-4">
            <div class="flex items-center gap-4">
                <Link
                    :href="route('customer.home')"
                >
                    <div class="text-3xl">
                        {{sitename}}
                    </div>
                </Link>
                <Navbar />
            </div>
            <div>
                {{user.name}}
            </div>
        </div>
    </header>
</template>
<script setup>
    import Navbar from "../UI/Navbar.vue";
    import {Link} from '@inertiajs/vue3'
    defineProps({
        user: Object,
        sitename: String,
    })
</script>
