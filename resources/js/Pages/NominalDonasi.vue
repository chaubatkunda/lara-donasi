<template>
    <Head title="Nominal Donasi" />
    <div class="card shadow-lg border-0">
        <img :src="imagePreview" class="card-img-top" v-show="showPreview" />
        <div class="card-header bg-primary text-center text-white fs-5">
            Masukan Nominal Donasi
        </div>
        <div class="card-body">
            <form>
                <div class="list-group d-grid gap-2 mx-auto mt-3">
                    <div class="mb-2">
                        <label for="image" class="form-label"
                            >Bukti Transfers</label
                        >
                        <input
                            accept="image/*"
                            type="file"
                            class="form-control"
                            id="image"
                            @change="selectFile"
                            @input="form.image = $event.target.files[0]"
                        />
                        <InputError :message="form.errors.image" />
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
                        <InputError :message="form.errors.nominal" />
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
</template>
<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import InputError from "@/Components/InputError.vue";

export default {
    name: "Home",
    components: { InputError },
    layout: AppLayout,
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
            midkey: process.env.MIX_MIDTRANS_CLIENT_KEY,
            data_midtrans: {
                transaction_details: {
                    order_id: "ORDER-101",
                    gross_amount: 10000,
                },
                customer_details: {
                    first_name: "TEST",
                    last_name: "MIDTRANSER",
                    email: "test@midtrans.com",
                    phone: "+628123456",
                    billing_address: {
                        first_name: "TEST",
                        last_name: "MIDTRANSER",
                        email: "test@midtrans.com",
                        phone: "081 2233 44-55",
                        address: "Sudirman",
                        city: "Jakarta",
                    },
                },
            },
        };
    },
    methods: {
        pembayaranDonasi() {
            this.form.post(route("galang.checkout"), {
                onSuccess: () => {
                    this.form.reset();
                    // consloe.log(response.data);
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

        pay() {
            // console.log(process.env.MIX_MIDTRANS_CLIENT_KEY);
        },
    },
};
</script>
