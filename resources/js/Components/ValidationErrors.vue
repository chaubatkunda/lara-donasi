<script setup>
import { computed } from "vue";
import { usePage } from "@inertiajs/inertia-vue3";

const errors = computed(() => usePage().props.value.errors);

const hasErrors = computed(() => Object.keys(errors.value).length > 0);
</script>

<template>
    <div v-if="hasErrors">
        <div class="fs-5 text-danger">Whoops! Something went wrong.</div>

        <ul class="mt-3 text-danger">
            <li v-for="(error, key) in errors" :key="key">{{ error }}</li>
        </ul>
    </div>
</template>
