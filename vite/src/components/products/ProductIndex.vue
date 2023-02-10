<script setup>
    import useProducts from '../../composables/products';
    import { onMounted } from 'vue';
    import { RouterLink } from 'vue-router';
    import { useAuthStore } from '../../stores/auth';

    const { products, getProducts, destroyProduct } = useProducts();

    const authStore = useAuthStore();
    onMounted(() => {
        authStore.getUser();
        getProducts();
    });

</script>
<template>
    <div v-if="authStore.user" class="p-4 sm:ml-64">
        <div class="p-4 mt-14">
            <div class="flex justify-end m-2 p-2">
                <router-link
                    :to="{ name: 'ProductCreate' }"
                    class="px-4 py-2 bg-gray-700 hover:bg-gray-900 text-white rounded"
                    >Create
                </router-link>
            </div>
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">Name</th>
                            <th scope="col" class="px-6 py-3">Category</th>
                            <th scope="col" class="px-6 py-3">Description</th>
                            <th scope="col" class="px-6 py-3">Date and Time</th>
                            <th scope="col" class="px-6 py-3"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="product in products" :key="product.id" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4">{{ product.name }}</td>
                            <td class="px-6 py-4">{{ product.category }}</td>
                            <td class="px-6 py-4">{{ product.description }}</td>
                            <td class="px-6 py-4">{{ product.date_and_time }}</td>
                            <td class="px-6 py-4">
                                <RouterLink :to="{name: 'ProductEdit', params: {id: product.id}}" 
                                    type="button" class="px-3 py-2 mr-1 text-xs font-medium text-center text-white bg-green-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Edit
                                </RouterLink>
                                <button @click="destroyProduct(product.id)"
                                    type="button" 
                                    class="px-3 py-2 text-xs font-medium text-center text-white bg-red-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div v-else class="p-4 sm:ml-64">
        <div class="p-4 mt-14">
            <h1>You are not logged in! Please log in</h1>
        </div>
    </div>
</template>