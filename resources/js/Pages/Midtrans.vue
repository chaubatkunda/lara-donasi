<template>
    <Head title="Nominal Donasi" />
    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-center text-white fs-5">
            Masukan Nominal Donasi
        </div>
        <div class="card-body">
            <div class="mb-2">
                <input type="text" class="form-control" v-model="price" />
            </div>
            <form>
                <div class="list-group d-grid gap-2 mx-auto mt-3">
                    <button
                        type="button"
                        @click.prevent="payDonate"
                        class="btn btn-primary"
                    >
                        Bayar
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>
<script>
import ListLayout from "@/Layouts/ListLayout.vue";

export default {
    layout: ListLayout,
    props: {
        transaksi: Object,
    },
    data() {
        return {
            price: this.transaksi.nominal,
        };
    },

    methods: {
        payDonate() {
            snap.pay(this.transaksi.url_pay, {
                onSuccess: (res) => {
                    console.log(res);
                },
                onPending: (res) => {
                    console.log(res);
                },
                onError: (res) => {
                    console.log(res);
                },
                onClose: () => {
                    console.log("Close");
                },
            });
        },
    },
};
</script>
