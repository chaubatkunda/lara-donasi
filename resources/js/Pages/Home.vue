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
                        <!--                        <Pagination />-->
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
                                    aria-valuenow="20"
                                    aria-valuemin="0"
                                    aria-valuemax="100"
                                    style="width: 70%"
                                ></div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="text-small">Rp.2.000.000</div>
                                <div class="text-small">4 Hari Lagi</div>
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
