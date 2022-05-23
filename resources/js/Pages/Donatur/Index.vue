<template>
    <Head title="Donatur" />
    <DashboardLayout>
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
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
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
    </DashboardLayout>
</template>
<script>
import DashboardLayout from "@/Layouts/DashboardLayout.vue";
import { Head } from "@inertiajs/inertia-vue3";
export default {
    name: "DonaturIndex",
    components: {
        DashboardLayout,
        Head,
    },
};
</script>
