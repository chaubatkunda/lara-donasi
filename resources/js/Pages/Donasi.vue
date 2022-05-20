<template>
    <Head title="Donasi" />
    <app-layout>
        <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-md-6">
                    <div class="card shadow border-0">
                        <img
                            :src="getImagePath('img_2.jpg')"
                            class="card-img-top"
                        />
                        <div class="card-body">
                            <div class="h5 fs-4 mb-2 mt-3">Banjir Surabaya</div>
                            <div class="h5 fs-6 mb-2 mt-3">
                                Rp.330.000.000
                                <small class="text-primary">Terkumpul</small>
                            </div>
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
                                <div class="text-small">1443 Donasi</div>
                                <div class="text-small">10 hari lagi</div>
                            </div>

                            <div class="d-grid gap-2 mx-auto mt-3">
                                <Link
                                    :href="
                                        route(
                                            'nominal.donasi',
                                            'banjir-surabaya',
                                            'nominal'
                                        )
                                    "
                                    class="btn btn-primary"
                                    type="button"
                                >
                                    Donasi Sekarang!
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
export default {
    name: "Home",
    components: {
        AppLayout,
        Head,
        Link,
    },
    methods: {
        getImagePath(imagePath) {
            return "../img/" + imagePath;
        },
    },
};
</script>
