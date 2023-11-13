import { createWebHistory, createRouter } from "vue-router";

import Login from '../pages/Login.vue';
import Pos from '../pages/Pos.vue';
import Register from '../pages/Register.vue';
import Report from '../pages/Report.vue';
import Store from '../pages/Store.vue';
import Transection from '../pages/Transection.vue';
import Nopag from '../pages/Nopag.vue';

import { useStore } from "../Store/auth";

// middllew ກວດສອບຂໍ້ມູນການເຂົ້າລະບົບ

const authMiddllew = ( to, from, next) => {
    const token = localStorage.getItem('web_token');
    const user = localStorage.getItem('web_user');
    const store = useStore();

    if(!token){
        next({
            path: '/login',
            replace: true
        })
    } else {
        // ຂຽນຂໍ້ມູນເຂົ້າ pinia
        store.set_token(token);
        store.set_user(user);
        next();
    }
}


// middllew ກວດສອບຂໍ້ມູນການເຂົ້າລະບົບ

export const routes = [
    {
        path:'/',
        redirect:'/store'
    },
    {
        name: 'login',
        path: '/login',
        component: Login
    },

    {
        name: 'pos',
        path: '/pos',
        component: Pos,
        meta: {
            middleware: [authMiddllew]
        }
    },

    {
        name: 'register',
        path: '/register',
        component: Register,
        
    },

    {
        name: 'report',
        path: '/report',
        component: Report,
        meta: {
            middleware: [authMiddllew]
        }
    },

    {
        name: 'store',
        path: '/store',
        component: Store,
        meta: {
            middleware: [authMiddllew]
        }
    },

    {
        name: 'transection',
        path: '/transection',
        component: Transection,
        meta: {
            middleware: [authMiddllew]
        }
    },

    {
        name: 'nopag',
        path: '/:pathMactch(.*)*',
        component: Nopag
    },
];

const router = createRouter({
history: createWebHistory (),
routes: routes,
scrollBehavior() {
    window.scrollTo(0,0)
}
});

 router.beforeEach((to,from,next)=>{
     const token = localStorage.getItem('web_token');

     if(to.meta.middleware){
         to.meta.middleware.forEach(middleware => middleware(to, from, next))
     } else{
         if(to.path == '/login' || to.path == '/'){
             if(token){
                 next({
                     path: '/store',
                   replace: true
                })
             } else {
                 next();
             }
         } else {
                  next();
         }      
     }
 });

export default router;