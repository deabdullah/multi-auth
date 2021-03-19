import VueCookies from 'vue-cookies'

const routes = [
  {
    path: '/',
    component: () => import('layouts/MainLayout.vue'),
    children: [
      { path: '', component: () => import('pages/Index.vue') }
    ]
  },
  {
    path: '/admin/login',
    name: 'admin.login',
    component: () => import('layouts/admin/LoginLayout.vue'),
  },
  {
    path: '/admin',
    component: () => import('layouts/admin/MainLayout.vue'),
    beforeEnter: (to, from, next) => {
      if (VueCookies.get('admin_access_token')) next()
      else next({ name: 'admin.login' })
    },
    children: [
      { path: '',name: 'admin.home', component: () => import('pages/admin/Index.vue') },
      {
        path: 'products', component: () => import('pages/admin/products/index.vue'),
        children: [
          { path: '', name: 'products.list', component: () => import('pages/admin/products/list.vue') },
          { path: 'show', name: 'products.show', component: () => import('pages/admin/products/show.vue') },
          { path: 'create', name: 'products.create', component: () => import('pages/admin/products/create.vue') },
          { path: 'edit/:product', name: 'products.edit', component: () => import('pages/admin/products/edit.vue') }
        ]
      }
    ]
  },
  // Always leave this as last one,
  // but you can also remove it
  {
    path: '*',
    component: () => import('pages/Error404.vue')
  }
]

export default routes
