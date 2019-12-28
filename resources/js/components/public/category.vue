<template>
    <div>
    <!--================Category Product Area =================-->
    <section class="cat_product_area section_gap">
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <div class="left_sidebar_area">
              <aside class="left_widgets p_filter_widgets">
                <div class="l_w_title">
                  <h3>Browse Categories</h3>
                </div>
                <div class="widgets_inner">
                  <ul class="list">
                    <li v-for="category in showAllCategory">
                      <input type="checkbox" :id="category.id" v-model="cat" :value="category.id">
                      <label :for="category.id">{{category.cat_name}}</label>
                    </li>
                    
                  </ul>
                </div>
              </aside>

              <aside class="left_widgets p_filter_widgets">
                <div class="l_w_title">
                  <h3>Product Brand</h3>
                </div>
                <div class="widgets_inner">
                  <ul class="list">
                    <li v-for="brand in showAllBrands">
                      <input type="checkbox" :id="brand.id" v-model="bra" :value="brand.id">
                      <label :for="brand.id">{{brand.brand_name}}</label>
                    </li>
                    
                  </ul>
                </div>
              </aside>

              <aside class="left_widgets p_filter_widgets">
                <div class="l_w_title">
                  <h3>Price Filter</h3>
                </div>
                <div class="widgets_inner">
                  <div class="range_item">
                    <div id="slider-range"></div>
                    <div class="">
                      <label for="amount">Price : </label>
                      <input type="text" id="amount" />
                    </div>
                  </div>
                </div>
              </aside>
            </div>
          </div>

          <div class="col-lg-9">
            <div class="product_top_bar">
              <div class="left_dorp">
                <select class="sorting">
                  <option value="1">Default sorting</option>
                  <option value="2">Default sorting 01</option>
                  <option value="4">Default sorting 02</option>
                </select>
                <select class="show">
                  <option value="1">Show 12</option>
                  <option value="2">Show 14</option>
                  <option value="4">Show 16</option>
                </select>
              </div>
            </div>
            
            <div class="latest_product_inner">
              <div class="row">
                <div class="col-lg-4 col-md-6" v-for="catProduct in showCatProduct">
                  <div class="single-product">
                    <div class="product-img">
                      <img class="card-img" :src="`${catProduct.image}`" alt="" />
                      <div class="p_icon">
                        <router-link :to="`/single-product/${catProduct.id}`">
                          <i class="ti-eye"></i>
                        </router-link>
                        <a href="#">
                          <i class="ti-heart"></i>
                        </a>
                        <button @click.prevent="addToCart(catProduct.id)">
                          <i class="ti-shopping-cart"></i>
                        </button>
                      </div>
                    </div>
                    <div class="product-btm">
                      <router-link :to="`/single-product/${catProduct.id}`">
                        <h4>{{catProduct.product_name}}</h4>
                      </router-link>
                      <div class="mt-3" v-if="catProduct.discount_price">
                        <span class="mr-4">৳ {{catProduct.discount_price}}</span>
                        <del>৳ {{catProduct.product_price}}</del>
                      </div>
                      <div class="mt-3" v-else>
                        <span class="mr-4">৳{{catProduct.product_price}}</span>
                        
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>
    <!--================End Category Product Area =================-->
    </div>
</template>

<script>
    export default {
        data(){
          return{
            cat:[],
            bra:[]
          }
        },
        mounted(){
              this.$Progress.start();
              this.$store.dispatch("categoryByID", this.$route.params.id)
              this.$store.dispatch("category")
              this.$store.dispatch("brand")
              this.$Progress.finish();
        },
        methods: {
            gProduct(){
              this.$store.dispatch("categoryByID", this.$route.params.id)
            },
            addToCart(id){
                this.$Progress.start();
                axios.post('/add-cart',{
                    id: id
                })
                    .then((response)=>{
                        this.$store.dispatch("countCart")
                        this.$Progress.finish();
                    })
            },
            checkboxSearch(){
              axios.post('/search-checkbox',{
                category: this.cat,
                brand: this.bra
              })
              .then((response)=>{
                //console.log(response.data.multiProduct)
              })
            }
        },
        computed: {
            showCatProduct(){
                return this.$store.getters.getCatProduct
            },
            showAllCategory(){
                return this.$store.getters.getCategory
            },
            showAllBrands(){
                return this.$store.getters.getBrand
            }
        },
        watch: {
          $route(to,from){
            this.$Progress.start();
            this.gProduct();
            this.$Progress.finish();
          },
          /*cat(after,before){
            this.checkboxSearch();
          }*/
        }
    }
</script>
