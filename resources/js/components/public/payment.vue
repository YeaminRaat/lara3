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
                                    <td><input type="radio" @click="isHidden==true" v-model="type" name="payment_info" value="cash"></td>
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

                            <button type="submit" v-if="type=='cash'" class="btn btn-primary">Confirm Order</button>
                        
                        </form>
                        <div v-if="type=='stripe'">
                             <form role="form" @submit.prevent="orderConfirm" action="" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="" id="payment-form">
                                <div class='form-row row'>
                                    <div class='col-xs-12 form-group required'>
                                        <label class='control-label'>Name on Card</label> 
                                        <input class='form-control' size='50' type='text'>
                                    </div>
                                </div>
  
                                <div class='form-row row'>
                                    <div class='col-xs-12 form-group required'>
                                        <label class='control-label'>Card Number</label> <input
                                            autocomplete='off' class='form-control card-number' size='50'
                                            type='text'>
                                    </div>
                                </div>
  
                                <div class='form-row row'>
                                    <div class='col-xs-12 col-md-4 form-group cvc required'>
                                        <label class='control-label'>CVC</label> <input autocomplete='off'
                                            class='form-control card-cvc' placeholder='ex. 311' size='4'
                                            type='text'>
                                    </div>
                                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                                        <label class='control-label'>Expiration Month</label> <input
                                            class='form-control card-expiry-month' placeholder='MM' size='2'
                                            type='text'>
                                    </div>
                                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                                        <label class='control-label'>Expiration Year</label> <input
                                            class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                            type='text'>
                                    </div>
                                </div>
  
                                <div class="row">
                                    <div class="col-xs-12">
                                        <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now {{showSubtotal}}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
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
                type:'',
                publishedKey: process.env.STRIPE_KEY,
            }
        },
        created: {
            showSubtotal(){
                return this.$store.getters.getCartSubtotal
            }
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
