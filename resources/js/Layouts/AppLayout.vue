<template>
    <main>
        <div class="container">
            <BackDrop />
            <Nav />
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <slot />
                </div>
            </div>
            <!-- Bottom Navbar -->
            <div class="nav-bottom">
                <div class="row justify-content-center fixed-bottom">
                    <div class="col-md-5">
                        <ul
                            class="nav nav-pills bg-white border-top border-1 border-primary"
                        >
                            <li class="nav-item">
                                <NavLink
                                    class="fw-light"
                                    :href="route('home')"
                                    :active="route().current('home')"
                                    ><i class="bi bi-bag-heart"></i> Donasi
                                </NavLink>
                            </li>
                            <li class="nav-item">
                                <NavLink
                                    class="fw-light"
                                    :href="route('galang.dana')"
                                    :active="route().current('galang.dana')"
                                    ><i class="bi bi-box2-heart"></i> Galang
                                    Dana
                                </NavLink>
                            </li>
                            <li class="nav-item">
                                <NavLink
                                    class="fw-light"
                                    :href="route('donasi.saya')"
                                    :active="route().current('donasi.saya')"
                                    ><i class="bi bi-postcard-heart-fill"></i>
                                    Donasi Saya
                                </NavLink>
                            </li>
                            <li class="nav-item">
                                <NavLink
                                    :href="route('dashboard')"
                                    class="fw-light"
                                    ><i class="bi bi-person-heart"></i> Akun
                                </NavLink>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>
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
    margin-top: 70px;
}

.nav-pills {
    //border-radius: 20px 20px 0 0;
    //display: flex;
    height: 50px;
    align-items: center;
    justify-content: center;
}
</style>
