<template>
    <div class="container">
        <div class="row">
            <div class="offset-3 col-md-6">
                <div class="card mt-5">
                    <div class="card-header text-center">
                        <h3>{{showSession.first_name}}, Give your shipping info!</h3>
                    </div>
                    <div class="card-body">
                        <button type="button" @click.prevent="getDefault" class="btn btn-primary">Your address</button>
                        <button type="button" @click.prevent="clearDefault" class="btn btn-primary">Clear form</button>
                        <form @submit.prevent="shippingInfo" method="post">
                            
                            <div class="form-group">
                                <label>Full name</label>
                                <input type="text" v-model="full_name" class="form-control" name="full_name" required>
                            </div>
                            <div class="form-group">
                                <label>Email address</label>
                                <input type="email" v-model="email" class="form-control" name="email_address" required>
                            </div>
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="text" v-model="number" class="form-control" name="phone_no" required>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" v-model="address" class="form-control" name="address" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Confirm Shipping Info</button>
                        
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                full_name:'',
                email:'',
                number:'',
                address:''
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        computed:{
            showSession(){
              return this.$store.getters.getSessionData
          }
        },
        methods:{
            getDefault(){
                this.full_name = this.showSession.first_name+' '+this.showSession.last_name
                this.email = this.showSession.email_address
                this.number = this.showSession.phone_no
                this.address = this.showSession.address
            },
            clearDefault(){
                this.full_name = '',
                this.email = '',
                this.number = '',
                this.address = ''
            },
            shippingInfo(){
                axios.post('/shipping-info',{
                    full_name: this.full_name,
                    email: this.email,
                    number: this.number,
                    address: this.address
                })
                .then((response)=>{
                    this.$router.push('/payment')
                })
            }
        }
    }
</script>
