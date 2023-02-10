<script setup>
import { onMounted } from "vue"
import { useAuthStore } from "../stores/auth";

const authStore = useAuthStore();

onMounted(async () => {
  await authStore.getUser();
})
</script>
<template>
    <div v-if="authStore.user" class="p-4 sm:ml-64">
      <div class="p-4 mt-14">
        <div class="my-3">
            <h1>Hello {{ authStore.user.name }}!</h1>
        </div>
        <div class="grid grid-cols-4 gap-4 mb-4">
            <div class="items-center justify-center rounded bg-blue-50 dark:bg-gray-800 p-4 border-2 border-gray-200 dark:border-gray-700 ">
                <span class="text-2xl text-black-400 dark:text-gray-500">
                65
                </span>
                <p class="text-2xl text-black-400 dark:text-gray-500">
                New Orders
               </p>
               <a href="#" class="inline-flex items-center pt-3 text-sm font-medium text-center text-blue ">
                    More Info
                    <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </a>
            </div>
            <div class="items-center justify-center rounded bg-green-50 dark:bg-gray-800 p-4 border-2 border-gray-200 dark:border-gray-700 ">
                <span class="text-2xl text-black-400 dark:text-gray-500">
                65%
                </span>
                <p class="text-2xl text-black-400 dark:text-gray-500">
                Bounce Rate
               </p>
               <a href="#" class="inline-flex items-center pt-3 text-sm font-medium text-center text-blue ">
                    More Info
                    <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </a>
            </div>
            <div class="items-center justify-center rounded bg-yellow-50 dark:bg-gray-800 p-4 border-2 border-gray-200 dark:border-gray-700 ">
                <span class="text-2xl text-black-400 dark:text-gray-500">
                65
                </span>
                <p class="text-2xl text-black-400 dark:text-gray-500">
                User Registrations
               </p>
               <a href="#" class="inline-flex items-center pt-3 text-sm font-medium text-center text-blue ">
                    More Info
                    <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </a>
            </div>
            <div class="items-center justify-center rounded bg-red-50 dark:bg-gray-800 p-4 border-2 border-gray-200 dark:border-gray-700 ">
                <span class="text-2xl text-black-400 dark:text-gray-500">
                65
                </span>
                <p class="text-2xl text-black-400 dark:text-gray-500">
                Unique Visitors
               </p>
               <a href="#" class="inline-flex items-center pt-3 text-sm font-medium text-center text-blue ">
                    More Info
                    <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </a>
            </div>
         </div>
      </div>
   </div>

   <div v-else class="p-4 sm:ml-64">
        <div class="p-4 mt-14">
            <h1>You are not logged in! Please log in</h1>
        </div>
    </div>
</template>


