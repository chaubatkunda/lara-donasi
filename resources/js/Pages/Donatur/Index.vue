<template>
    <Head title="Donatur" />
    <div class="row">
        <div class="col-md-12">
            <div class="mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Telp</th>
                                        <th>Alamat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="(ttd, index) in transactions"
                                        :key="ttd.id"
                                    >
                                        <td>{{ index + 1 }}</td>
                                        <td>{{ ttd.user.name }}</td>
                                        <td>{{ ttd.user.email }}</td>
                                        <td>{{ ttd.user.telp }}</td>
                                        <td>{{ ttd.user.alamat }}</td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import DashboardLayout from "@/Layouts/DashboardLayout.vue";

export default {
    name: "DonaturIndex",
    layout: DashboardLayout,
    props: {
        transactions: {
            type: Array,
        },
    },
};
</script>
