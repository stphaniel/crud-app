<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { useForm } from "@inertiajs/vue3";

const { employee } = defineProps({
    employee: Object,
});

console.log(employee);

const form = useForm({
    employee_number: employee.employee_number,
    first_name: employee.first_name,
    middle_name: employee.middle_name,
    last_name: employee.last_name,
    birth_date: employee.birth_date,
    gender: employee.gender,
    marital_status: employee.marital_status,
});

const save = () => {
    form.put(route("employee.update", employee.id));
};
</script>

<template>
    <AuthenticatedLayout>
        <Head title="Add Employee" />
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Update Employee
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
                        @click="$inertia.visit(route('employee.index'))"
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
                            for="employee_number"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mt-2"
                            >Employee No.</label
                        >
                        <input
                            type="text"
                            id="employee_number"
                            v-model="form.employee_number"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder=""
                            required
                        />
                    </div>

                    <div class="mb-6">
                        <label
                            for="Firstname"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mt-2"
                            >Firstname</label
                        >
                        <input
                            type="text"
                            id="fist_name"
                            v-model="form.first_name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder=""
                            required
                        />
                    </div>

                    <div class="mb-6">
                        <label
                            for="email"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mt-2"
                            >Middlename</label
                        >
                        <input
                            type="text"
                            id="middle_name"
                            v-model="form.middle_name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="name@flowbite.com"
                            required
                        />
                    </div>

                    <div class="mb-6">
                        <label
                            for="last_name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mt-2"
                            >Lastname</label
                        >
                        <input
                            type="text"
                            id="last_name"
                            v-model="form.last_name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="name@flowbite.com"
                            required
                        />
                    </div>

                    <div class="mb-6">
                        <label
                            for="birth_date"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mt-2"
                            >Birthdate</label
                        >
                        <input
                            type="date"
                            id="birth_date"
                            v-model="form.birth_date"
                            :class="{
                                'border-red-500': form.errors.birth_date,
                            }"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="name@flowbite.com"
                            required
                        />
                    </div>

                    <div class="mb-6">
                        <label
                            for="gender"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mt-2"
                            >Gender</label
                        >
                        <input
                            type="text"
                            id="gender"
                            v-model="form.gender"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="name@flowbite.com"
                            required
                        />
                    </div>

                    <div class="mb-6">
                        <label
                            for="marital_status"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mt-2"
                            >Marital Status</label
                        >

                        <label
                            for="marital_status"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >Select an option</label
                        >
                        <select
                            id="marital_status"
                            v-model="form.marital_status"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        >
                            <option selected>Marital Status</option>
                            <option value="single">Single</option>
                            <option value="married">Married</option>
                            <option value="widowed">Widowed</option>
                        </select>
                    </div>
                </div>
                <div class="flex justify-end">
                    <button
                        type="submit"
                        class="bg-gray-500 px-2 py-2 text-white rounded-lg hover:bg-gray-900 float-right"
                    >
                        Update
                    </button>
                </div>
            </form>
        </div>
    </AuthenticatedLayout>
</template>
