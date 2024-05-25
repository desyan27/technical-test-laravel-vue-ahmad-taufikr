<template>
    <div>
        <aside id="default-sidebar"
            class="fixed top-15 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
            aria-label="Sidebar">
            <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50">
                <ul class="space-y-2 font-medium">
                    <li>
                        <Link :href="route('user')"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                viewBox="0 0 20 18">
                                <path
                                    d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap">Users</span>
                        </Link>
                    </li>
                    <li>
                        <Link :href="route('products')"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 18 20">
                                <path
                                    d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z" />
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap">Products</span>
                        </Link>
                    </li>
                    <li>
                        <Link :href="route('categories')"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M3 6C3 4.34315 4.34315 3 6 3H7C8.65685 3 10 4.34315 10 6V7C10 8.65685 8.65685 10 7 10H6C4.34315 10 3 8.65685 3 7V6Z"
                                    stroke="#000000" stroke-width="2" />
                                <path
                                    d="M14 6C14 4.34315 15.3431 3 17 3H18C19.6569 3 21 4.34315 21 6V7C21 8.65685 19.6569 10 18 10H17C15.3431 10 14 8.65685 14 7V6Z"
                                    stroke="#000000" stroke-width="2" />
                                <path
                                    d="M14 17C14 15.3431 15.3431 14 17 14H18C19.6569 14 21 15.3431 21 17V18C21 19.6569 19.6569 21 18 21H17C15.3431 21 14 19.6569 14 18V17Z"
                                    stroke="#000000" stroke-width="2" />
                                <path
                                    d="M3 17C3 15.3431 4.34315 14 6 14H7C8.65685 14 10 15.3431 10 17V18C10 19.6569 8.65685 21 7 21H6C4.34315 21 3 19.6569 3 18V17Z"
                                    stroke="#000000" stroke-width="2" />
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap">Categories</span>
                        </Link>
                    </li>
                    <li>
                        <Link :href="route('orders')" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                viewBox="0 0 128 128" xml:space="preserve">
                                <g>
                                    <polygon points="22,31.6 22,35.3 115.9,35.3 115.9,82.7 119.5,82.7 119.5,31.6 	" />
                                    <polygon points="15.3,42 109.2,42 109.2,89.4 112.8,89.4 112.8,38.4 15.3,38.4 	" />
                                    <path d="M23.9,45.4H8.5v15.4V81v15.4h15.4h66.7H106V81V60.8V45.4H90.6H23.9z M102,60.2v21.2c-5.3,1.4-9.4,5.6-10.9,11H23.3
		                            c-1.4-5.4-5.6-9.5-10.9-11V60.2c5.3-1.4,9.4-5.6,10.9-11h67.8C92.4,54.6,96.6,58.8,102,60.2z" />
                                    <circle cx="57.2" cy="70.9" r="18" />
                                </g>
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap">Orders</span>
                        </Link>
                    </li>
                </ul>
            </div>
        </aside>
    </div>
</template>
<script>
import { Link } from '@inertiajs/vue3';


export default {
    name: 'Sidebar',
    components: {
        Link
    }
}
</script>
