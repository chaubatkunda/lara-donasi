<script setup>
import { computed } from "vue";
import Button from "@/Components/Button.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
    status: String,
});

const form = useForm();

const submit = () => {
    form.post(route("verification.send"));
};

const verificationLinkSent = computed(
    () => props.status === "verification-link-sent"
);
</script>

<template>
    <GuestLayout>
        <Head title="Email Verification" />
        <div class="mb-4 text-secondary">
            Thanks for signing up! Before getting started, could you verify your
            email address by clicking on the link we just emailed to you? If you
            didn't receive the email, we will gladly send you another.
        </div>

        <div class="mb-4 fs-3 text-sm text-success" v-if="verificationLinkSent">
            A new verification link has been sent to the email address you
            provided during registration.
        </div>

        <div class="card shadow-lg border-0">
            <div class="card-body">
                <form @submit.prevent="submit">
                    <div
                        class="mt-4 d-flex align-items-center justify-content-between"
                    >
                        <Button
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                        >
                            Resend Verification Email
                        </Button>

                        <Link
                            :href="route('logout')"
                            class="btn btn-danger"
                            method="post"
                            as="button"
                            >Log Out</Link
                        >
                    </div>
                </form>
            </div>
        </div>
    </GuestLayout>
</template>
