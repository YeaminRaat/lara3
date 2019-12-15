export default {
  state: {
		featuredProducts: [],
    newProducts: [],
    catProducts: [],
    singleProducts: [],
    cartProduct: []
  },

  getters: {
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
    }
  },

  actions: {
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
            //console.log(response.data)
            context.commit("allCartItem", response.data)
          })
    }
  },

	mutations: {
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
    }
  }
}