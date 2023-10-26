<template>
    <Head title="Nominal Donasi" />
    <AppLayout>
        <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-md-4">
                    <div class="card shadow-lg border-0">
                        <div
                            class="card-header bg-primary text-center text-white fs-5"
                        >
                            Masukan Nominal Donasi
                        </div>
                        <div class="card-body">
                            <div class="list-group">
                                <button
                                    type="button"
                                    class="list-group-item list-group-item-action shadow-sm border-0 mb-3 border-top"
                                    aria-current="true"
                                >
                                    Rp.{{ transaksi.nominal }}
                                </button>
                            </div>
                            <form>
                                <div
                                    class="list-group d-grid gap-2 mx-auto mt-3"
                                >
                                    <!-- <Link
                                        class="btn btn-primary"
                                        target="_blank"
                                        :href="transaksi.url_pay"
                                    >
                                        Bayar
                                    </Link> -->
                                    <button
                                        type="button"
                                        class="btn btn-primary"
                                        @click="pay(transaksi.url_pay)"
                                    >
                                        Bayar
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
<script>
import { Head, Link } from "@inertiajs/inertia-vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
export default {
    props: {
        transaksi: Object,
    },
    data: () => ({
        // midkey: process.env.MIX_MIDTRANS_CLIENT_KEY,
    }),
    components: {
        Head,
        Link,
        AppLayout,
    },
    methods: {
        pay(url) {
            snap.pay(url, {
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
