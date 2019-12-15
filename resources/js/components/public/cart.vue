<template>
    <div>
        <!--================Cart Area =================-->
    <section class="cart_area">
      <div class="container">
        <div class="cart_inner">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Product</th>
                  <th scope="col">Price</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Total</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for='cart in showCartItem'>
                  <td>
                    <div class="media">
                      <div class="d-flex">
                        <img :src="`${cart.options.images}`" height="100px" alt="Product Image"/>
                      </div>
                      <div class="media-body">
                        <p>{{cart.name}}</p>
                      </div>
                    </div>
                  </td>
                  <td>
                    <h5>৳ {{cart.price}}</h5>
                  </td>
                  <td>
                    <div class="product_count">
                      <input type="number" name="qty" v-model="cart.qty" title="Quantity" class="input-text qty"/>
                    </div>
                  </td>
                  <td>
                    <h5>৳ {{cart.subtotal}}</h5>
                  </td>
                  <td>
                    <button class="btn btn-danger">X</button>
                  </td>
                </tr>
                
                <tr class="bottom_button">
                  <td>
                    <a class="gray_btn" href="#">Update Cart</a>
                  </td>
                  <td></td>
                  <td><h5>Subtotal</h5></td>
                  <td>
                    <h5>$2160.00</h5>
                  </td>
                  <td></td>
                </tr>
                <tr class="out_button_area">
                  <td></td>
                  <td></td>
                  <td></td>
                  
                  <td>
                    <div class="checkout_btn_inner">
                      <router-link class="gray_btn" to="/">Continue Shopping</router-link>
                      <a class="main_btn" href="#">Proceed to checkout</a>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
    <!--================End Cart Area =================-->
    </div>
</template>

<script>
    export default {
        name: "cart",
        
        mounted(){
          this.$store.dispatch("getCartItem")
        },
        computed: {
          showCartItem(){
            return this.$store.getters.getCartItem
          }
        }
    }
</script>
