import Homepage from './components/public/home'
import category from './components/public/category'
import singleProduct from './components/public/singleProduct'
import allCart from './components/public/cart'

export const routes = [
  { 
  	path: '/', 
  	component: Homepage 
  },
  { 
  	path: '/category/:id', 
  	component: category 
  },
  { 
  	path: '/single-product/:id', 
  	component: singleProduct 
  },
  { 
  	path: '/cart', 
  	component: allCart 
  }
]