import Homepage from './components/public/home'
import category from './components/public/category'
import singleProduct from './components/public/singleProduct'
import allCart from './components/public/cart'
import userLoginPage from './components/public/userLogin'
import userRegisterPage from './components/public/userRegister'
import shipping from './components/public/shipping'
import payment from './components/public/payment'

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
  },
  { 
    path: '/user-login', 
    component: userLoginPage
  },
  { 
    path: '/user-register', 
    component: userRegisterPage
  },
  { 
    path: '/shipping', 
    component: shipping
  },
  { 
    path: '/payment', 
    component: payment
  }
]