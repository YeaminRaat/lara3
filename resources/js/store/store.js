export default {
  state: {
		categories: [],
    brands: [],
    featuredProducts: [],
    newProducts: [],
    catProducts: [],
    singleProducts: [],
    cartProduct: [],
    countCart: [],
    subtotalCart: [],
    customerSession:[],
    productComment:[]
  },

  getters: {
    getCategory(state){
  		return state.categories
  	},
    getBrand(state){
      return state.brands
    },
    getfeaturedProduct(state){
      return state.featuredProducts
    },
    getNewProduct(state){
      return state.newProducts
    },
    getCatProduct(state){
      return state.catProducts
    },
    getSingleProduct(state){
      return state.singleProducts
    },
    getCartItem(state){
      return state.cartProduct
    },
    getCountCart(state){
      return state.countCart
    },
    getCartSubtotal(state){
      return state.subtotalCart
    },
    getSessionData(state){
      return state.customerSession
    },
    getCommentData(state){
      return state.productComment
    }
  },

  actions: {
    category(context){
      axios.get('/all-category')
          .then((response) =>{
            //console.log(response.data)
            context.commit("allCategory", response.data)
          })
    },
    brand(context){
      axios.get('/all-brand')
          .then((response) =>{
            //console.log(response.data)
            context.commit("allBrand", response.data)
          })
    },
    featuredProduct(context){
      axios.get('/featured-product')
          .then((response) =>{
            //console.log(response.data)
            context.commit("featureProducts", response.data)
          })
    },
    newProduct(context){
      axios.get('/new-product')
          .then((response) =>{
            //console.log(response.data)
            context.commit("getNewProduct", response.data)
          })
    },
    categoryByID(context, payload){
      axios.get('/category/'+ payload)
          .then((response) =>{
            //console.log(response.data)
            context.commit("getProductbyId", response.data)
          })
    },
    getProducstbyId(context, payload){
      axios.get('/product-details/'+ payload)
          .then((response) =>{
            //console.log(response.data)
            context.commit("getSingleProduct", response.data)
          })
    },
    getCartItem(context){
      axios.get('/all-cart')
          .then((response) =>{
            //console.log(response.data.cart)
            context.commit("allCartItem", response.data.cart)
          })
    },
    countCart(context){
      axios.get('/all-cart')
          .then((response) =>{
            //console.log(response.data.cart)
            context.commit("countCartItem", response.data.count_cart)
          })
    },
    getAllCarttotal(context){
      axios.get('/all-cart')
          .then((response) =>{
            //console.log(response.data.cart)
            context.commit("allCarttotal", response.data.subtotal)
          })
    },
    customerSession(context){
      axios.get('/customer-session')
          .then((response)=>{
            //console.log(response.data.s_customer)
            context.commit("sessionData", response.data.s_customer)
          })
    },
    getProductComment(context, payload){
      axios.get('/product-comment/'+ payload)
          .then((response)=>{
            //console.log(response.data)
            context.commit("commentData", response.data)
          })
    }
  },

	mutations: {
    allCategory(state, data){
      return state.categories = data
    },
    allBrand(state, data){
      return state.brands = data
    },
    featureProducts(state, data){
      return state.featuredProducts = data
    },
    getNewProduct(state, data){
      return state.newProducts = data
    },
    getProductbyId(state, data){
      return state.catProducts = data
    },
    getSingleProduct(state, data){
      return state.singleProducts = data
    },
    allCartItem(state, data){
      return state.cartProduct = data
    },
    countCartItem(state, data){
      return state.countCart = data
    },
    allCarttotal(state, data){
      return state.subtotalCart = data
    },
    sessionData(state, data){
      return state.customerSession = data
    },
    commentData(state, data){
      return state.productComment = data
    }
  }
}