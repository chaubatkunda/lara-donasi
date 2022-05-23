<template>
    <Head title="Home" />
    <AppLayout>
        <Bener />
        <section class="section-home">
            <div class="container">
                <div class="h5 fs-5 mt-4 mb-3">
                    Pilihan
                    <strong class="border-bottom text-primary">Mendesak</strong>
                </div>
                <div class="row">
                    <div
                        class="col-md-4"
                        v-for="campaign in campaigns"
                        :key="campaign"
                    >
                        <Link
                            :href="route('kumpul.donasi', campaign.slug)"
                            class="text-decoration-none"
                        >
                            <div class="card shadow border-0">
                                <img
                                    :src="getImagePath(campaign.image)"
                                    class="card-img-top image-donasi"
                                />
                                <div class="card-body">
                                    <div class="h5">{{ campaign.title }}</div>
                                    <div class="progress mt-3 mb-2">
                                        <div
                                            class="progress-bar progress-bar-striped progress-bar-animated"
                                            role="progressbar"
                                            aria-valuenow="20"
                                            aria-valuemin="0"
                                            aria-valuemax="100"
                                            style="width: 70%"
                                        ></div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div class="text-small">
                                            Rp.2.000.000
                                        </div>
                                        <div class="text-small">
                                            4 Hari Lagi
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </Link>
                    </div>
                    <!-- <div class="col-md-4">
                        <Link
                            :href="route('kumpul.donasi', 'banjir-surabaya')"
                            class="text-decoration-none"
                        >
                            <div class="card shadow border-0">
                                <img
                                    :src="getImagePath('leptop.jpeg')"
                                    class="card-img-top image-donasi"
                                />
                                <div class="card-body">
                                    <div class="h5">Banjir Jakarta</div>
                                    <div class="progress mt-3 mb-2">
                                        <div
                                            class="progress-bar progress-bar-striped progress-bar-animated"
                                            role="progressbar"
                                            aria-valuenow="20"
                                            aria-valuemin="0"
                                            aria-valuemax="100"
                                            style="width: 30%"
                                        ></div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div class="text-small">
                                            Rp.1.000.000
                                        </div>
                                        <div class="text-small">
                                            20 Hari Lagi
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </Link>
                    </div> -->
                </div>
            </div>
        </section>
    </AppLayout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import Bener from "@/Components/Bener.vue";
export default {
    name: "Home",
    props: {
        campaigns: Array,
    },
    components: {
        AppLayout,
        Head,
        Bener,
        Link,
    },
    methods: {
        getImagePath(imagePath) {
            return "/storage/" + imagePath;
        },
    },
};
</script>
