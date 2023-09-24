<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Link } from "@inertiajs/vue3";

const props = defineProps({
    service_records: Array,
});
console.log(props.service_records);

const calculateYearsWithCompany = (dateFrom, dateTo) => {
    if (!dateFrom || !dateTo) return null; // Handle missing dates

    const fromDate = new Date(dateFrom);
    const toDate = new Date(dateTo);

    const yearDiff = toDate.getFullYear() - fromDate.getFullYear();
    const monthDiff = toDate.getMonth() - fromDate.getMonth();
    const dayDiff = toDate.getDate() - fromDate.getDate();

    let years = yearDiff;
    let months = monthDiff;
    let days = dayDiff;

    // Adjust for negative values
    if (dayDiff < 0) {
        const tempFromDate = new Date(fromDate);
        tempFromDate.setMonth(fromDate.getMonth() + 1);
        days = (toDate - tempFromDate) / (1000 * 60 * 60 * 24);
    }

    if (monthDiff < 0) {
        years--;
        months = 12 + monthDiff;
    }

    // Calculate remaining days
    days = days % 30; // Assuming 30 days per month

    return `${years} years, ${months} months, ${days} days`;
};
</script>

<template>
    <AuthenticatedLayout>
        <Head title="Service Records" />
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Service Records
            </h2>
        </template>
        <div class="max-w-7xl mx-auto pt-8 px-8">
            <div class="flex justify-end">
                <Link
  class="flex items-center bg-gray-500 px-2 py-2 text-white rounded-lg hover:bg-gray-900"
  :href="route('service_record.create')"
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
      d="M12 10.5v6m3-3H9m4.06-7.19l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z"
    />
  </svg>

  Add Record
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
                            <th scope="col" class="px-6 py-3">Employee ID</th>
                            <th scope="col" class="px-6 py-3">Date From</th>
                            <th scope="col" class="px-6 py-3">Date To</th>
                            <th scope="col" class="px-6 py-3">Position</th>
                            <th scope="col" class="px-6 py-3">Salary</th>
                            <th scope="col" class="px-6 py-3">
                                Years with Company
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Action</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            v-for="service_records in props.service_records"
                            :key="service_records.id"
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
                        >
                            <th
                                scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                            >
                                {{ service_records.employee_id }}
                            </th>
                            <th
                                scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                            >
                                {{ service_records.date_from }}
                            </th>
                            <td class="px-6 py-4">
                                {{ service_records.date_to }}
                            </td>
                            <td class="px-6 py-4">
                                {{ service_records.position }}
                            </td>
                            <td class="px-6 py-4">
                                {{ service_records.salary }}
                            </td>
                            <td class="px-6 py-4">
                                {{
                                    calculateYearsWithCompany(
                                        service_records.date_from,
                                        service_records.date_to
                                    )
                                }}
                            </td>

                            <td class="px-6 py-4 text-right">
                                <div class="flex gap-2">
                                    <Link
                                    :href="route('service_record.edit', {
                                        service_record: service_records.id // Assuming 'id' is the key for model binding
                                    })"
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
                                            route('service_record.destroy', {
                                                service_record:
                                                    service_records.id,
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
