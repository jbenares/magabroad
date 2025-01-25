<template>
    <navigation>
        <header_admin>
            <div class="rounded bg-white p-3">
                <div class="pb-3 flex justify-between items-center">
                    <h3 class="text-gray-600 font-semibold mb-0">Employer List</h3>
                    <div class="flex justify-between">
                        
                        <div class="flex">
                            <button class="border border-gray-400 text-gray-600 rounded py-1 px-2 mr-2 flex items-center hover:bg-blue-500 hover:text-white">
                                <FunnelIcon class="size-4 mr-1"/> Filter
                            </button>
                            <div class="relative">
                                <input class="border border-gray-400 text-gray-600 rounded py-1 pl-8 pr-2" type="text" placeholder="Search...">
                                <div class="absolute inset-y-0 left-0 pl-2 flex items-center">
                                    <MagnifyingGlassIcon class="size-4 mr-1"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="shadow-sm">
                    <div class="overflow-x-auto rounded-lg">
                        <table class="table-fixed w-auto min-w-full !transition-transform !duration-300">
                            <thead class="bg-blue-400  text-white">
                                <tr>
                                    <th class="font-semibold text-sm p-2 px-3" width="20%">Full Name</th>
                                    <th class="font-semibold text-sm p-2 px-3" width="20%">Business Name</th>
                                    <th class="font-semibold text-sm p-2 px-3" width="20%">Country</th>
                                    <th class="font-semibold text-sm p-2 px-3" width="20%">Email</th>
                                    <th class="font-semibold text-sm p-2 px-3 " width="5%">
                                        <div class="flex justify-center">
                                            <Bars3Icon class="size-4"/>
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-gray-100 border-b hover:bg-gray-50 text-gray-500" >
                                    <td class="text-sm font-medium  p-2 px-3 ">Maria Josephine Braken</td>
                                    <td class="text-sm font-medium  p-2 px-3 ">Mj Design Co.</td>
                                    <td class="text-sm font-medium  p-2 px-3 ">Qatar</td>
                                    <td class="text-sm font-medium  p-2 px-3 ">maria.josephine@gmail.com</td>
                                    <td class="p-0" align="center">
                                        <div class="w-full flex justify-center">
                                            <a href="/admin/employer_view" class="border-transparent rounded py-1 text-gray-500 px-1 flex items-center hover:bg-orange-500 hover:text-white" @click="updateModal = true">
                                                <EyeIcon class="size-4"/>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-gray-100 border-b hover:bg-gray-50 text-gray-500" >
                                    <td class="text-sm font-medium  p-2 px-3 ">Tadasshi Nezoka</td>
                                    <td class="text-sm font-medium  p-2 px-3 ">Ozone Cars</td>
                                    <td class="text-sm font-medium  p-2 px-3 ">Japan</td>
                                    <td class="text-sm font-medium  p-2 px-3 ">tadasshi.ozone@gmail.com</td>
                                    <td class="p-0" align="center">
                                        <div class="w-full flex justify-center">
                                            <a href="/admin/employer_view" class="border-transparent rounded py-1 text-gray-500 px-1 flex items-center hover:bg-orange-500 hover:text-white" @click="updateModal = true">
                                                <EyeIcon class="size-4"/>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-gray-100 border-b hover:bg-gray-50 text-gray-500" >
                                    <td class="text-sm font-medium  p-2 px-3 ">Troy David Sy</td>
                                    <td class="text-sm font-medium  p-2 px-3 ">CENOGEN</td>
                                    <td class="text-sm font-medium  p-2 px-3 ">Canada</td>
                                    <td class="text-sm font-medium  p-2 px-3 ">troy.cenogen@gmail.com</td>
                                    <td class="p-0" align="center">
                                        <div class="w-full flex justify-center">
                                            <a href="/admin/employer_view" class="border-transparent rounded py-1 text-gray-500 px-1 flex items-center hover:bg-orange-500 hover:text-white" @click="updateModal = true">
                                                <EyeIcon class="size-4"/>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="py-3 px-3 flex justify-between items-center">
                        <p class="border border-gray-400 rounded py-1 px-2 mr-1">
                            <span>19 results</span>
                        </p>
                        <div>
                            <button class="border border-gray-400 rounded py-1 px-2 mr-1">Previous</button>
                            <button class="border border-gray-400 rounded py-1 px-2">Next</button>
                        </div>
                    </div>
                </div>
            </div>
        </header_admin>
    </navigation>
</template>
<script setup>
	import navigation from '@/layouts/navigation_admin.vue';
	import header_admin from '@/layouts/header_admin.vue';
    import { ref, onMounted, onBeforeUnmount } from 'vue';
    import { FunnelIcon, MagnifyingGlassIcon, PlusIcon, Bars3Icon, EyeIcon } from '@heroicons/vue/24/solid'

    // Reactive state to manage modal visibility
    const addModal = ref(false);
    const updateModal = ref(false);

    // Reference to the modal content
    const modalContent = ref(null);

    // Close the modal when clicking outside the content
    const handleClickOutside = (event) => {
    if (modalContent.value && !modalContent.value.contains(event.target)) {
        addModal.value = false;
        updateModal.value = false;
    }
    };

    // Add event listener for clicks outside
    onMounted(() => {
    document.addEventListener("mousedown", handleClickOutside);
    });

    // Remove event listener to prevent memory leaks
    onBeforeUnmount(() => {
    document.removeEventListener("mousedown", handleClickOutside);
    });
</script>
