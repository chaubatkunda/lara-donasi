<template>
    <div
        class="offcanvas offcanvas-end"
        tabindex="-1"
        id="offcanvasWithBackdrop"
        aria-labelledby="offcanvasWithBackdropLabel"
    >
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasWithBackdropLabel">
                Lara Donasi
            </h5>
            <button
                type="button"
                class="btn-close text-reset"
                data-bs-dismiss="offcanvas"
                aria-label="Close"
            ></button>
        </div>
        <div class="offcanvas-body">
            <p>
                Terima kasih telah berdonasi, selalu dibarikan kesehatan yang
                baik sama yang Maha Kuasa
            </p>
        </div>
    </div>
</template>
<script>
export default {
    name: "BackDrop",
};
</script>
