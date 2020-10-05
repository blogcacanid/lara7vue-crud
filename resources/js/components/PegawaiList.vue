<template>
    <div class="row py-4">
        <div class="col-sm-12">
            <div class="card">
                <div class='card-header'><h3>Pegawai List</h3></div>
                <div class='card-body'>
                    <router-link :to="{ name: 'pegawai-add' }" class="btn btn-success">Add Record</router-link>
                    <br/>
                    <br/>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" style="font-style: Calibri;font-size:13px">
                            <thead>
                                <tr>
                                    <th width="200" class="text-center">Action</th>
                                    <th width="150">NIP</th>
                                    <th>Nama Pegawai</th>
                                    <th>Alamat</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(pegawai, index) in qRecord.data" :key="pegawai.pegawai_id">
                                    <td width="200" class="text-center">
                                        <div class="btn-group">
                                            <router-link :to="{name: 'pegawai-view', params: { id: pegawai.pegawai_id }}" class="btn btn-secondary">View</router-link>
                                            <router-link :to="{name: 'pegawai-edit', params: { id: pegawai.pegawai_id }}" class="btn btn-primary">Edit</router-link>
                                            <button class="btn btn-danger" @click = "deletePost(pegawai.pegawai_id)">Delete</button>
                                        </div>
                                    </td>
                                    <td>{{ pegawai.nip }}</td>
                                    <td>{{ pegawai.nama_pegawai }}</td>
                                    <td>{{ pegawai.alamat }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <pagination :data="qRecord" @pagination-change-page="getResults"></pagination>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
          qRecord: {}
        }
    },
    created() {
            this.getResults();
    },
    methods: {
        getResults(page){
            let uri = 'api/pegawais?page=' + page;
            this.axios.get(uri).then(response => {
                        return response.data;
                    }).then(data => {
                        this.qRecord = data;
                    });
        },
        deletePost(id)
        {
            this.$swal.fire({
                title: 'Delete Record',
                text: "Are you sure want to delete this record?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus Deh',
                cancelButtonText: 'Nggak Jadi'
                }).then((result) => {
                if (result.value) {
                    this.$swal.fire({
                        title: 'Success!',
                        text: 'Pegawai deleted successfully',
                        icon: 'success',
                        timer: 1000
                    });
                    let uri = `api/pegawai/delete/${id}`;
                    this.axios.delete(uri).then(response => {
                        this.qRecord.splice(this.qRecord.indexOf(id), 1);
                    });
                    console.log("Deleted record with id ..." +id);
                }
            })
        }
    }
  }
</script>