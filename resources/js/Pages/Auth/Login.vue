<script setup>
import Botton from "@/Components/Button.vue";
import Checkbox from "@/Components/Checkbox.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import Input from "@/Components/Input.vue";
import Label from "@/Components/Label.vue";
import ValidationErrors from "@/Components/ValidationErrors.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";

defineProps({
    canResetPassword: Boolean,
    status: String,
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
    <GuestLayout>
        <Head title="Log in" />
        <ValidationErrors class="mb-4" />
        <div v-if="status" class="mb-4 text-success">
            {{ status }}
        </div>
        <div class="card shadow-lg border-0">
            <div class="card-body">
                <form @submit.prevent="submit" autocomplete="off">
                    <div>
                        <Label for="email" value="Email" />
                        <Input
                            id="email"
                            type="text"
                            v-model="form.email"
                            autofocus
                            autocomplete="username"
                        />
                    </div>
                    <div class="mt-4">
                        <Label for="password" value="Password" />
                        <Input
                            id="password"
                            type="password"
                            v-model="form.password"
                            autocomplete="current-password"
                        />
                    </div>

                    <div class="d-flex justify-content-between">
                        <div class="mt-4">
                            <Label>
                                <Checkbox
                                    name="remember"
                                    v-model:checked="form.remember"
                                />
                                <span class="ms-2">
                                    <small>Remember me</small>
                                </span>
                            </Label>
                        </div>
                        <div class="mt-4">
                            <Link
                                v-if="canResetPassword"
                                :href="route('password.request')"
                                class="text-decoration-none"
                            >
                                <small class="border-bottom">
                                    Forgot your password?
                                </small>
                            </Link>
                        </div>
                    </div>
                    <div class="d-grid">
                        <Botton
                            class="mt-4"
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                        >
                            Log in
                        </Botton>

                        <small class="mt-4"
                            >Don't have account?
                            <Link
                                :href="route('register')"
                                class="text-decoration-none border-bottom"
                                >Register</Link
                            >
                        </small>
                    </div>
                </form>
            </div>
        </div>
    </GuestLayout>
</template>
