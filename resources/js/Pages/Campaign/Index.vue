<template>
    <Head title="Campaign" />
    <DashboardLayout>
        <div class="row">
            <div class="col-md-12">
                <div class="mt-5">
                    <div class="row d-flex justify-content-between mb-3">
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span
                                    class="input-group-text"
                                    id="inputGroup-sizing-default"
                                    >Search</span
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    aria-label="Sizing example input"
                                    aria-describedby="inputGroup-sizing-default"
                                    v-model="search"
                                    @keyup="searchCampaign"
                                    placeholder="cari disi berdasarkan title campaign"
                                />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="text-end">
                                <Link
                                    :href="route('campaign.create')"
                                    class="btn btn-primary"
                                    >Tambah Campaign</Link
                                >
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Relawan</th>
                                            <th>Tanggal</th>
                                            <th>Judul Campaign</th>
                                            <th>Status</th>
                                            <th>Jumlah</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr
                                            v-for="campaign in campaigns"
                                            :key="campaign"
                                        >
                                            <td>{{ campaign.user.name }}</td>
                                            <td>{{ campaign.expired }}</td>
                                            <td>{{ campaign.title }}</td>
                                            <td>
                                                <div
                                                    class="badge bg-primary"
                                                    v-if="campaign.status"
                                                >
                                                    Aktif
                                                </div>
                                                <div
                                                    class="badge bg-danger"
                                                    v-else
                                                >
                                                    Tidak Aktif
                                                </div>
                                            </td>
                                            <td>
                                                {{
                                                    totalTransaction(
                                                        campaign.transactions
                                                    )
                                                }}
                                            </td>
                                            <td>
                                                <Link
                                                    class="btn btn-primary btn-sm me-2"
                                                    :href="
                                                        route(
                                                            'campaign.edit',
                                                            campaign.id
                                                        )
                                                    "
                                                    >Edit</Link
                                                >
                                                <Link
                                                    class="btn btn-danger btn-sm"
                                                    :href="
                                                        route(
                                                            'campaign.destroy',
                                                            campaign.id
                                                        )
                                                    "
                                                    method="delete"
                                                    as="button"
                                                    type="button"
                                                    >Hapus</Link
                                                >
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                colspan="6"
                                                v-if="campaigns.length === 0"
                                            >
                                                <div
                                                    class="alert alert-danger border-0"
                                                    role="alert"
                                                >
                                                    Tidak data tidak ditemukan
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </DashboardLayout>
</template>
<script>
import DashboardLayout from "@/Layouts/DashboardLayout.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
export default {
    name: "CampaignIndex",
    props: {
        campaigns: Array,
        sumstr: Object,
    },
    data() {
        return {
            search: "",
        };
    },
    components: {
        DashboardLayout,
        Head,
        Link,
    },
    methods: {
        searchCampaign() {
            this.$inertia.replace(
                route("campaign.index", { search: this.search })
            );
        },
        totalTransaction(items) {
            let sum = 0;
            items.forEach((val) => {
                return (sum += val.nominal);
            });
            return sum;
        },
    },
};
</script>
