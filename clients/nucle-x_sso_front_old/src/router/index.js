import { createRouter, createWebHistory } from "vue-router";

//import middleware from "@grafikri/vue-middleware";

//import App from '../App.vue'

import MainView from '../views'

import ClientView from "../views/client.view.vue";

import UserView from "../views/user.view.vue"

import GroupView from "../views/group.view.vue"

import RoleView from "../views/role.view.vue"

import PermissionView from "../views/permission.view.vue"

import SingOutView from "../views/Auth/signOut.view.vue"

import ClientsLookup from "../components/Modules/Clients"

//import UsersLookup from "../components/Modules/users"

//import MoreSetting from "../components/Modules/Clients/views/MoreSetting.vue"


const routes = [
    {path:'', redirect: "/clients"},
    {
        path: "",
        component:MainView,
        children:[
            {
                path:'clients',
                name: "Clients",
                component: ClientView,

                children :[{
                    path: '',
                    name: 'Lookup',
                    components: {
                        default: ClientsLookup,
                    }
                },
                // {
                //     path: 'more',
                //     name: 'MoreSetting',
                //     components: {
                //         MoreSetting,
                //     },
                //     props: route => ({ query: route.query.q }),
                // },

                ]
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
                path:'permissions',
                name: "Permissions",
                component: PermissionView //to change
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
    {
        path:'/signout',
        name: "SignOut",
        component: SingOutView //to change
    },

    // {
    //     path: "/clients",
    //     beforeEnter: [callAlert],
    //     component: ClientView,
    //     name: "Client",
    //     children: [
    //         {
    //             path: "lookups",
    //             name: "Lookup",
    //             components:{
    //                 default: Lookup
    //             }
    //         }
            
    //     ]
    // }
];

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes
})

//router.beforeEach(middleware({store}))

/*// rename title 
router.afterEach((to, from) =>{
    console.log(to, from)
    document.title = to.meta.title
    
})*/
export default router
