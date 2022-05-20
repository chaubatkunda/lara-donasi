<template>
    <div>
        <Carousel :autoplay="3000" :wrapAround="true">
            <Slide v-for="img in images" :key="img.id">
                <!-- <div class="carousel__item"> -->
                <img :src="getImagePath(img.url)" class="img-carousel" />
                <!-- </div> -->
            </Slide>
            <template #addons>
                <!-- <Navigation /> -->
                <Pagination />
            </template>
        </Carousel>
    </div>
</template>
<script>
import "vue3-carousel/dist/carousel.css";
import { Carousel, Slide, Pagination, Navigation } from "vue3-carousel";
export default {
    name: "Bener",
    components: {
        Carousel,
        Slide,
        Pagination,
        Navigation,
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
            return "../img/" + imagePath;
        },
    },
};
</script>
<style scoped>
.img-carousel {
    width: 100%;
    height: 80vh;
    object-position: top;
    object-fit: cover;
}
</style>
