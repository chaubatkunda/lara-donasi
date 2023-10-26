<script setup>
import Button from "@/Components/Button.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import Input from "@/Components/Input.vue";
import Label from "@/Components/Label.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import InputError from "@/Components/InputError.vue";

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

        <div class="card shadow-lg border-0 mt-4 mb-3">
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
                        <InputError :message="form.errors.name" />
                    </div>

                    <div class="mt-4">
                        <Label for="email" value="Email" />
                        <Input
                            id="email"
                            type="text"
                            v-model="form.email"
                            autocomplete="username"
                        />
                        <InputError :message="form.errors.email" />
                    </div>

                    <div class="mt-4">
                        <Label for="password" value="Password" />
                        <Input
                            id="password"
                            type="password"
                            v-model="form.password"
                            autocomplete="new-password"
                        />
                        <InputError :message="form.errors.password" />
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
                        <InputError
                            :message="form.errors.password_confirmation"
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
