<template>
    <div>
        <BackDrop />
        <Nav />
        <slot />
        <footer class="footer">
            <div class="container">
                <strong>&copy; Malang 2022</strong>
            </div>
        </footer>
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
