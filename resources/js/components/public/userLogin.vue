<template>
<div>
    <div class="container">
        <div class="row">
            
            <div class="col-md-12">
                <div class="card mt-5 mb-5 col-md-6">
                    <div class="card-header text-center">
                        <h3>Please Login</h3>
                    </div>
                    <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" class="form-control" name="email_address">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password">
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
        mounted() {
            
        },
        methods:{
            login(){
                axios.post('user-login')
            }
        }
    }
</script>
