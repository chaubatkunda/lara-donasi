<template>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <Link class="navbar-brand" :href="route('donasi')"
                >Lara'Donasi</Link
            >
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <NavLink
                            :active="route().current('donasi')"
                            :href="route('donasi')"
                            >Donasi</NavLink
                        >
                    </li>
                    <li class="nav-item">
                        <NavLink
                            :active="route().current('donasi.saya')"
                            :href="route('donasi.saya')"
                            >Donasi Saya</NavLink
                        >
                    </li>
                    <li class="nav-item">
                        <NavLink
                            :active="route().current('galang.dana')"
                            :href="route('galang.dana')"
                            >Galang Dana</NavLink
                        >
                    </li>
                </ul>
                <div class="d-flex">
                    <input
                        class="form-control ms-2"
                        type="search"
                        placeholder="Coba Cari"
                        aria-label="Search"
                    />
                </div>
                <button
                    class="btn btn-info ms-3"
                    type="button"
                    data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasWithBackdrop"
                    aria-controls="offcanvasWithBackdrop"
                >
                    ...
                </button>
            </div>
        </div>
    </nav>
</template>
<script>
import { Link } from "@inertiajs/inertia-vue3";
import NavLink from "@/Components/NavLink.vue";

export default {
    name: "Nav",
    components: {
        Link,
        NavLink,
    },
};
</script>
