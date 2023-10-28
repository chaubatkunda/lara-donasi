<script>
import Nav from "@/Components/Nav.vue";
import BackDrop from "@/Components/BackDrop.vue";

export default {
    name: "ListLayout",
    components: { BackDrop, Nav },
};
</script>

<template>
    <main>
        <div class="container">
            <BackDrop />
            <Nav />
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="mb-4">
                        <Link :href="route('home')" class="btn btn-secondary"
                            ><i class="bi bi-arrow-left"></i
                        ></Link>
                    </div>
                    <slot />
                </div>
            </div>
        </div>
    </main>
</template>

<style scoped></style>
