<template>
    <div>
        <h1>Список записей:</h1>
        <ul class="list-group" v-for="note in notes.data">
            <router-link :to="{name: 'ShowNote',params:{id: note.id}}">
                <li class="list-group-item"><b>И.Ф.О</b> {{ note.name }} {{ note.surname }} {{ note.patronymic }}
                    <b>Компания</b> {{ note.company }}
                    <b>Емаил</b> {{ note.email }}
                    <b>Номер телефона</b> {{ note.phone }}
                    <b>Дата рождения</b> {{ note.date_of_birth }}
                </li>
            </router-link>
        </ul>
    </div>
</template>

<script>
export default {
    data() {
        return {
            notes: []
        }
    },
    mounted() {
        axios.get('/api/v1/notebook').then(response => {
            this.notes = response.data
        })
    }
}
</script>

