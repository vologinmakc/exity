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
                            <label for="pass">Укажите пароль:</label>
                            <input v-model="pas" class="form-control" type="password" id="pass" name="user_password">
                            <div class="btn btn-primary" v-on:click="send()">Отправить</div>
                        </form>
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
                info: null,
                nam: '',
                pas: '',
            };
            
        },
        /*mounted() {
            axios
                .get('http://localhost.ru:8080/')
                .then(response => (this.info = response));
        }*/

        methods: {
            send(){
            axios
                //.post('http://localhost.ru:8080/oauth/authorize', this.nam + '/' + this.pas)
                .post('http://localhost.ru:8080/api/oauth/signin', 
                {
                    username: this.nam,
                    password: this.pas

                })
                //.then(response => (this.info = response, console.log(response)))
                .then(response => (this.info = response, this.$emit('login', {
                token: this.info.data.access_token
    }),this.$emit('remove') ))
                //.catch(error => (console.log(error)))
                .catch(error => (console.log(error)))
        }
        
        
    }
    }
</script>
