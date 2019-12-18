<template>
<div>
    <div class="container">
        <div class="row">
            
            <div class="col-md-12">
                <div class="card mt-5 mb-5 col-md-6">
                    <div class="card-header text-center">
                        <h3>Please Login</h3>
                        <h5 v-if="success" class="text-success">{{success}}</h5>
                    </div>
                    <div class="card-body">
                    <form @submit.prevent="login" method="post">
                        <div class="form-group">
                            <label>Email address</label>
                            <input v-model="form['email_address']" type="email" class="form-control" name="email_address" required>
                            <span v-if="error" class="text-danger">{{error}}</span>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input v-model="form['password']" type="password" class="form-control" name="password">
                            <span v-if="error.password" class="text-danger">{{error.password[0]}}</span>
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                    <router-link to="/user-register">Register Here</router-link>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
</template>

<script>
    export default {
        data() {
            return{
                form:[],
                error:'',
                success:''
            }
        },
        methods:{
            login(){
                this.success = '',
                this.error = '',
                axios.post('user-login',{
                    email_address: this.form.email_address,
                    password: this.form.password
                })
                .then((response)=>{
                    if (response.data =='Error') {
                        this.error = 'Invalid Credential'
                    }else{
                        //console.log(response)
                        this.success = 'Login Success'
                        this.form = []
                    }
                })
            }
        }
    }
</script>
