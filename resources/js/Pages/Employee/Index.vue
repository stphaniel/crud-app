<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Link } from "@inertiajs/vue3";

const props = defineProps({
    employees: Array,
});

const calculateAge = (birthDate) => {
    const today = new Date();
    const birthDateObj = new Date(birthDate);
    const age = today.getFullYear() - birthDateObj.getFullYear();
    const monthDiff = today.getMonth() - birthDateObj.getMonth();

    if (
        monthDiff < 0 ||
        (monthDiff === 0 && today.getDate() < birthDateObj.getDate())
    ) {
        return age - 1;
    }

    return age;
};


console.log(props.employees);
</script>

<template>
    <AuthenticatedLayout>
        <Head title="Employees" />
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Employees
            </h2>
        </template>
        <div class="max-w-7xl mx-auto pt-8 px-8">
            <div class="flex justify-end">
                <Link
                    class="flex items-center bg-gray-500 px-2 py-2 text-white rounded-lg hover:bg-gray-900"
                    :href="route('employee.create')"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="w-6 h-6 mr-2"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z"
                        />
                    </svg>
                    Add Employee
                </Link>
            </div>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table
                    class="w-full text-sm text-left text-gray-500 dark:text-gray-400 mt-4"
                >
                    <thead
                        class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
                    >
                        <tr>
                            <th scope="col" class="px-6 py-3"></th>
                            <th scope="col" class="px-6 py-3">Employee No.</th>
                            <th scope="col" class="px-6 py-3">Name</th>
                            <th scope="col" class="px-6 py-3">Birthday</th>
                            <th scope="col" class="px-6 py-3">Gender</th>
                            <th scope="col" class="px-6 py-3">
                                Marital Status
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="px-6 py-3">Age</span>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="px-6 py-3">Manage</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            v-for="employee in props.employees"
                            :key="employee.id"
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
                        >
                            <th
                                scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                            >
                                {{ employee.id }}
                            </th>
                            <th
                                scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                            >
                                {{ employee.employee_number }}
                            </th>
                            <td class="px-6 py-4">
                                {{
                                    employee.first_name +
                                    " " +
                                    employee.last_name
                                }}
                            </td>
                            <td class="px-6 py-4">
                                {{ employee.birth_date }}
                            </td>
                            <td class="px-6 py-4">
                                {{ employee.gender }}
                            </td>
                            <td class="px-6 py-4">
                                {{ employee.marital_status }}
                            </td>
                            <td class="px-6 py-4">
                                {{ calculateAge(employee.birth_date) }} y/o
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex gap-2">
                                    <Link
                                        :href="
                                            route('employee.edit', {
                                                employee: employee.id,
                                            })
                                        "
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                                        ><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke-width="1.5"
                                            stroke="currentColor"
                                            class="w-5 h-5"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"
                                            />
                                        </svg>
                                    </Link>

                                    <Link
                                        :href="
                                            route('employee.destroy', {
                                                employee: employee.id,
                                            })
                                        "
                                        method="delete"
                                        as="button"
                                        class="font-medium text-red-800 dark:text-red-500 hover:underline"
                                        ><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke-width="1.5"
                                            stroke="currentColor"
                                            class="w-5 h-5"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
                                            />
                                        </svg>
                                    </Link>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
