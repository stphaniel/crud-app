<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { useForm } from "@inertiajs/vue3";

const form = useForm({
    employee_number: null,
    first_name: null,
    middle_name: null,
    last_name: null,
    birth_date: null,
    gender: null,
    marital_status: null,
    position: null,
    salary: null,
    date_from: null,
    date_to: null,
});

const save = () => {
    form.post(route("employee.store"), form);
};
</script>

<template>
    <AuthenticatedLayout>
        <Head title="Add Employee" />
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Add Employee
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
                            :class="{
                                'border-red-500': form.errors.employee_number,
                            }"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder=""
                        />
                        <span
                            v-if="form.errors.employee_number"
                            class="text-red-500 text-xs"
                            >{{ form.errors.employee_number }}</span
                        >
                    </div>

                    <div class="mb-6">
                        <label
                            for="first_name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mt-2"
                        >
                            Firstname
                        </label>
                        <input
                            type="text"
                            id="first_name"
                            v-model="form.first_name"
                            :class="{
                                'border-red-500': form.errors.first_name,
                            }"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder=""
                        />
                        <span
                            v-if="form.errors.first_name"
                            class="text-red-500 text-xs"
                            >{{ form.errors.first_name }}</span
                        >
                    </div>

                    <div class="mb-6">
                        <label
                            for="middle_name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mt-2"
                            >Middlename</label
                        >
                        <input
                            type="text"
                            id="middle_name"
                            v-model="form.middle_name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder=""
                        />
                    </div>

                    <div class="mb-6">
                        <label
                            for="last_name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mt-2"
                        >
                            Lastname
                        </label>
                        <input
                            type="text"
                            id="last_name"
                            v-model="form.last_name"
                            :class="{
                                'border-red-500': form.errors.last_name,
                            }"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder=""
                        />
                        <span
                            v-if="form.errors.last_name"
                            class="text-red-500 text-xs"
                            >{{ form.errors.last_name }}</span
                        >
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
                            placeholder=""
                        />
                        <span
                            v-if="form.errors.birth_date"
                            class="text-red-500 text-xs"
                            >{{ form.errors.birth_date }}</span
                        >
                    </div>

                    <div class="mb-6">
                        <label
                            for="gender"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mt-2"
                            >Gender</label
                        >
                        <select
                            id="gender"
                            v-model="form.gender"
                            :class="{
                                'border-red-500': form.errors.gender,
                            }"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        >
                            <option selected disabled>Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Others">Others</option>
                        </select>
                        <span
                            v-if="form.errors.gender"
                            class="text-red-500 text-xs"
                            >{{ form.errors.gender }}</span
                        >
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
                        ></label>
                        <select
                            id="marital_status"
                            v-model="form.marital_status"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        >
                            <option selected disabled>
                                Select Marital Status
                            </option>
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                            <option value="Widowed">Widowed</option>
                        </select>
                        <span
                            v-if="form.errors.marital_status"
                            class="text-red-500 text-xs"
                            >{{ form.errors.marital_status }}</span
                        >
                    </div>

                    <div class="mb-6">
                        <label
                            for="date_from"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mt-2"
                        >
                            Start Date
                        </label>
                        <input
                            type="date"
                            name="date_from"
                            id="date_from"
                            v-model="form.date_from"
                            :class="{
                                'border-red-500': form.errors.date_from,
                            }"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder=""
                        />
                        <span
                            v-if="form.errors.date_from"
                            class="text-red-500 text-xs"
                            >{{ form.errors.date_from }}</span
                        >
                    </div>

                    <div class="mb-6">
                        <label
                            for="date_to"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mt-2"
                        >
                            End Date
                        </label>
                        <input
                            type="date"
                            name="date_to"
                            id="date_to"
                            v-model="form.date_to"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder=""
                        />
                        <span
                            v-if="form.errors.date_to"
                            class="text-red-500 text-xs"
                            >{{ form.errors.date_to }}</span
                        >
                    </div>

                    <div class="mb-6">
                        <label
                            for="position"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mt-2"
                            >Position</label
                        >
                        <input
                            type="text"
                            id="position"
                            v-model="form.position"
                            :class="{
                                'border-red-500': form.errors.position,
                            }"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder=""
                        />
                        <span
                            v-if="form.errors.position"
                            class="text-red-500 text-xs"
                            >{{ form.errors.position }}</span
                        >
                    </div>

                    <div class="mb-6">
                        <label
                            for="salary"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mt-2"
                            >Salary</label
                        >
                        <input
                            type="number"
                            id="salary"
                            v-model="form.salary"
                            :class="{
                                'border-red-500': form.errors.salary,
                            }"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder=""
                        />
                        <span
                            v-if="form.errors.salary"
                            class="text-red-500 text-xs"
                            >{{ form.errors.salary }}</span
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
