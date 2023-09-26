<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { useForm } from "@inertiajs/vue3";

const form = useForm({
    name: null,
    email: null,
    password: null,
});

const save = () => {
    form.post(route("user.store"));
};
</script>

<template>
    <AuthenticatedLayout>
        <Head title="Add Employee" />
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Add User
            </h2>
        </template>
        <div class="max-w-7xl mx-auto pt-8 px-5">
            <form class="w-full bg-white p-4" @submit.prevent="save">
                <Link
                    :href="route('employee.index')"
                    class="flex items-center font-medium text-blue-600 dark:text-blue-500 hover:underline"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        class="w-6 h-6 mr-2 cursor-pointer"
                        @click="$inertia.visit(route('user.index'))"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"
                        />
                    </svg>
                </Link>
                <div>
                    <div class="mb-6">
                        <label
                            for="name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mt-2"
                            >Name</label
                        >
                        <input
                            type="text"
                            id="name"
                            v-model="form.name"
                            :class="{
                                'border-red-500': form.errors.name,
                            }"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder=""
                        />
                        <span
                            v-if="form.errors.name"
                            class="text-red-500 text-xs"
                            >{{ form.errors.name }}</span
                        >
                    </div>

                    <div class="mb-6">
                        <label
                            for="email"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mt-2"
                        >
                            Email
                        </label>
                        <input
                            type="text"
                            id="email"
                            v-model="form.email"
                            :class="{
                                'border-red-500': form.errors.email,
                            }"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder=""
                        />
                        <span
                            v-if="form.errors.email"
                            class="text-red-500 text-xs"
                            >{{ form.errors.email }}</span
                        >
                    </div>

                    <div class="mb-6">
                        <label
                            for="password"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mt-2"
                        >
                            Password
                        </label>
                        <input
                            type="password"
                            id="password"
                            v-model="form.password"
                            :class="{
                                'border-red-500': form.errors.password,
                            }"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder=""
                        />
                        <span
                            v-if="form.errors.password"
                            class="text-red-500 text-xs"
                            >{{ form.errors.password }}</span
                        >
                    </div>
                </div>
                <div class="flex justify-end">
                    <button
                        type="submit"
                        class="bg-gray-500 px-2 py-2 text-white rounded-lg hover:bg-gray-900 float-right"
                    >
                        Add
                    </button>
                </div>
            </form>
        </div>
    </AuthenticatedLayout>
</template>
