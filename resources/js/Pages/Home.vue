<template>
    <Head title="Home" />
    <Bener />
    <section class="section-home">
        <div class="h5 fs-5 mt-4 mb-3">
            Pilihan
            <strong class="border-bottom text-primary">Lainnya</strong>
        </div>
        <div class="card shadow border-0 mb-4">
            <div class="card-body">
                <Carousel
                    :autoplay="4000"
                    :items-to-show="1.5"
                    :wrap-around="true"
                >
                    <Slide v-for="img in campaigns" :key="img.id">
                        <div class="carousel__item">
                            <Link
                                :href="route('kumpul.donasi', img.slug)"
                                class="text-decoration-none"
                            >
                                <img
                                    :src="getImagePath(img.image)"
                                    class="img-carousel"
                                />
                                <div>
                                    {{ img.title }}
                                </div>
                            </Link>
                        </div>
                    </Slide>
                    <template #addons>
                        <Navigation />
                    </template>
                </Carousel>
            </div>
        </div>
        <div class="h5 fs-5 mt-4 mb-3">
            Pilihan
            <strong class="border-bottom text-primary">Mendesak</strong>
        </div>
        <div class="row justify-content-center">
            <div
                class="col-md-12"
                v-for="campaign in campaigns"
                :key="campaign"
            >
                <!--                End-->
                <Link
                    :href="route('kumpul.donasi', campaign.slug)"
                    class="text-decoration-none mb-3 mt-3"
                >
                    <div class="card shadow border-0 mb-3">
                        <img
                            :src="getImagePath(campaign.image)"
                            class="card-img-top image-donasi"
                        />
                        <div class="card-body">
                            <div class="h5">
                                {{ campaign.title }}
                            </div>
                            <div class="progress mt-3 mb-2">
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
                                <div class="text-small">Rp.2.000.000</div>
                                <div class="text-small">
                                    {{ countDay(campaign.expired) }} Hari Lagi
                                </div>
                            </div>
                        </div>
                    </div>
                </Link>
            </div>
        </div>
    </section>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import Bener from "@/Components/Bener.vue";
import { Carousel, Navigation, Pagination, Slide } from "vue3-carousel";

export default {
    name: "Home",
    layout: AppLayout,
    props: {
        campaigns: Array,
    },
    components: {
        Carousel,
        Slide,
        Pagination,
        Navigation,
        Bener,
    },
    data: () => ({
        images: [
            {
                id: 1,
                url: "ryland-dean-6k6N8HTrXyE-unsplash.jpg",
            },
            {
                id: 2,
                url: "leptop.jpeg",
            },
            {
                id: 3,
                url: "img_2.jpg",
            },
            {
                id: 4,
                url: "img_2.jpg",
            },
        ],
    }),
    methods: {
        getImagePath(imagePath) {
            return "/storage/" + imagePath;
        },
        getImage(imagePath) {
            return "../img/" + imagePath;
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
<style scoped>
.img-carousel {
    width: 100%;
    height: 150px;
    object-position: top;
    object-fit: cover;
}
</style>
