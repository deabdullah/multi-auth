import VueCookies from 'vue-cookies'
const isLoggedIn = () => !!VueCookies.get('admin_access_token')

const authMiddleware = async ({ to, from,  next }) => {
    console.log('authMiddleware')
    if (!isLoggedIn()) {
        next({
            name: "admin.login",
        });
    }
}

export default authMiddleware;
