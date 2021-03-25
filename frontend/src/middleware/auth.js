import VueCookies from 'vue-cookies'

const authAdmin = () => {
    if (!VueCookies.get('admin_access_token')) {
        console.log('User is not authenticated from middleware')
        return false;
    }
    else {
        console.log('authadmin')
        return true;
    }

};

const logAdmin = () => {
    if (!VueCookies.get('admin_access_token')) {
        console.log('Admin is not logged in from middleware')
        return false;
    }
    else {
        console.log('logadmin')
        return true;
    }
};

export { logAdmin, authAdmin };
// export  default authAdmin;

