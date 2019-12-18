<template>
<div>
    <div class="container">
        <div class="row">
            
            <div class="col-md-12">
                <div class="card mt-5 mb-5 col-md-6">
                    <div class="card-header text-center">
                        <h3>Please Register</h3>
                        <h4 v-if="success" class="text-success">{{success}}</h4>
                    </div>
                    <div class="card-body">
                    <form @submit.prevent="register" method="post">
                        <div class="form-group">
                            <label>First Name</label>
                            <input v-model="form['first_name']" type="text" class="form-control" name="first_name">
                            <span v-if="error.first_name" class="text-danger">{{error.first_name[0]}}</span>
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input v-model="form['last_name']" type="text" class="form-control" name="last_name">
                            
                        </div>

                        <div class="form-group">
                            <label>Email Address</label>
                            <input v-model="form['email_address']" type="email" class="form-control" name="email_address">
                            <span v-if="error.email_address" class="text-danger">{{error.email_address[0]}}</span>
                        </div>

                        <div class="form-group">
                            <label>Phone Number</label>
                            <input v-model="form['phone_no']" type="text" class="form-control" name="phone_no">
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input v-model="form['password']" type="password" class="form-control" name="password">
                            <span v-if="error.password" class="text-danger">{{error.password[0]}}</span>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea v-model="form['address']" class="form-control" name="address"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Register</button>
                    </form>
                    <router-link to="/user-login">Login Here</router-link>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
</template>

<script>
    export default {
        name: "userRegister",
        data(){
            return{
                form:{},
                error:[],
                success:''
            }
        },
        mounted() {
            
        },
        methods: {
            register(){
                this.error = [],
                this.success = '',
                this.$Progress.start();
                axios.post('user-register',{
                    first_name: this.form.first_name,
                    last_name: this.form.last_name,
                    email_address: this.form.email_address,
                    phone_no: this.form.phone_no,
                    password: this.form.password,
                    address: this.form.address
                })
                .then((response)=>{
                    //console.log(response.data.errors)
                    //this.$router.push('/user-login')
                    this.success = 'Thanks For Registration. We have email you with password.'
                    this.form = []
                    this.$Progress.finish();
                })
                .catch((error)=>{
                    if (error.response.status == 422) {
                        this.error = error.response.data.errors
                        this.$Progress.finish();
                    }
                })
            }
        }
    }
</script>
