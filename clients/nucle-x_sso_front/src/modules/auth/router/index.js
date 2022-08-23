import auth from '../../../router/middleware/auth'

const LogoutView  = () => import('../views/logout.vue')
const LoginView = () => import('../views/login.vue')
const RegisterView = () => import('../views/register.vue')
const ForgotPasswordView = () => import('../views/forgotPassword.vue')

const AuthRouter = [
    {
        path:'/login',
        name: "Login",
        component: LoginView, //to change
        meta: {
            middleware: [auth.redirectIfAuthenticated],
          },
    },

    {
        path:'/logout',
        name: "Logout",
        component: LogoutView //to change
    },

    {
        path:'/register',
        name: "Register",
        component: RegisterView //to change
    },

    {
        path:'/register',
        name: "Register",
        component: RegisterView //to change
    },

    {
        path:'/forgot',
        name: "ForgotPassword",
        component: ForgotPasswordView //to change
    },
]

export default AuthRouter