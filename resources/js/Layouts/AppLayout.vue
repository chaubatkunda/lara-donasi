<template>
    <div>
        <BackDrop />
        <Nav />
        <slot />
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
