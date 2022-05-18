<template>
    <Head title="Home" />
    <AppLayout>
        <Bener />
        <section class="section-home">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                Lorem, ipsum dolor sit amet consectetur
                                adipisicing elit. Atque, similique!
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </AppLayout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Head } from "@inertiajs/inertia-vue3";
import Bener from "@/Components/Bener.vue";
export default {
    name: "Home",
    components: {
        AppLayout,
        Head,
        Bener,
    },
};
</script>
