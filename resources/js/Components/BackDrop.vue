<template>
    <div
        class="offcanvas offcanvas-end"
        tabindex="-1"
        id="offcanvasWithBackdrop"
        aria-labelledby="offcanvasWithBackdropLabel"
    >
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasWithBackdropLabel">
                Offcanvas with backdrop
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
                Lorem ipsum dolor sit amet consectetur adipisicing elit. In
                magnam iusto iste quisquam corporis ipsum dolore recusandae,
                modi id facilis quis repellendus, eius dignissimos saepe maiores
                vel, earum error similique?
            </p>
        </div>
    </div>
</template>
<script>
export default {
    name: "BackDrop",
};
</script>
