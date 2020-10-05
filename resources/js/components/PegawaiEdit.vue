<template>
    <div class='container py-4'>
            <div class='col-md-6'>
                <div class='card'>
                    <div class='card-header'><h3>Edit Pegawai</h3></div>
                    <div class='card-body'>
                        <div class="alert alert-danger" v-if="errors.length">
                            <b>Terdapat kesalahan dalam input data:</b>
                            <ul>
                                <li v-for="error in errors" :key="error">{{ error }}</li>
                            </ul>
                        </div>
 
                        <form @submit.prevent="updatePegawai">
                            <div class='form-group'>
                                <label htmlFor='nip'>NIP</label>
                                <input type="text" class="form-control" id="nip" v-model="pegawai.nip">
                            </div>
                            <div class='form-group'>
                                <label htmlFor='nama_pegawai'>Nama Pegawai</label>
                                <input type="text" class="form-control" id="nama_pegawai" v-model="pegawai.nama_pegawai">
                            </div>
                            <div class='form-group'>
                                <label htmlFor='alamat'>Alamat</label>
                                <textarea type="text" class="form-control" id="alamat" v-model="pegawai.alamat" rows="5"></textarea>
                            </div>
                            <div class='form-group'>
                                <router-link :to="{ name: 'pegawai-list' }" class="btn btn-secondary">Back</router-link>
                                &nbsp;
                                &nbsp;
                                <button class='btn btn-primary'>Update</button>
                            </div>
                        </form>
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
            errors: [],
            nip: null,
            nama_pegawai: null,
            alamat: null,
        }
    },
    created() {
        let uri = `/api/pegawai/edit/${this.$route.params.id}`;
        this.axios.get(uri).then((response) => {
            this.pegawai = response.data;
        });
    },
    methods: {
        updatePegawai(e){
             
            if (this.$data.pegawai.nip != null && this.$data.pegawai.nama_pegawai != null && this.$data.pegawai.alamat != null) {
                 
                this.$swal.fire({
                    title: 'Success',
                    text: "Pegawai created successfully",
                    icon: 'success',
                    timer: 1000
                });
                let uri = `/api/pegawai/update/${this.$route.params.id}`;
                this.axios.put(uri, this.pegawai).then((response) => {
                    this.$router.push({name: 'pegawai-list'});
                });
                return true;
            }
 
 
            this.errors = [];
 
            if (!this.nip) {
                this.errors.push('NIP wajib diisi !');
            }
            if (!this.nama_pegawai) {
                this.errors.push('Nama Pegawai wajib diisi !');
            }
            if (!this.alamat) {
               this.errors.push('Alamat wajib diisi !');
            }

            e.preventDefault();
        }
    }
  }
</script>
