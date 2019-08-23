<style scoped>
    .action-link {
        cursor: pointer;
    }
</style>

<template>
    <div>
        <div class="container">
            <div class="card card-default">
                <div class="card-header">Authorized Applications</div>
                <div class="row">
                    <div class="col-8">
                        <form>
                            <label for="name">Укажите имя:</label>
                            <input v-model="nam" class="form-control" type="text" id="name" name="user_name">
                            <p>Введенное имя {{ nam }}</p>
                            <label for="pass">Укажите пароль:</label>
                            <input v-model="pas" class="form-control" type="password" id="pass" name="user_password">
                            <p>Введенный пароль {{ pas }}</p>
                            <div class="btn btn-info btn-sm m-2 action-link" id="submit">Отправить</div>
                        </form>
                        {{ info }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        /*
         * The component's data.
         */
        data() {
            
            return {
                info: null
            };
            
        },
        mounted() {
            axios
                .get('http://localhost.ru:8080/')
                .then(response => (this.info = response));
        }
    }
</script>
