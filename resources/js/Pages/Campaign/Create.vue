<template>
    <Head title="Create Campaign" />
    <div class="row">
        <div class="col-md-6">
            <div class="mt-5">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <form action="#" method="post" autocomplete="off">
                            <div class="mb-2">
                                <label for="title" class="form-label"
                                    >Title</label
                                >
                                <input
                                    type="text"
                                    v-model="form.title"
                                    id="title"
                                    class="form-control"
                                />
                                <small
                                    class="text-danger"
                                    v-if="errors.title"
                                    >{{ errors.title }}</small
                                >
                            </div>
                            <div class="mb-2">
                                <label for="description" class="form-label"
                                    >Description</label
                                >
                                <textarea
                                    v-model="form.description"
                                    class="form-control"
                                    id="description"
                                ></textarea>
                                <small
                                    class="text-danger"
                                    v-if="errors.description"
                                    >{{ errors.description }}</small
                                >
                            </div>
                            <div class="mb-2">
                                <label for="image" class="form-label"
                                    >Image</label
                                >
                                <input
                                    type="file"
                                    show-size
                                    @change="selectFile"
                                    @input="form.image = $event.target.files[0]"
                                    id="image"
                                    class="form-control"
                                />
                                <small
                                    class="text-danger"
                                    v-if="errors.image"
                                    >{{ errors.image }}</small
                                >
                            </div>
                            <div class="mb-2">
                                <label for="tanggal" class="form-label"
                                    >Tanggal</label
                                >
                                <input
                                    type="date"
                                    v-model="form.expired"
                                    id="tanggal"
                                    class="form-control"
                                />
                                <small
                                    class="text-danger"
                                    v-if="errors.expired"
                                    >{{ errors.expired }}</small
                                >
                            </div>
                            <div class="mb-2">
                                <button
                                    class="btn btn-primary"
                                    @click.prevent="store"
                                >
                                    Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <img :src="imagePreview" class="img-fluid" v-show="showPreview" />
        </div>
    </div>
</template>
<script>
import DashboardLayout from "@/Layouts/DashboardLayout.vue";

export default {
    name: "CampaignCreate",
    layout: DashboardLayout,
    props: {
        errors: Object,
    },
    data() {
        return {
            form: this.$inertia.form({
                title: "",
                description: "",
                image: undefined,
                expired: "",
            }),
            imagePreview: null,
            showPreview: false,
        };
    },
    methods: {
        store() {
            this.form.post(route("campaign.store"), {
                onSuccess: () => this.form.reset(),
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
