<template>
    <Head title="Donasi" />
    <div class="card shadow border-0">
        <img :src="getImagePath(campaign.image)" class="card-img-top" />
        <div class="card-body">
            <div class="h5 fs-4 mb-2 mt-3">
                {{ campaign.title }}
            </div>
            <div class="h5 fs-6 mb-2 mt-3">
                Rp.330.000.000
                <small class="text-primary">Terkumpul</small>
            </div>
            <div class="progress mt-3 mb-2" style="height: 5px">
                <div
                    class="progress-bar progress-bar-striped progress-bar-animated"
                    role="progressbar"
                    :style="{
                        width: persentProgres(
                            campaign.start_date,
                            campaign.expired,
                        ),
                    }"
                ></div>
            </div>
            <div class="d-flex justify-content-between">
                <div class="text-small">
                    {{ campaign.transactions_count }} Donasi
                </div>
                <div class="text-small">
                    {{ countDay(campaign.expired) }} hari lagi
                </div>
            </div>

            <div class="d-grid gap-2 mx-auto mt-3">
                <Link
                    :href="route('nominal.donasi', campaign.slug)"
                    class="btn btn-primary"
                    >Donasi
                </Link>
            </div>
            <div class="mt-4 mb-3">
                {{ campaign.description }}
            </div>
        </div>
    </div>
</template>
<script>
import ListLayout from "@/Layouts/ListLayout.vue";

export default {
    name: "Home",
    layout: ListLayout,
    props: {
        campaign: Object,
    },
    data() {
        return {
            persentprogress: null,
        };
    },
    methods: {
        getImagePath(imagePath) {
            return "/storage/" + imagePath;
        },
        countDay(hari) {
            const oneDay = 24 * 60 * 60 * 1000; // hours*minutes*seconds*milliseconds
            const firstDate = new Date();
            const secondDate = new Date(hari);
            return Math.round(
                Math.abs((firstDate.getTime() - secondDate.getTime()) / oneDay),
            );
        },
        persentProgres(crt, exp) {
            const oneDay = 24 * 60 * 60 * 1000; // hours*minutes*seconds*milliseconds
            const startData = new Date(crt);
            const endData = new Date(exp);
            const dateNow = new Date();
            const differenceDate = Math.round(
                Math.abs((startData.getTime() - endData.getTime()) / oneDay),
            ).toString();
            const nowDay = Math.round(
                Math.abs((dateNow.getTime() - endData.getTime()) / oneDay),
            ).toString();
            const parceintDate = 100 - (nowDay / differenceDate) * 100;
            console.log(parceintDate + "%");
            return parseInt(parceintDate) + "%";
        },
    },
};
</script>
