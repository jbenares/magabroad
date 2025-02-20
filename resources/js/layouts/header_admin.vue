<template>
    <div class="flex-1">
        <header class="flex justify-end items-center space-x-2 px-6 py-3 bg-white border-b sticky top-0 z-30  h-20">
            <!-- <h2 class="text-2xl font-bold">Dashboard</h2> -->
            <input type="text" placeholder="Search here..." class="px-4 py-1 border rounded-md">
            <nav class="">
                <ul class="flex space-x-4 m-0 pt-1">
                    <li class="relative" ref="dropdownRef">
                        <!-- Dropdown toggle button -->
                        <button  @click="toggleSubmenu('services')" class="text-gray-700 hover:text-blue-500 " >
                            <span class="flex items-center space-x-2">
                                <!-- Admin Thumbnail -->
                                <img
                                src="../../images/person_4.jpg"
                                alt="Admin Thumbnail"
                                class="w-6 h-6 rounded-full"
                                />
                                <!-- Admin's Name -->
                                <span>{{ credentials.firstname }}</span>
                                <!-- Chevron Icon -->
                                <ChevronDownIcon class="size-4" />
                            </span>
                        </button>

                        <!-- Dropdown menu -->
                        <ul  v-show="submenuOpen.services" class="absolute bg-white border rounded-md shadow-lg mt-2 w-40 right-0 py-2" >
                            <li>
                                <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Settings</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100" @click="logout">Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </header>
        <slot/>
    </div>
</template>

<script setup>
    import { WrenchIcon, ChevronDownIcon } from '@heroicons/vue/24/solid';
    import { reactive, ref, onMounted, onBeforeUnmount } from 'vue';
    import { useRouter } from "vue-router"
    const router = useRouter();

    let credentials=ref([])

    onMounted(async () => {
		getDashboard()
	})

    // Reactive object to manage submenu state
    const submenuOpen = reactive({
    services: false,
    });

    // Reference to the dropdown element
    const dropdownRef = ref(null);

    // Function to toggle a submenu
    const toggleSubmenu = (menu) => {
    submenuOpen[menu] = !submenuOpen[menu];
    };

    // Function to close all submenus
    const closeAllSubmenus = () => {
    Object.keys(submenuOpen).forEach((key) => {
        submenuOpen[key] = false;
    });
    };

    // Function to handle clicks outside the dropdown
    const handleClickOutside = (event) => {
    if (dropdownRef.value && !dropdownRef.value.contains(event.target)) {
        closeAllSubmenus();
    }
    };

    // Add and remove event listeners for outside clicks
    onMounted(() => {
    document.addEventListener('click', handleClickOutside);
    });
    onBeforeUnmount(() => {
    document.removeEventListener('click', handleClickOutside);
    });

    const getDashboard = async () => {
		const response = await fetch(`/api/dashboard`);
		credentials.value = await response.json();
		// if(!credentials.value.firstname){
		// 	alert('You have been logged out due to inactivity.')
        //     localStorage.removeItem('token')
		// 	router.push('/admin')
		// }
	}

    const logout = () => {
        localStorage.removeItem('token')
        router.push('/admin')
    }
</script>