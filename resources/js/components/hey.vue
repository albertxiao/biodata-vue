<template>
	<div>        
        <div class="row">
            <div class="col-xl-4">
                <form @submit="add">
                    <input type="hidden" v-model="form.id">
                    <label for="">Nama</label>
                    <input type="text" v-model="form.nama" class="form-control">
                    <label for="">Alamat</label>
                    <input type="text" v-model="form.alamat" class="form-control">
                    <button class="btn btn-primary mt-2">Tambah Data</button>
                </form>
                    <button class="btn btn-secondary mt-2" @click="update(form)">Ubah Data</button>  
            </div>
            <div class="col-xl-8">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="data in datas">
                            <td>{{ data.nama }}</td>
                            <td>{{ data.alamat }}</td>
                            <td><button class="btn btn-danger" @click="del(data.id)">Hapus</button></td>
                            <td><button class="btn btn-warning" @click="edit(data.id)">Edit</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
	</div>
</template>

<script>
    import axios from 'axios';

    export default{
        name: 'App',
        data(){
            return{
                form: {
                    id: 0,
                    nama: '',
                    alamat: ''
                },
                id: 0,
                datas: []
            }
        },
        mounted(){
            this.load()
        },
        methods:{
            load(){
                axios.get('http://127.0.0.1:8000/api/test').then((res) => {
                    this.datas = res.data
                })
                .catch((err) => {
                    console.log(err)
                })
            },
            add(e){
                e.preventDefault()
                axios.post('http://127.0.0.1:8000/api/test/tambah/'+this.form.nama+'/'+this.form.alamat)
                .then((res) => {
                    this.load()
                    this.form.nama = ''
                    this.form.alamat = ''
                })
                .catch((err) => {
                    console.log(err)
                })
            },
            del(id){
                axios.delete('http://127.0.0.1:8000/api/test/'+id)
                .then((res) => {
                    this.load()
                    alert('deleted')
                })
                .catch((err) => {
                    console.log(err)
                })
            },
            edit(id){
                axios.get('http://127.0.0.1:8000/api/test/'+id)
                .then((res) => {
                    this.form.id = res.data.id
                    this.form.nama = res.data.nama
                    this.form.alamat = res.data.alamat
                })
                .catch((err) => {
                    console.log(err)
                })
            },
            update(form){
                if(this.form.nama == null){
                    alert("Please fill the form!")
                    return 0
                }
                axios.put('http://127.0.0.1:8000/api/test/'+form.id,{
                    nama: this.form.nama,
                    alamat: this.form.alamat
                })
                .then((res) => {
                    alert("Updated")
                    this.load()
                    this.form.nama = ''
                    this.form.alamat = ''                    
                })
                .catch((err) => {
                    console.log(err)
                })
            }
        }
    }
</script>