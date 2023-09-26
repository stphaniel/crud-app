<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
    //   employees: Array,
    service_record: Object, 
});

// console.log("Props.employees:", props.employees);
console.log("Props.service_record:", props.service_record);

const form = useForm({
    date_from: null,
    date_to: null,
    employee_id: null,
    position: null,
    salary: null,
    employee_number: "",
});

if (props.service_record) {
    form.date_from = props.service_record.date_from;
    form.date_to = props.service_record.date_to;
    form.employee_id = props.service_record.employee_id;
    form.position = props.service_record.position;
    form.salary = props.service_record.salary;

   
    if (props.service_record.employee) {
        form.employee_number = props.service_record.employee.employee_number;
    }
}

const save = () => {
    console.log("Save function called");
    form.put(
        route("service_record.update", {
            service_record: props.service_record.id,
        })
    );
};
</script>

<template>
    <AuthenticatedLayout>
        <Head title="Add Record" />
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Update Record
            </h2>
        </template>
        <div class="max-w-7xl mx-auto pt-8 px-5">
            <form class="w-full bg-white p-4" @submit.prevent="save">
                <Link
                    :href="route('service_record.index')"
                    class="flex items-center font-medium text-blue-600 dark:text-blue-500 hover:underline"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        class="w-6 h-6 mr-2 cursor-pointer"
                        @click="$inertia.visit(route('service_record.index'))"
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
                        >
                            Employee No.
                        </label>
                        <input
                            type="text"
                            name="employee_number"
                            id="employee_number"
                            v-model="form.employee_number"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder=""
                            required
                            readonly
                        />
                        <span
                            v-if="form.errors.employee_number"
                            class="text-red-500 text-xs"
                            >{{ form.errors.employee_number }}</span
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
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder=""
                            required
                        />
                        <span
                            v-if="form.errors.date_from"
                            class="text-red-500 text-xs"
                            >{{ form.errors.date_from }}</span
                        >
                    </div>

                    <div class="mb-6">
                        <label
                            for="birth_date"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mt-2"
                            >End Date</label
                        >
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
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder=""
                            required
                        />
                    </div>

                    <div class="mb-6">
                        <label
                            for="salary"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mt-2"
                            >Salary</label
                        >
                        <input
                            type="text"
                            id="salary"
                            v-model="form.salary"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder=""
                            required
                        />
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
