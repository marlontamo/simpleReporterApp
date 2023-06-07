<template>
    <div class="container">
        <div class="row">
            <div class="col-md-6"><h1>List of Subscribers</h1></div>
            <div class="col-md-6">
                <div class="row">
                   <div class="offset-md-5">
                    <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" @click="vwpdf" class="btn btn-primary">pdf preview</button>
                    <button type="button"  @click="dlpdf" class="btn btn-danger">download pdf</button>
                    <button type="button" @@click="exl" class="btn btn-success">excel export</button>
                    </div>
                     
                  </div>
                </div>
                 
            </div>
        </div>
         
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead class="thead-dark text-center">
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Subscription</th>
                        <th scope="col">action</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <tr v-for="user in users">
                        <td>{{ user.id }}</td>
                        <td>{{user.name}}</td>
                        <td>{{user.email}}</td>
                        <td>{{user.role}}</td>
                        <td>{{user.phone}}</td>
                        <td>{{ user.subscription }}</td>
                        <td class="text-center"> <div class="btn-group" role="group" aria-label="Basic example">
                            <!-- <button @click="edit(user.id)"  class="btn btn-warning">edit</button> -->
                            <button @click="view(user.id)"  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">view</button>
                            <button @click="del(user.id)"  class="btn btn-danger">unsubscribe</button>
  
                        </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>                         
       
          
            <modal :data="info"></modal>
            
                <hr />

                
</div>
            
    
</template>

<script>
import axios from 'axios';
    export default {
        data(){
            return{
                users :[],
                info:[],
                pass:[],
                show:false,
            }

        },
        created(){
          axios.get('http://localhost:8000/api/users')
          .then((res) => (this.users = res.data.data))
          .catch(function (error) 
          {
            console.log(error);
           });
        },
        methods:{
            edit : function(id){
                axios.get('http://localhost:8000/api/user/'+id)
                .then((res)=> (this.info = res.data.data))
                .catch(function (error) 
                {
                 console.log(error);
                 })
              

            },
            view: function(id){
                axios.get('http://localhost:8000/api/user/'+id)
                .then((res)=> (this.info = res.data.data))
                .catch(function (error) 
                {
                 console.log(error);
                 })
            },
            del: function(id){
                var user = confirm('are you sure you want to unscubscribe this user?');
                if(user){
                   
                    axios.delete('http://localhost:8000/api/user/'+id)
                .then((res)=> 
                 window.location.reload
                (console.log(res.data)))
                .catch(function (error) 
                {
                 console.log(error);
                 })
                }
                else{
                    alert('cancelled');
                }

                
            },
            cancelEdit: function(){
                this.show =false;
                console.log(this.show);
            },
            vwpdf: function(){
                window.location.href='http://localhost:8000/report/viewpdf';
            },
            dlpdf: function (){
                window.location.href='http://localhost:8000/report/dlusers';
            },
            exl: function(){
                alert('sorry!! not yet functioning because excel package error on my system, I will work on this soon!!');
            }

        }
    }
</script>
<style scoped>
code{
    background-color: #f00;
    color: #fff;
    padding: 5px 12px;
    border-radius: 3px;
}
</style>