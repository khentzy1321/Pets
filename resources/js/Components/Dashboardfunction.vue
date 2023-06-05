<template>
    <div>
      <div class="flex h-screen">
        <div class="p-8 bg-gray-100 w-max">
          <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
            <!-- Box 1 -->
            <div class="relative p-6 bg-blue-300 rounded-lg shadow-md" style="box-shadow: 2px 2px 5px #222222;">
              <span class="absolute px-2 py-1 text-xs text-white bg-red-400 rounded-full top-3 right-3">{{ petCount }}</span>
              <div class="flex items-center mb-4">
                <i class="mr-2 text-3xl text-gray-200 fas fa-car"></i>
                <h2 class="text-xl font-semibold">Cars</h2>
              </div>
              <p class="text-center">Money may not buy happiness, but I'd rather cry in a Jaguar than on a bus.</p>
              <div class="absolute left-0 right-0 flex justify-center bottom-2">
                <a :href="route('pets.index')" class="flex items-center text-gray-600 underline">
                  See More
                  <i class="ml-1 fas fa-arrow-right"></i>
                </a>
              </div>
            </div>
  
            <!-- Box 2 -->
            <div class="relative p-6 bg-green-300 rounded-lg shadow-md" style="box-shadow: 2px 2px 5px #222222;">
              <span class="absolute px-2 py-1 text-xs text-white bg-red-400 rounded-full top-3 right-3">{{ userCount }}</span>
              <div class="flex items-center mb-4">
                <i class="mr-2 text-3xl text-gray-200 fas fa-users"></i>
                <h2 class="text-xl font-semibold">Users</h2>
              </div>
              <p class="text-center">That's one small step for a man, a giant leap for mankind.</p>
              <div class="absolute left-0 right-0 flex justify-center bottom-2">
                <a :href="route('users')" class="flex items-center text-gray-600 underline">
                  See More
                  <i class="ml-1 fas fa-arrow-right"></i>
                </a>
              </div>
            </div>
  
            <!-- Box 3 -->
            <div class="relative p-6 bg-yellow-300 rounded-lg shadow-md" style="box-shadow: 2px 2px 5px #222222;">
              <span class="absolute px-2 py-1 text-xs text-white bg-red-400 rounded-full top-3 right-3">{{ userCount }}</span>
              <div class="flex items-center mb-4">
                <i class="mr-2 text-3xl text-gray-200 fas fa-user-friends"></i>
                <h2 class="text-xl font-semibold">Visitors</h2>
              </div>
              <p class="text-center">Invest in Their Rest. A comfortable bed is arguably the most important thing you can provide for your guest. .</p>
              <div class="absolute left-0 right-0 flex justify-center bottom-2">
                <a :href="route('users')" class="flex items-center text-gray-600 underline">
                  See More
                  <i class="ml-1 fas fa-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>
  <script>
  import { usePage } from '@inertiajs/vue3';
//   import { a } from '@inertiajs/vue3'
  
  export default {
    setup() {
      const { props } = usePage();
      const petCount = props.petCount;
      const userCount = props.userCount;
  
      // Other component logic
  
      return {
        petCount,
        userCount,
      };
    },
  };
  </script>
  