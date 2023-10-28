<script setup>
import Button from "@/Components/Button.vue";
import Modal from "@/Components/Modal.vue";
import { ref } from "vue";

const props = defineProps({
    slug: String,
});

const thisModal = ref(null);
const showModal = () => {
    thisModal.value.show();
};
const closeModal = () => {
    thisModal.value.hide();
    // form.reset();
    // form.clearErrors();
};

const manualPay = () => {
    closeModal();
    window.location = route("nominal.donasi", { slug: props.slug });
};
</script>

<template>
    <div>
        <div class="d-grid gap-2">
            <Button @click.prevent="showModal">Donasi Sekarang</Button>
        </div>
        <Modal ref="thisModal" :dialog="'modal-md'">
            <template #body>
                <div class="d-flex justify-content-center gap-2">
                    <Button>Pembayaran Otomatis</Button>
                    <Button @click="manualPay">Pembayaran Manual</Button>
                </div>
            </template>
            <template #footer>
                <Button @click.prevent="closeModal">Close</Button>
            </template>
        </Modal>
    </div>
</template>

<style scoped></style>
