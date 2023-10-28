<template>
    <div class="row justify-content-center">
        <div class="col-md-5">
            <ul class="nav nav-pills text-bg-primary">
                <li class="nav-item">
                    <Link class="nav-link" :href="route('home')">
                        <span class="fs-5 fw-bold">Lara Donasi</span>
                    </Link>
                </li>
                <li class="nav-item ms-auto">
                    <button
                        class="nav-link rounded-pill mt-2 mb-2"
                        type="button"
                        data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasWithBackdrop"
                        aria-controls="offcanvasWithBackdrop"
                    >
                        <i class="bi bi-list"></i>
                    </button>
                </li>
            </ul>
        </div>
    </div>
</template>
<script>
import NavLink from "@/Components/NavLink.vue";

export default {
    name: "Nav",
    components: {
        NavLink,
    },
};
</script>
