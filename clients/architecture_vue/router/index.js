import { createRouter, createWebHistory } from "vue-router";

const routes = [
    {path:'', redirect: "/clients"},
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

    //         {
    //             path:'groups',
    //             name: "Groups",
    //             component: GroupView //to change
    //         },

    //         {
    //             path:'roles',
    //             name: "Roles",
    //             component: RoleView //to change
    //         },

    //         {
    //             path:'permissions',
    //             name: "Permissions",
    //             component: PermissionView //to change
    //         },

    //         {
    //             path:'users',
    //             name: "Users",
    //             component: UserView, //to change
    //             // children :[{
    //             //     path: '',
    //             //     name: '',
    //             //     components: {
    //             //         default: UsersLookup,
    //             //     }
    //             // },

    //             //]
    //         },

    //     ]
    // },
    // {
    //     path:'/signout',
    //     name: "SignOut",
    //     component: SingOutView //to change
    // },

  
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
