<template>
    <div class="container">
        <div class="row">
            <div class="offset-3 col-md-6">
                <div class="card mt-5">
                    <div class="card-header text-center">
                        <h3>Choose a Payment Method!</h3>
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="orderConfirm" method="post">
                            
                            <table class="table table-bordered">
                                <tr>
                                    <td>Cash on delivery</td>
                                    <td><input type="radio" v-model="type" name="payment_info" value="cash"></td>
                                </tr>
                                <tr>
                                    <td>Visa/Master Card</td>
                                    <td><input type="radio" v-model="type" name="payment_info" value="card"></td>
                                </tr>
                                <tr>
                                    <td>Bkash</td>
                                    <td><input type="radio" v-model="type" name="payment_info" value="bkash"></td>
                                </tr>
                                <tr>
                                    <td>Stripe</td>
                                    <td><input type="radio" v-model="type" name="payment_info" value="stripe"></td>
                                </tr>
                            </table>

                            <button type="submit" class="btn btn-primary">Confirm Order</button>
                        
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
                type:''
            }
        },
        mounted() {
            
        },
        methods:{
            orderConfirm(){
                axios.post('/confirm-order',{
                    type: this.type
                })
                .then((response)=>{
                    alert("Thanks for your order.");
                    this.$router.push('/');
                    this.$store.dispatch("countCart");
                })
            }
        }
    }
</script>
