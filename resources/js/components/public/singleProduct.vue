<template>
<div>
  <!--================Single Product Area =================-->
  <div class="product_image_area">
    <div class="container">
      <div class="row s_product_inner">
        <div class="col-lg-6">
          <div class="s_product_img">
            <div
              id="carouselExampleIndicators"
              class="carousel slide"
              data-ride="carousel"
              >
              <ol class="carousel-indicators">
                <li
                  data-target="#carouselExampleIndicators"
                  data-slide-to="0"
                  class="active"
                  >
                  <img
                  :src="`${singleProduct.image}`"
                  alt="product image" class="w-100"
                  />
                </li>
                <li
                  data-target="#carouselExampleIndicators"
                  data-slide-to="1"
                  >
                  <img
                  :src="`${singleProduct.image}`"
                  alt="" class="w-100"
                  />
                </li>
                <li
                  data-target="#carouselExampleIndicators"
                  data-slide-to="2"
                  >
                  <img
                  :src="`${singleProduct.image}`"
                  alt="" class="w-100"
                  />
                </li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img
                  class="d-block w-100"
                  :src="`${singleProduct.image}`"
                  alt="First slide"
                  />
                </div>
                <div class="carousel-item">
                  <img
                  class="d-block w-100"
                  :src="`${singleProduct.image}`"
                  alt="Second slide"
                  />
                </div>
                <div class="carousel-item">
                  <img
                  class="d-block w-100"
                  :src="`${singleProduct.image}`"
                  alt="Third slide"
                  />
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5 offset-lg-1">
          <div class="s_product_text">
            <h3>{{singleProduct.product_name}}</h3>
            <span v-if="singleProduct.discount_price">
              <h2>৳ {{singleProduct.discount_price}}</h2>
              <del>৳ {{singleProduct.product_price}}</del>
            </span>
            <span v-else>
              <h2>৳ {{singleProduct.product_price}}</h2>
              
            </span>
            <ul class="list">
              <li>
                <router-link class="active" :to="`/category/${singleProduct.cat_id}`">
                <span>Category</span> : {{singleProduct.cat_name}}</router-link
                >
              </li>
              <li>
                <span>Availibility</span> : In Stock
              </li>
            </ul>
            <p>
              {{singleProduct.short_desc}}
            </p>
            <form method="post" @submit.prevent="addToCart">
              <div class="product_count">
                <label for="qty">Quantity:</label>
                <input type="number" name="qty" v-model="cartQty" value="1" title="Quantity" class="input-text qty"
                />
              </div>
              <div class="card_area">
                <input type="submit" class="main_btn" value="Add to Cart">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--================End Single Product Area =================-->
  <!--================Product Description Area =================-->
  <section class="product_description_area">
    <div class="container">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" ria-controls="home" aria-selected="true">Description</a
          >
        </li>
        <li class="nav-item">
          <a class="nav-link" id="profile-tab" data-toggle="tab"
            href="#profile"
            role="tab"
            aria-controls="profile"
            aria-selected="false"
          >Specification</a
          >
        </li>
        <li class="nav-item">
          <a
            class="nav-link"
            id="contact-tab"
            data-toggle="tab"
            href="#contact"
            role="tab"
            aria-controls="contact"
            aria-selected="false"
          >Comments</a
          >
        </li>
        <li class="nav-item">
          <a
            class="nav-link"
            id="review-tab"
            data-toggle="tab"
            href="#review"
            role="tab"
            aria-controls="review"
            aria-selected="false"
          >Reviews</a
          >
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div
          class="tab-pane fade show active"
          id="home"
          role="tabpanel"
          aria-labelledby="home-tab"
          >
          <p>
            {{singleProduct.long_desc}}
          </p>
        </div>
        <div
          class="tab-pane fade"
          id="profile"
          role="tabpanel"
          aria-labelledby="profile-tab"
          >
          <div class="table-responsive">
            
          </div>
        </div>
        <div
          class="tab-pane fade"
          id="contact"
          role="tabpanel"
          aria-labelledby="contact-tab"
          >
          <div class="row">
            <div class="col-lg-6">
              <div class="comment_list">
                <div class="review_item">
                  <div class="media">
                    <div class="d-flex">
                      <img
                      src="img/product/single-product/review-1.png"
                      alt=""
                      />
                    </div>
                    <div class="media-body">
                      <h4>Blake Ruiz</h4>
                      <h5>12th Feb, 2017 at 05:56 pm</h5>
                      <a class="reply_btn" href="#">Reply</a>
                    </div>
                  </div>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna
                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                    ullamco laboris nisi ut aliquip ex ea commodo
                  </p>
                </div>
                <div class="review_item reply">
                  <div class="media">
                    <div class="d-flex">
                      <img
                      src="img/product/single-product/review-2.png"
                      alt=""
                      />
                    </div>
                    <div class="media-body">
                      <h4>Blake Ruiz</h4>
                      <h5>12th Feb, 2017 at 05:56 pm</h5>
                      <a class="reply_btn" href="#">Reply</a>
                    </div>
                  </div>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna
                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                    ullamco laboris nisi ut aliquip ex ea commodo
                  </p>
                </div>
                <div class="review_item">
                  <div class="media">
                    <div class="d-flex">
                      <img
                      src="img/product/single-product/review-3.png"
                      alt=""
                      />
                    </div>
                    <div class="media-body">
                      <h4>Blake Ruiz</h4>
                      <h5>12th Feb, 2017 at 05:56 pm</h5>
                      <a class="reply_btn" href="#">Reply</a>
                    </div>
                  </div>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna
                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                    ullamco laboris nisi ut aliquip ex ea commodo
                  </p>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="review_box">
                <h4>Post a comment</h4>
                <form
                  class="row contact_form"
                  action="contact_process.php"
                  method="post"
                  id="contactForm1"
                  novalidate="novalidate"
                  >
                  <div class="col-md-12">
                    <div class="form-group">
                      <input
                      type="text"
                      class="form-control"
                      id="name1"
                      name="name"
                      placeholder="Your Full name"
                      />
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input
                      type="email"
                      class="form-control"
                      id="email1"
                      name="email"
                      placeholder="Email Address"
                      />
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input
                      type="text"
                      class="form-control"
                      id="number1"
                      name="number"
                      placeholder="Phone Number"
                      />
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <textarea
                      class="form-control"
                      name="message"
                      id="message1"
                      rows="1"
                      placeholder="Message"
                      ></textarea>
                    </div>
                  </div>
                  <div class="col-md-12 text-right">
                    <button
                    type="submit"
                    value="submit"
                    class="btn submit_btn"
                    >
                    Submit Now
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div
          class="tab-pane fade"
          id="review"
          role="tabpanel"
          aria-labelledby="review-tab"
          >
          <div class="row">
            <div class="col-lg-6">
              <div class="row total_rate">
                <div class="col-6">
                  <div class="box_total">
                    <h5>Overall</h5>
                    <h4>4.0</h4>
                    <h6>(03 Reviews)</h6>
                  </div>
                </div>
                <div class="col-6">
                  <div class="rating_list">
                    <h3>Based on 3 Reviews</h3>
                    <ul class="list">
                      <li>
                        <a href="#"
                          >5 Star
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i> 01</a
                        >
                      </li>
                      <li>
                        <a href="#"
                          >4 Star
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i> 01</a
                        >
                      </li>
                      <li>
                        <a href="#"
                          >3 Star
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i> 01</a
                        >
                      </li>
                      <li>
                        <a href="#"
                          >2 Star
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i> 01</a
                        >
                      </li>
                      <li>
                        <a href="#"
                          >1 Star
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i> 01</a
                        >
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="review_list">
                <div class="review_item">
                  <div class="media">
                    <div class="d-flex">
                      <img
                      src="img/product/single-product/review-1.png"
                      alt=""
                      />
                    </div>
                    <div class="media-body">
                      <h4>Blake Ruiz</h4>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                    </div>
                  </div>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna
                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                    ullamco laboris nisi ut aliquip ex ea commodo
                  </p>
                </div>
                <div class="review_item">
                  <div class="media">
                    <div class="d-flex">
                      <img
                      src="img/product/single-product/review-2.png"
                      alt=""
                      />
                    </div>
                    <div class="media-body">
                      <h4>Blake Ruiz</h4>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                    </div>
                  </div>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna
                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                    ullamco laboris nisi ut aliquip ex ea commodo
                  </p>
                </div>
                <div class="review_item">
                  <div class="media">
                    <div class="d-flex">
                      <img
                      src="img/product/single-product/review-3.png"
                      alt=""
                      />
                    </div>
                    <div class="media-body">
                      <h4>Blake Ruiz</h4>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                    </div>
                  </div>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna
                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                    ullamco laboris nisi ut aliquip ex ea commodo
                  </p>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="review_box">
                <h4>Add a Review</h4>
                <p>Your Rating:</p>
                <ul class="list">
                  <li>
                    <a href="#">
                      <i class="fa fa-star"></i>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-star"></i>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-star"></i>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-star"></i>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-star"></i>
                    </a>
                  </li>
                </ul>
                <p>Outstanding</p>
                <form
                  class="row contact_form"
                  action="contact_process.php"
                  method="post"
                  id="contactForm"
                  novalidate="novalidate"
                  >
                  <div class="col-md-12">
                    <div class="form-group">
                      <input
                      type="text"
                      class="form-control"
                      id="name"
                      name="name"
                      placeholder="Your Full name"
                      />
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input
                      type="email"
                      class="form-control"
                      id="email"
                      name="email"
                      placeholder="Email Address"
                      />
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input
                      type="text"
                      class="form-control"
                      id="number"
                      name="number"
                      placeholder="Phone Number"
                      />
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <textarea
                      class="form-control"
                      name="message"
                      id="message"
                      rows="1"
                      placeholder="Review"
                      ></textarea>
                    </div>
                  </div>
                  <div class="col-md-12 text-right">
                    <button
                    type="submit"
                    value="submit"
                    class="btn submit_btn"
                    >
                    Submit Now
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================End Product Description Area =================-->
</div>
</template>
<script>
export default {
name: "singleProduct",
data(){
return{
cartQty:'1',
id:''
}
},
mounted(){
this.$Progress.start();
this.$store.dispatch("getProducstbyId", this.$route.params.id)
this.$Progress.finish();
},
computed:{
singleProduct(){
return this.$store.getters.getSingleProduct
}
},
methods: {
addToCart(){
this.$Progress.start();
axios.post('/add-cart',{
qty: this.cartQty,
id: this.singleProduct.id
})
.then((response)=>{

this.$store.dispatch("getCartItem");
this.$store.dispatch("countCart");
this.$store.dispatch("getAllCarttotal");
this.$Progress.finish()
})
}
}
}
</script>