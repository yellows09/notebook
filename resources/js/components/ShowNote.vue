<template>
    <div>
        <h2>Запись:</h2>
        <b>Имя</b> {{ note.name }}<br>
        <b>Фамилия</b> {{ note.surname }}<br>
        <b>Отчество </b>{{ note.patronymic }} <br>
        <b>Номер телефона</b> {{ note.phone }}<br>
        <b>Почта</b> {{ note.email }} <br>
        <b>Компания</b> {{ note.company }} <br> <br>
        <form>
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                       v-model="note.name" @blur="changeNote"
                       name="name">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Surname</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                       v-model="note.surname" @blur="changeNote"
                       name="surname">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Patronymic</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                       v-model="note.patronymic" @blur="changeNote"
                       name="patronymic">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                       v-model="note.email" @blur="changeNote"
                       name="email">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Company</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                       v-model="note.company" @blur="changeNote"
                       name="company">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Phone</label>
                <input type="tel" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                       v-model="note.phone" @blur="changeNote"
                       name="phone">
            </div>
        </form>
        <div>
            <button type="button" class="btn btn-danger" @click="deleteNote">Удалить запись</button>
        </div>
    </div>
</template>

<script>
export default {
    props: [
        'id'
    ],
    data() {
        return {
            note: []
        }
    },
    methods: {
        changeNote() {
            axios.post('/api/v1/update/notebook/' + this.id, {
                headers: {
                    'X-CSRF-TOKEN': document.getElementById("post_token").getAttribute("content") // запрос который содержит ваш токен
                },
                _method: 'POST',
                name: this.note.name,
                surname: this.note.surname,
                patronymic: this.note.patronymic,
                email: this.note.email,
                company: this.note.company,
            }).then(response => {
                console.log(response)
            });
        },
        deleteNote() {
            axios.post('/api/v1/delete/notebook/' + this.id, {
                _method: 'DELETE'
            }).then(data => {
                this.$router.replace({ name: "notebook" });
            });
        }
    },
    mounted() {
        axios.get('/api/v1/show/notebook/' + this.id).then(response => {
            this.note = response.data.data
        })
    }
}
</script>

