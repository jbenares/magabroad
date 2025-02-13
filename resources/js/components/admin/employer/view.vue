<template>
    <navigation>
        <header_admin>
            <div class="rounded bg-white p-3">
                <div class="pb-3 flex justify-between items-center">
                    <h3 class="text-gray-600 font-semibold mb-0">Employer Information</h3>
                    <div class="flex " aria-label="Breadcrumb">
                        <ol class="flex items-center space-x-2 text-sm mb-0 mt-1">
                            
                            <li>
                                <a href="/admin/dashboard" class="text-blue-600 hover:underline">Dashboard</a>
                                <span class="text-gray-400 ml-2">/</span>
                            </li>
                            <li>
                                <a href="/admin/employer_list" class="text-blue-600 hover:underline">List</a>
                                <span class="text-gray-400 ml-2">/</span>
                            </li>
                            <li class="text-gray-600">Employer Information</li>
                        </ol>
                    </div>
                </div>
                
                <div class="shadow-sm">
                    <div class="">
                        <div class="bg-blue-400 pt-3 rounded-t-md"></div>
                        <div class="container-fluid">
                            <div class="row py-3">
                                <!-- <div class="col-lg-3 border-r border-gray-50">
                                    <div class="flex flex-col items-center">
                                        <img src="../../../../images/company-2.jpg" alt="Profile" class="w-56 h-56 rounded-full shadow-sm mb-4 mt-4" />
                                    </div>
                                </div> -->
                                <div class="col-lg-12">
                                    <div class="p-3">
                                        <div class="row mb-4">
                                            <div class="col-lg-4">
                                                <div class="flex flex-col space-y-1 bg-gray-50 rounded-xl p-3 md:mb-3">
                                                    <label for="first-name" class="text-gray-500 text-sm font-medium leading-none mb-0">First Name</label>
                                                    <p class="border-0 rounded-lg p-0 leading-none bg-transparent text-gray-800 font-semibold ">Maria</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="flex flex-col space-y-1 bg-gray-50 rounded-xl p-3 md:mb-3">
                                                    <label for="first-name" class="text-gray-500 text-sm font-medium leading-none mb-0">Middle Name</label>
                                                    <p class="border-0 rounded-lg p-0 leading-none bg-transparent text-gray-800 font-semibold ">Fernandez</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="flex flex-col space-y-1 bg-gray-50 rounded-xl p-3 md:mb-3">
                                                    <label for="first-name" class="text-gray-500 text-sm font-medium leading-none mb-0">Last Name</label>
                                                    <p class="border-0 rounded-lg p-0 leading-none bg-transparent text-gray-800 font-semibold ">Pillar</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-lg-6">
                                                <div class="flex flex-col space-y-1 bg-gray-50 rounded-xl p-3 md:mb-3">
                                                    <label for="first-name" class="text-gray-500 text-sm font-medium leading-none mb-0">Country</label>
                                                    <p class="border-0 rounded-lg p-0 leading-none bg-transparent text-gray-800 font-semibold ">Japan</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="flex flex-col space-y-1 bg-gray-50 rounded-xl p-3 md:mb-3">
                                                    <label for="first-name" class="text-gray-500 text-sm font-medium leading-none mb-0">Business Name</label>
                                                    <p class="border-0 rounded-lg p-0 leading-none bg-transparent text-gray-800 font-semibold ">Work Global Inc.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-lg-6">
                                                <div class="flex flex-col space-y-1 bg-gray-50 rounded-xl p-3 md:mb-3">
                                                    <label for="first-name" class="text-gray-500 text-sm font-medium leading-none mb-0">Country</label>
                                                    <p class="border-0 rounded-lg p-0 leading-none bg-transparent text-gray-800 font-semibold ">Japan</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="flex flex-col space-y-1 bg-gray-50 rounded-xl p-3 md:mb-3">
                                                    <label for="first-name" class="text-gray-500 text-sm font-medium leading-none mb-0">Business Name</label>
                                                    <p class="border-0 rounded-lg p-0 leading-none bg-transparent text-gray-800 font-semibold ">Work Global Inc.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="border-gray-100">
                                        <div class="flex justify-center space-x-2">
                                            <button class="p-2 px-5 rounded text-center bg-blue-500 hover:bg-blue-600 text-white "> Approve </button>
                                            <button class="p-2 px-5 rounded text-center bg-red-500 hover:bg-red-600 text-white " @click="rejectModal = true"> Reject </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header_admin>
    </navigation>
    <transition name="modal-fade">
        <div v-show="rejectModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50">
            <!-- Modal content -->
            <div ref="modalContent" class="bg-white rounded-lg py-4 px-4 w-1/3 shadow-lg relative">
                <!-- Close button -->
                <button @click="rejectModal = false" class="absolute top-5 right-7 text-gray-500 hover:text-gray-800">✖</button>
                <h2 class="text-xl font-bold mb-4">Why are you rejecting this employer?</h2>
                <!-- <hr class="my-3"> -->
                <div class="form-group">
                    <textarea class="form-control" id="" placeholder="Please provide your reasons here" rows="2"></textarea>
                </div>
                <hr class="my-3 border-gray-100">
                <!-- Modal actions -->
                <div class="flex justify-end">
                <button @click="rejectModal = false" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                    Reject
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
    import { FunnelIcon, MagnifyingGlassIcon, PlusIcon, Bars3Icon, EyeIcon } from '@heroicons/vue/24/solid'

    // Reactive state to manage modal visibility
    const rejectModal = ref(false);

    // Reference to the modal content
    const modalContent = ref(null);

    // Close the modal when clicking outside the content
    const handleClickOutside = (event) => {
    if (modalContent.value && !modalContent.value.contains(event.target)) {
        rejectModal.value = false;
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
