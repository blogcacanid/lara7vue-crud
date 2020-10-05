<template>
    <div class='container py-4'>
            <div class='col-md-6'>
                <div class='card'>
                    <div class='card-header'><h3>View Pegawai</h3></div>
                    <div class='card-body'>
                        <div class='form-group'>
                            <label htmlFor='nip'>NIP</label>
                            <input type="text" class="form-control" id="nip" v-model="pegawai.nip" disabled>
                        </div>
                        <div class='form-group'>
                            <label htmlFor='nama_pegawai'>Nama Pegawai</label>
                            <input type="text" class="form-control" id="nama_pegawai" v-model="pegawai.nama_pegawai" disabled>
                        </div>
                        <div class='form-group'>
                            <label htmlFor='alamat'>Alamat</label>
                            <textarea type="text" class="form-control" id="alamat" v-model="pegawai.alamat" rows="5" disabled></textarea>
                        </div>
                        <div class='form-group'>
                            <router-link :to="{ name: 'pegawai-list' }" class="btn btn-secondary">Back</router-link>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</template>
<script>
    export default {
        data(){
        return {
            pegawai:{},
        }
    },
    created() {
        let uri = `/api/pegawai/show/${this.$route.params.id}`;
        this.axios.get(uri).then((response) => {
            this.pegawai = response.data;
        });
    },
    method: {
 
    }
  }
</script>