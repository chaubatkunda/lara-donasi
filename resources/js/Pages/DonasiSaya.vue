<template>
    <Head title="Donasi Saya" />
    <app-layout>
        <div class="container">
            <div class="row mt-5 vh-100">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <ol class="list-group list-group-numbered">
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-start"
                                    v-for="dn in donasi"
                                    :key="dn"
                                >
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">
                                            {{ dn.campaign.title }}
                                        </div>
                                    </div>
                                    <span
                                        class="badge bg-primary rounded-pill"
                                        >{{ dn.nominal }}</span
                                    >
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="alert alert-success" role="alert">
                        Lorem ipsum, dolor sit amet consectetur adipisicing
                        elit. Blanditiis sequi voluptatum ab neque quas, amet
                        asperiores praesentium quos eum optio.
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Head } from "@inertiajs/inertia-vue3";
export default {
    name: "DonasiSaya",
    props: {
        donasi: Array,
    },
    components: {
        AppLayout,
        Head,
    },
    methods: {
        totalTransaction(items) {
            let sum = 0;
            items.forEach((val) => {
                return (sum += val.nominal);
            });
            return sum;
        },
    },
};
</script>
