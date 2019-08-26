<template>
<div>
    <div class="container-fluid navbar-inverse bg-inverse">
        <div class="row">
            <div class="col">
                <nav class="navbar">
                    <form class="form-inline d-flex justify-content-end">
                        <div>
                            <div class="btn btn-outline-success mr-3" v-on:click="send()">Streets</div>
                                {{info}}

                        </div>
                    </form>
                </nav>
            </div>
        </div>
    </div>
   
   <div class="container">
       <div class="row">
           <div class="col">
               <ClientComponent @login='onLogin' v-on:remove="clCom = '!receive'" v-if="clCom === 'receive'"></ClientComponent>
           </div>
       </div>
   </div>
</div>
</template>

<script>
import ClientComponent from './components/ClientComponent'
export default {
    
    name: 'app',
    data(){
        return{
            clCom: 'receive',
            tok:'',
            info: null
            
    }



        },   
     
    components:{
        ClientComponent
    },
    methods:{
        send(){
            /*axios.get('http://localhost.ru:8080/api/districts',auth).then(result => { 
                console.log(result)
        })*/
        axios({
        method: 'GET',
        url: 'http://localhost.ru:8080/api/districts',
        headers: { 'Authorization': 'Bearer ' + this.tok }
      }).then(result => { 
                this.info = result.data
        })
        },
        onLogin (data) {
    console.log('child component said login', this.tok=data.token)
  }
  
    }

}
</script>

<style lang='scss'>

</style>