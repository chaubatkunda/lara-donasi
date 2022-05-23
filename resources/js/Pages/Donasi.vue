<template>
    <Head title="Donasi" />
    <app-layout>
        <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-md-6">
                    <div class="card shadow border-0">
                        <img
                            :src="getImagePath(campaign.image)"
                            class="card-img-top"
                        />
                        <div class="card-body">
                            <div class="h5 fs-4 mb-2 mt-3">
                                {{ campaign.title }}
                            </div>
                            <div class="h5 fs-6 mb-2 mt-3">
                                Rp.330.000.000
                                <small class="text-primary">Terkumpul</small>
                            </div>
                            <div class="progress mt-3 mb-2">
                                <div
                                    class="progress-bar progress-bar-striped progress-bar-animated"
                                    role="progressbar"
                                    :style="{
                                        width: persentProgres(
                                            campaign.start_date,
                                            campaign.expired
                                        ),
                                    }"
                                ></div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="text-small">1443 Donasi</div>
                                <div class="text-small">
                                    {{ countDay(campaign.expired) }} hari lagi
                                </div>
                            </div>

                            <div class="d-grid gap-2 mx-auto mt-3">
                                <Link
                                    :href="
                                        route(
                                            'nominal.donasi',
                                            campaign.slug,
                                            'nominal'
                                        )
                                    "
                                    class="btn btn-primary"
                                    type="button"
                                >
                                    Donasi Sekarang!
                                </Link>
                            </div>
                            <div class="mt-4 mb-3">
                                {{ campaign.description }}
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
    props: {
        campaign: Object,
    },
    data() {
        return {
            persentprogress: null,
        };
    },
    components: {
        AppLayout,
        Head,
        Link,
    },
    methods: {
        getImagePath(imagePath) {
            return "/storage/" + imagePath;
        },
        countDay(hari) {
            const oneDay = 24 * 60 * 60 * 1000; // hours*minutes*seconds*milliseconds
            const firstDate = new Date();
            const secondDate = new Date(hari);
            const diffDays = Math.round(
                Math.abs((firstDate.getTime() - secondDate.getTime()) / oneDay)
            );
            return diffDays;
        },
        persentProgres(crt, exp) {
            const oneDay = 24 * 60 * 60 * 1000; // hours*minutes*seconds*milliseconds
            const crta = new Date(crt);
            const expr = new Date(exp);
            const nDay = new Date();
            const allDay = Math.round(
                Math.abs((crta.getTime() - expr.getTime()) / oneDay)
            );
            const nowDay = Math.round(
                Math.abs((nDay.getTime() - expr.getTime()) / oneDay)
            );
            const hasilCount = (nowDay / allDay) * 100;
            // console.log(parseInt(hasilCount));
            console.log(nDay);

            return parseInt(hasilCount) + "%";
        },
    },
};
</script>
