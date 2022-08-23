import { createRouter, createWebHistory } from "vue-router";
import middleware from "@grafikri/vue-middleware"

import ClientView from '../modules/dasboard/clients/views'
import UserView from '../modules/dasboard/users/views'
import RoleView from '../modules/dasboard/roles/views'
import PermisionView from '../modules/dasboard/permisions/views'
import GroupView from '../modules/dasboard/groups/views'

import DashboardView from '../views/dashboard.vue'

import AuthRouter from "../modules/auth/router";
import auth from './middleware/auth'
const routes = [
    {path:'', redirect: "/clients"},

    {
        path: "",
        name: "Dashboard",
        meta: {
            middleware: [auth.authenticaded]
        },
        component: DashboardView,
        children:[
            {
                path:'clients',
                name: "Clients",
                component: ClientView,
            },

            {
                path:'groups',
                name: "Groups",
                component: GroupView //to change
            },
        
            {
                path:'roles',
                name: "Roles",
                component: RoleView //to change
            },
        
            {
                path:'permisions',
                name: "Permisions",
                component: PermisionView //to change
            },
        
            {
                path:'users',
                name: "Users",
                component: UserView, //to change
                // children :[{
                //     path: '',
                //     name: '',
                //     components: {
                //         default: UsersLookup,
                //     }
                // },
        
                //]
            },
        ]
    },
    // {
    //     path: "",
    //     component:MainView,
    //     children:[
    //         {
    //             path:'clients',
    //             name: "Clients",
    //             component: ClientView,

    //             children :[{
    //                 path: '',
    //                 name: 'Lookup',
    //                 components: {
    //                     default: ClientsLookup,
    //                 }
    //             },
    //             // {
    //             //     path: 'more',
    //             //     name: 'MoreSetting',
    //             //     components: {
    //             //         MoreSetting,
    //             //     },
    //             //     props: route => ({ query: route.query.q }),
    //             // },

    //             ]
    //         },



   ...AuthRouter,

  
];

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes
})

router.beforeEach(middleware())

/*// rename title 
router.afterEach((to, from) =>{
    console.log(to, from)
    document.title = to.meta.title
    
})*/

// router.beforeEach((to, from, next) => {
//     document.title = `${to.meta.title} - ${process.env.APP_NAME}`
//     if(to.meta.middleware=="guest"){
//         if(store.state.auth.authenticated){
//             next({name:"dashboard"})
//         }
//         next()
//     }else{
//         if(store.state.auth.authenticated){
//             next()
//         }else{
//             next({name:"login"})
//         }
//     }
// })
export default router
