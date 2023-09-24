<script setup>
import Checkbox from "@/Components/Checkbox.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: "",
    password: "",
    remember: false,
});

const submit = () => {
    form.post(route("login"), {
        onFinish: () => form.reset("password"),
    });
};
</script>

<template>
    <!-- Section 1 -->
    <section class="w-full px-8 py-16 bg-gray-100 xl:px-8">
        <div class="max-w-5xl mx-auto">
            <div class="flex flex-col items-center md:flex-row">
                <div class="w-full space-y-5 md:w-3/5 md:pr-16">
                    <p class="font-medium text-blue-500 uppercase">
                       EMPLOYEE AND SERVICE RECORD MANAGEMENT SYSTEM
                    </p>
                    <h2
                        class="text-2xl font-extrabold leading-none text-black sm:text-3xl md:text-5xl"
                    >
                        Cloudify Web Solutions
                    </h2>
                    <p class="text-xl text-gray-600 md:pr-16">
                        Learn how to engage with your visitors and teach them
                        about your mission. We're revolutionizing the way
                        customers and businesses interact.
                    </p>
                </div>

                <div class="w-full mt-16 md:mt-0 md:w-2/5">
                    <div
                        class="relative z-10 h-auto p-8 py-10 overflow-hidden bg-white border-b-2 border-gray-300 shadow-2xl px-7 rounded-none"
                    >
                        <h3 class="mb-6 text-2xl font-medium text-center">
                            Sign in to your Account
                        </h3>
                        <form @submit.prevent="submit">
                            <div>
                                <InputLabel for="email" value="Email" />
                                <TextInput
                                    id="email"
                                    type="email"
                                    class="mt-1 block w-full"
                                    v-model="form.email"
                                    required
                                    autofocus
                                    autocomplete="username"
                                />
                                <InputError
                                    class="mt-2"
                                    :message="form.errors.email"
                                />
                            </div>
                            <div class="mt-4">
                                <InputLabel for="password" value="Password" />
                                <TextInput
                                    id="password"
                                    type="password"
                                    class="mt-1 block w-full"
                                    v-model="form.password"
                                    required
                                    autocomplete="current-password"
                                />
                                <InputError
                                    class="mt-2"
                                    :message="form.errors.password"
                                />
                            </div>
                            <div class="block mt-4">
                                <!-- Remember me checkbox -->
                                <label class="flex items-center">
                                    <Checkbox
                                        name="remember"
                                        v-model:checked="form.remember"
                                    />
                                    <span class="ml-2 text-sm text-gray-600">Remember me</span>
                                </label>
                            
                                <!-- Forgot password and Create Account links -->
                                <div class="flex items-center justify-between mt-2">
                                    <Link
                                        v-if="canResetPassword"
                                        :href="route('password.request')"
                                        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                    >
                                        Forgot your password?
                                    </Link>
                            
                                    <Link
                                        :href="route('register')"
                                        class="ml-4 underline text-sm text-blue-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                    >
                                        Create Account
                                    </Link>
                                </div>
                            
                                <!-- Log in button -->

                                <PrimaryButton
                                    class="mt-4 ml-2 float-right"
                                    :class="{ 'opacity-25': form.processing }"
                                    :disabled="form.processing"
                                >
                                    Log in
                                </PrimaryButton>
                            </div>
                         
                            
                            
                            
                            
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
