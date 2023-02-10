<script setup>
    import { reactive } from "vue";
    import useProducts from "../../composables/products";
    import { onMounted } from "vue";
    import { useAuthStore } from "../../stores/auth";

    const authStore = useAuthStore();

    const { product, getProduct, updateProduct, errors} = useProducts();

    const props = defineProps({
        id: {
            required: true,
            type: String
        }
    })
    onMounted(() => {
        authStore.getUser();
        getProduct(props.id)
    });

    const convert = (product) => {
        const seconds = ":00";
        let date_and_time = product.date_and_time;
        date_and_time = date_and_time.replace('T', ' ').concat(seconds);
        // date_and_time = date_and_time.concat(seconds);
        product.date_and_time = date_and_time;
        console.log(product);
        // console.log(form.date_and_time)
        updateProduct(product.id);
    }
</script>
<template>
    <div v-if="authStore.user" class="p-4 sm:ml-64">
        <div class="p-4 mt-14">
            <div class="w-full max-w-sm p-4 sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
                <form @submit.prevent="convert(product)" class="space-y-6">
                    <h5 class="text-xl font-medium text-gray-900 dark:text-white">Edit Product</h5>
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Name
                        </label>
                        <input type="name" 
                            v-model="product.name"
                            name="name" 
                            id="name" 
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" 
                        />
                        <span v-if="errors.name" class="error">{{errors.name[0]}}</span>
                    </div>
                    <div>
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Select a Category
                        </label>
                        <select name="category"
                            id="category" 
                            v-model="product.category"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            >
                            <option selected>Choose a category</option>
                            <option value="Socks">Socks</option>
                            <option value="Cardigan">Cardigan</option>
                            <option value="Coat">Coat</option>
                            <option value="Pants">Pants</option>
                        </select>
                        <span v-if="errors.category" class="error">{{errors.category[0]}}</span>
                    </div>
                    <div>
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Description 
                        </label>
                        <textarea name="description"
                            id="description" 
                            v-model="product.description"
                            rows="4" 
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            >
                        </textarea>

                        <span v-if="errors.description" class="error">{{errors.description[0]}}</span>
                    </div>

                    <div>
                        <div class="relative max-w-sm">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                        </div>
                        <input datepicker type="datetime-local" 
                            id="date_and_time"
                            v-model="product.date_and_time"
                            name="date_and_time"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                        >
                            <span v-if="errors.date_and_time" class="error">{{errors.date_and_time[0]}}</span>
                        </div>
                    </div>
                    <button type="submit" class="w-full text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <div v-else class="p-4 sm:ml-64">
        <div class="p-4 mt-14">
            <h1>You are not logged in! Please log in</h1>
        </div>
    </div>
</template>