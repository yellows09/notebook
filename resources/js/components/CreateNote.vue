<template>
    <div>
        <form>
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                       name="name">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Surname</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                       name="surname">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Patronymic</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                       name="patronymic">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                       name="email">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Company</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                       name="company">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Phone</label>
                <input type="tel" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                       name="phone">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Date of birth</label>
                <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                       name="date_of_birth">
            </div>

            <div class="form-group">
                <label class="form-label" for="customFile">Image</label>
                <input type="file" class="form-control" id="customFile" name="photo"/>
            </div>

            <button @click="createNote" class="btn btn-primary">Submit</button>
        </form>
    </div>
</template>

<script>
export default {
    methods: {
        createNote() {
            axios.post('/api/v1/create/notebook',{
                name: this.name
            })
        }
    }
}
</script>

