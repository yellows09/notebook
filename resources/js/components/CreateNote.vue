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
            email: '',
            phone: '',
            date_of_birth: '',
            photo: ''
        }
    },
    methods: {
        createNote() {
            axios.post('/api/v1/create/notebook',{
                name: this.name,
                surname: this.surname,
                patronymic: this.patronymic,
                company: this.company,
                email: this.email,
                phone: this.phone,
                date_of_birth: this.date_of_birth,
            }).then(response =>{
                console.log(response)
            }).catch(error => {
                console.log("ERRRR:: ",error.response.data);
            });
        },
    }
}
</script>

