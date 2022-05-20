<template>
    <div class="container">
        <div
            class="row justify-content-center vh-100 align-items-center d-flex"
        >
            <div class="col-md-5">
                <slot />
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: "GuestLayout",
};
</script>
