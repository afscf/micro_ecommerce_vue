<template>
    <div
        class="border border-gray-500 p-2 rounded-md flex flex-col justify-between"
    >
        <div>
            <h2 class="font-medium text-xl">
                {{product.name}}
            </h2>
            <small>
                {{product.description}}
            </small>
        </div>
        <section class="mt-4 flex items-center justify-end gap-2">
            <div class="text-xl font-medium">
                {{priceFormatted}}
            </div>
        </section>
        <section class="flex items-center justify-end gap-2">
            <div class="flex items-center gap-2">
                <label for="quantity">Quantità</label>
                <input
                    v-model="form.quantity"
                    type="number"
                    id="quantity"
                    class="w-2/4 rounded-md"
                    min="1" max="10"
                >
            </div>
            <div>
                <button
                    @click.prevent="storeOrUpdate"
                    class="btn-normal"
                >
                    Aggiungi
                </button>
            </div>
        </section>
    </div>
</template>
<script setup>
    import {useForm, usePage} from '@inertiajs/vue3'
    import { computed } from 'vue'

    const props = defineProps({
        product: Object
    })
    const page = usePage()
    const cart = computed(
        () => page.props.user.cart
    )
    const priceFormatted = computed(
        () => Number(props.product.price).toLocaleString('it-IT', {
            style: 'currency',
            currency: 'EUR',
            maximumFractionDigits: 2,
        })
    )

    const form = useForm({
        product_id: props.product.id,
        quantity: 1,
    })
    const storeOrUpdate = () => {
        if(!cart.value) {
            console.log("cart non esiste -> store")
            form.post(route('customer.carts.store'))
        } else {
            console.log("cart esiste -> update")
            form.put(route('customer.carts.update', {cart: cart.value.id}))
        }

    }
</script>
