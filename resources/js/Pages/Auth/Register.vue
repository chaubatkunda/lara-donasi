<script setup>
import Button from "@/Components/Button.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import Input from "@/Components/Input.vue";
import Label from "@/Components/Label.vue";
import ValidationErrors from "@/Components/ValidationErrors.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";

const form = useForm({
    name: "",
    email: "",
    password: "",
    password_confirmation: "",
    terms: false,
});

const submit = () => {
    form.post(route("register"), {
        onFinish: () => form.reset("password", "password_confirmation"),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Register" />

        <ValidationErrors class="mb-4" />

        <div class="card shadow-lg border-0">
            <div class="card-body">
                <form @submit.prevent="submit">
                    <div>
                        <Label for="name" value="Name" />
                        <Input
                            id="name"
                            type="text"
                            v-model="form.name"
                            autofocus
                            autocomplete="name"
                        />
                    </div>

                    <div class="mt-4">
                        <Label for="email" value="Email" />
                        <Input
                            id="email"
                            type="text"
                            v-model="form.email"
                            autocomplete="username"
                        />
                    </div>

                    <div class="mt-4">
                        <Label for="password" value="Password" />
                        <Input
                            id="password"
                            type="password"
                            v-model="form.password"
                            autocomplete="new-password"
                        />
                    </div>

                    <div class="mt-4">
                        <Label
                            for="password_confirmation"
                            value="Confirm Password"
                        />
                        <Input
                            id="password_confirmation"
                            type="password"
                            v-model="form.password_confirmation"
                            autocomplete="new-password"
                        />
                    </div>

                    <div class="d-grid mt-4">
                        <Button
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                        >
                            Register
                        </Button>
                        <small class="mt-3">
                            <Link
                                :href="route('login')"
                                class="text-decoration-none border-bottom"
                            >
                                Already registered?
                            </Link>
                        </small>
                    </div>
                </form>
            </div>
        </div>
    </GuestLayout>
</template>
