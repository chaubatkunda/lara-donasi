<template>
    <Head title="Nominal Donasi" />
    <app-layout>
        <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-md-4">
                    <div class="card shadow-lg border-0">
                        <img
                            :src="imagePreview"
                            class="card-img-top"
                            v-show="showPreview"
                        />
                        <div
                            class="card-header bg-primary text-center text-white fs-5"
                        >
                            Masukan Nominal Donasi
                        </div>
                        <div class="card-body">
                            <!-- <div class="list-group">
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
                            </div> -->

                            <form>
                                <div
                                    class="list-group d-grid gap-2 mx-auto mt-3"
                                >
                                    <div class="mb-2">
                                        <label for="image" class="form-label"
                                            >Bukti Transfer</label
                                        >
                                        <input
                                            type="file"
                                            class="form-control"
                                            id="image"
                                            @change="selectFile"
                                            @input="
                                                form.image =
                                                    $event.target.files[0]
                                            "
                                        />
                                    </div>
                                    <div class="mb-2">
                                        <div class="input-group input-group-lg">
                                            <span
                                                class="input-group-text"
                                                id="inputGroup-sizing-lg"
                                                >Rp</span
                                            >
                                            <input
                                                type="text"
                                                v-model="form.nominal"
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
                                    </div>
                                    <div class="mb-">
                                        <textarea
                                            v-model="form.description"
                                            class="form-control"
                                            placeholder="Description"
                                        ></textarea>
                                    </div>
                                    <button
                                        class="btn btn-primary"
                                        @click.prevent="pembayaranDonasi"
                                    >
                                        Donasi
                                    </button>
                                </div>
                            </form>
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
    props: {
        campaign: Object,
    },
    data() {
        return {
            form: this.$inertia.form({
                campaign_id: this.campaign.id,
                nominal: "",
                description: "",
                image: undefined,
            }),
            imagePreview: null,
            showPreview: false,
        };
    },
    components: {
        AppLayout,
        Head,
        Link,
    },
    methods: {
        pembayaranDonasi() {
            this.form.post(route("galang.checkout"), {
                onSuccess: () => {
                    this.form.reset();
                },
            });
        },
        selectFile(file) {
            const fil = file.target.files[0];
            let reader = new FileReader();
            reader.onload = (e) => {
                this.showPreview = true;
                this.imagePreview = e.target.result;
            };
            reader.readAsDataURL(fil);
        },
    },
};
</script>
