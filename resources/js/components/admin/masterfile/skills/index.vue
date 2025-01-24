<template>
    <navigation>
        <header_admin>
            <div class="rounded bg-white p-3">
                <div class="pb-3 flex justify-between items-center">
                    <h3 class="text-gray-600 font-semibold mb-0">Skills</h3>
                    <div class="flex justify-between">
                        <div class="flex">
                            <button class="border border-gray-400 rounded text-gray-600 py-1 px-2 flex justify-center mr-2 w-32 hover:bg-blue-500 hover:text-white hover:border-0"  @click="addModal = true">
                                <span class="flex items-center"><PlusIcon class="size-4 mr-1"/> Add New </span>
                            </button>
                        </div>
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
                                    <th class="font-semibold text-sm p-2 px-3">Skill Name</th>
                                    <th class="font-semibold text-sm p-2 px-3 " width="5%">
                                        <div class="flex justify-center">
                                            <Bars3Icon class="size-4"/>
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-gray-100 border-b hover:bg-gray-50" >
                                    <td class="text-sm font-medium  p-2 px-3 ">Sample 1 Skill</td>
                                    <td class="p-0" align="center">
                                        <div class="w-full flex justify-center">
                                            <button class="border-transparent rounded py-1 text-gray-500 px-1 flex items-center hover:bg-orange-500 hover:text-white" @click="updateModal = true">
                                                <PencilSquareIcon class="size-4"/>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-gray-100 border-b hover:bg-gray-50" >
                                    <td class="text-sm font-medium  p-2 px-3 ">Sample 1 Skill</td>
                                    <td class="p-0" align="center">
                                        <div class="w-full flex justify-center">
                                            <button class="border-transparent rounded py-1 text-gray-500 px-1 flex items-center hover:bg-orange-500 hover:text-white" @click="updateModal = true">
                                                <PencilSquareIcon class="size-4"/>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-gray-100 border-b hover:bg-gray-50" >
                                    <td class="text-sm font-medium  p-2 px-3 ">Sample 1 Skill</td>
                                    <td class="p-0" align="center">
                                        <div class="w-full flex justify-center">
                                            <button class="border-transparent rounded py-1 text-gray-500 px-1 flex items-center hover:bg-orange-500 hover:text-white" @click="updateModal = true">
                                                <PencilSquareIcon class="size-4"/>
                                            </button>
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
    <transition name="modal-fade">
        <div v-show="addModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50">
            <!-- Modal content -->
            <div ref="modalContent" class="bg-white rounded-lg py-4 px-4 w-1/3 shadow-lg relative">
                <!-- Close button -->
                <button @click="addModal = false" class="absolute top-5 right-7 text-gray-500 hover:text-gray-800">✖</button>
                <h2 class="text-xl font-bold mb-4">Add Skill</h2>
                <div class="form-group">
                    <input type="text" name="" class="form-control" id="" placeholder="Skill Name">
                </div>
                <hr class="my-3 border-gray-100">
                <!-- Modal actions -->
                <div class="flex justify-end">
                <button @click="addModal = false" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                    Save
                </button>
                </div>
            </div>
        </div>
    </transition>
    <transition name="modal-fade">
        <div v-show="updateModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50">
            <!-- Modal content -->
            <div ref="modalContent" class="bg-white rounded-lg py-4 px-4 w-1/3 shadow-lg relative">
                <!-- Close button -->
                <button @click="updateModal = false" class="absolute top-5 right-7 text-gray-500 hover:text-gray-800">✖</button>
                <h2 class="text-xl font-bold mb-4">Update Skill</h2>
                <div class="form-group">
                    <input type="text" name="" class="form-control" id="" placeholder="Skill Name">
                </div>
                <hr class="my-3 border-gray-100">
                <!-- Modal actions -->
                <div class="flex justify-end">
                <button @click="updateModal = false" class="bg-orange-500 text-white px-3 py-1 rounded hover:bg-orange-600">
                    Update
                </button>
                </div>
            </div>
        </div>
    </transition>
</template>
<script setup>
	import navigation from '@/layouts/navigation_admin.vue';
	import header_admin from '@/layouts/header_admin.vue';
    import { ref, onMounted, onBeforeUnmount } from 'vue';
    import { FunnelIcon, MagnifyingGlassIcon, PlusIcon, Bars3Icon, PencilSquareIcon } from '@heroicons/vue/24/solid'

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
