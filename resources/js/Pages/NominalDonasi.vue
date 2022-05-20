<template>
    <Head title="Nominal Donasi" />
    <app-layout>
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
                                    Rp.20.000
                                </button>
                            </div>
                            <div class="list-group">
                                <button
                                    type="button"
                                    class="list-group-item list-group-item-action shadow-sm border-0 mb-3 border-top"
                                    aria-current="true"
                                >
                                    Rp.40.000
                                </button>
                            </div>
                            <div class="list-group">
                                <button
                                    type="button"
                                    class="list-group-item list-group-item-action shadow-sm border-0 mb-3 border-top"
                                    aria-current="true"
                                >
                                    Rp.60.000
                                </button>
                            </div>
                            <div class="list-group">
                                <button
                                    type="button"
                                    class="list-group-item list-group-item-action shadow-sm border-0 mb-3 border-top"
                                    aria-current="true"
                                >
                                    Rp.80.000
                                </button>
                            </div>
                            <div class="list-group">
                                <button
                                    type="button"
                                    class="list-group-item list-group-item-action shadow-sm border-0 mb-3 border-top"
                                    aria-current="true"
                                >
                                    Rp.100.000
                                </button>
                            </div>

                            <div class="list-group d-grid gap-2 mx-auto mt-3">
                                <form action="#" method="post">
                                    <div class="input-group input-group-lg">
                                        <span
                                            class="input-group-text"
                                            id="inputGroup-sizing-lg"
                                            >Rp</span
                                        >
                                        <input
                                            type="text"
                                            class="form-control"
                                            aria-label="Sizing example input"
                                            aria-describedby="inputGroup-sizing-lg"
                                            placeholder="0"
                                            autofocus
                                        />
                                    </div>
                                    <small class="text-secondary text-small"
                                        >Minimal Donasi Rp.10.000</small
                                    >
                                </form>
                                <Link
                                    :href="
                                        route(
                                            'nominal.donasi',
                                            'banjir-surabaya',
                                            'nominal'
                                        )
                                    "
                                    class="btn btn-primary"
                                    type="button"
                                >
                                    Lanjut Pembayaran
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
export default {
    name: "Home",
    components: {
        AppLayout,
        Head,
        Link,
    },
};
</script>
