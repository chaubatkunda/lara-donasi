<template>
    <main class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <nav-dasbor />
                </div>
                <div class="col-md-9">
                    <slot />
                </div>
            </div>
        </div>
    </main>
</template>
<script>
import NavDasbor from "@/Components/NavDasbor.vue";
export default {
    name: "DashboardLayout",
    components: {
        NavDasbor,
    },
};
</script>
