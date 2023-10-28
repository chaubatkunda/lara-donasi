<template>
    <Head title="Donasi Saya" />
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
                    <span class="badge bg-primary rounded-pill">{{
                        dn.nominal
                    }}</span>
                </li>
            </ol>
        </div>
    </div>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout.vue";

export default {
    name: "DonasiSaya",
    layout: AppLayout,
    props: {
        donasi: Array,
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
