<script setup>
import { onMounted, ref } from "vue";
import { Modal } from "bootstrap";

defineProps({
    title: {
        type: String,
    },
    dialog: { type: String },
});
let modalEle = ref(null);
let thisModalObj = null;

onMounted(() => {
    thisModalObj = new Modal(modalEle.value);
});

function _show() {
    thisModalObj.show();
}

function _close() {
    thisModalObj.hide();
}

defineExpose({ show: _show, hide: _close });
</script>

<template>
    <div
        class="modal fade"
        id="exampleModal"
        tabindex="-1"
        aria-labelledby=""
        aria-hidden="true"
        ref="modalEle"
        data-bs-backdrop="static"
    >
        <div class="modal-dialog modal-dialog-centered" :class="dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5
                        class="modal-title fw-bold title-sub"
                        id="exampleModalLabel"
                    >
                        {{ title }}
                    </h5>
                </div>
                <div class="modal-body">
                    <slot name="body" />
                </div>
                <div class="modal-footer">
                    <slot name="footer" />
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped></style>
