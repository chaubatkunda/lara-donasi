<template>
    <BackDrop />
    <Nav />
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="mb-4">
                    <Link :href="route('home')" class="btn btn-danger"
                        ><i class="bi bi-arrow-left"></i
                    ></Link>
                </div>
                <slot />
            </div>
        </div>
    </div>
</template>
<script>
import Nav from "@/Components/Nav.vue";
import BackDrop from "@/Components/BackDrop.vue";

export default {
    name: "GuestLayout",
    components: { BackDrop, Nav },
};
</script>
