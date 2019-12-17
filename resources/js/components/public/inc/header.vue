<template>
    <header class="header_area">
    <div class="top_menu">
      <div class="container">
        <div class="row">
          <div class="col-lg-7">
            <div class="float-left">
              <p>Phone: +880 1750 691974</p>
              <p>email: yeaminhossain2@gmail.com</p>
            </div>
          </div>
          <div class="col-lg-5">
            <div class="float-right">
              <ul class="right_side">
                <li>
                  <a href="#">
                    gift card
                  </a>
                </li>
                <li>
                  <a href="#">
                    track order
                  </a>
                </li>
                <li>
                  <a href="#">
                    Contact Us
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="main_menu">
      <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light w-100">
          <!-- Brand and toggle get grouped for better mobile display -->
          <a class="navbar-brand logo_h" href="#">
            <img src="" alt="" />
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse offset w-100" id="navbarSupportedContent">
            <div class="row w-100 mr-0">
              <div class="col-lg-7 pr-0">
                <ul class="nav navbar-nav center_nav pull-right">
                  <li class="nav-item active">
                    <router-link class="nav-link" to="/">Home</router-link>
                  </li>
                  <li class="nav-item submenu dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                      aria-expanded="false">Category</a>
                    <ul class="dropdown-menu">
                      <li class="nav-item" v-for="category in categories">
                        <router-link class="nav-link" :to="`/category/${category.id}`">{{category.cat_name}}</router-link>
                      </li>

                    </ul>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                  </li>
                </ul>
              </div>

              <div class="col-lg-5 pr-0">
                <ul class="nav navbar-nav navbar-right right_nav pull-right">
                  <li class="nav-item">
                    <a href="#" class="icons">
                      <i class="ti-search" aria-hidden="true"></i>
                    </a>
                  </li>

                  <li class="nav-item">
                    <router-link to="/cart" class="icons">
                      <i class="fas fa-shopping-cart"></i>
                      <span class="badge badge-notify" >{{showCountCart}}</span>
                    </router-link>
                    
                  </li>
                  <li class="nav-item">
                    <router-link to="/user-login" class="icons">
                      <i class="ti-user" aria-hidden="true"></i>
                    </router-link>
                  </li>

                  <li class="nav-item">
                    <a href="#" class="icons">
                      <i class="ti-heart" aria-hidden="true"></i>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </div>
  </header>
</template>

<script>
    export default {
      name: "header_area",
      data(){
            return{
                categories:[]
            }
        },
        created(){
          
            axios.get('/all-category')
                .then((response =>{
                    this.categories = response.data
                }))
        },
        mounted(){
          this.$Progress.start();
          this.$store.dispatch("countCart");
          this.$Progress.finish();
        },
        computed:{
          showCountCart(){
              return this.$store.getters.getCountCart
          }
        }
    }
</script>
