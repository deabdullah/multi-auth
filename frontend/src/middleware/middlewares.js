import { authAdmin, logAdmin } from './auth'

const middleware = () => {

    console.log('Middleware Linked')


    let auth = authAdmin()
    let log = logAdmin()

    if (auth && log) {
        console.log('Admin is logged in')
        return true;
    }
    else {
        console.log('Unauthenticated')
        return false;
    }

}

export default middleware