<template>
    <div>
        <form ref="form" @submit.prevent="createNote" enctype="multipart/form-data">
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" v-model="name"
                       name="name">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Surname</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" v-model="surname"
                       name="surname">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Patronymic</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" v-model="patronymic"
                       name="patronymic">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" v-model="email"
                       name="email">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Company</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" v-model="company"
                       name="company">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Phone</label>
                <input type="tel" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" v-model="phone"
                       name="phone">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Date of birth</label>
                <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" v-model="date_of_birth"
                       name="date_of_birth">
            </div>

            <div class="form-group">
                <label class="form-label" for="customFile">Image</label>
                <input type="file" class="form-control" id="customFile" name="photo" @change="handleFileObject"/>
            </div>

            <button class="btn btn-primary">Submit</button>
        </form>
    </div>
</template>

<script>
export default {
    data(){
        return {
            name: '',
            surname: '',
            patronymic: '',
            company: '',
            email: '2@gmail.com',
            phone: '',
            date_of_birth: '',
            photo: ''
        }
    },
    methods: {
        createNote(e) {
            const fd = new FormData(this.$refs.form)
            fd.append("photo", this.photo.files)
            this.photo = e.target.files
            console.log(e.target.files);
            axios.post('/api/v1/create/notebook',{
                name: this.name,
                surname: this.surname,
                patronymic: this.patronymic,
                company: this.company,
                email: this.email,
                phone: this.phone,
                date_of_birth: this.date_of_birth,
                data: {
                    photo: e.target.files
                }
            }).then(response =>{
                console.log(response)
            }).catch(error => {
                console.log("ERRRR:: ",error.response.data);
            });
        },
        handleFileObject(e){
            this.photo = e.target.files[0];
            console.log(this.photo)
        }
    }
}
</script>

