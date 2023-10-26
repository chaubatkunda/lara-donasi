<template>
    <div>
        <BackDrop />
        <Nav />
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <slot />
                    </div>
                </div>
            </div>
        </main>
        <!-- Bottom Navbar -->
        <div class="container nav-bottom">
            <div class="row justify-content-center fixed-bottom">
                <div class="col-md-6">
                    <ul
                        class="nav nav-pills bg-white border-top border-1 border-primary"
                    >
                        <li class="nav-item">
                            <a class="nav-link" href="#"
                                ><i class="bi bi-bag-heart"></i> Donasi</a
                            >
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"
                                ><i class="bi bi-box2-heart"></i> Galang Dana</a
                            >
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"
                                ><i class="bi bi-postcard-heart-fill"></i>
                                Donasi Saya</a
                            >
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link"
                                ><i class="bi bi-envelope-heart"></i> Inbox</a
                            >
                        </li>
                        <li class="nav-item">
                            <Link :href="route('dashboard')" class="nav-link"
                                ><i class="bi bi-person-heart"></i> Akun
                            </Link>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Nav from "@/Components/Nav.vue";
import BackDrop from "@/Components/BackDrop.vue";

export default {
    name: "AppLayout",
    components: {
        Nav,
        BackDrop,
    },
};
</script>
<style scoped>
.nav-bottom {
    margin-top: 100px;
}

.nav-pills {
    border-radius: 20px 20px 0 0;
    height: 70px;
    align-items: center;
    justify-content: center;
}
</style>
