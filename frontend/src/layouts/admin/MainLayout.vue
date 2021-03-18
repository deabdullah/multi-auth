<template>
  <div class="">
    <q-layout view="hHh Lpr lff" container style="height: 600px" class="shadow-2 ">
      <q-header elevated class="bg-black">
        <q-toolbar>
          <q-btn flat @click="drawer = !drawer" round dense icon="menu" />
          <q-toolbar-title>Header</q-toolbar-title>
        </q-toolbar>
      </q-header>

      <q-drawer
        v-model="drawer"
        show-if-above
        :width="200"
        :breakpoint="500"
        bordered
        content-class="bg-grey-3"
      >
        <q-scroll-area class="fit">
          <q-list>

            <template v-for="(menuItem, index) in menuList">
              <q-item :key="index" clickable :active="menuItem.label === 'Outbox'" :to='{name: menuItem.link}'  v-ripple>
                <q-item-section avatar>
                  <q-icon :name="menuItem.icon" />
                </q-item-section>
                <q-item-section>
                  {{ menuItem.label }}
                </q-item-section>
              </q-item>
              <q-separator :key="'sep' + index"  v-if="menuItem.separator" />
            </template>

          </q-list>
        </q-scroll-area>
      </q-drawer>

      <q-page-container>
        <router-view/>
      </q-page-container>
    </q-layout>
  </div>
</template>
<script>
const menuList = [
  {
    icon: 'verified',
    label: 'Products',
    link: 'products.list',
    separator: true
  },
  {
    icon: 'settings',
    label: 'Profile',
     link: 'products.show',
    separator: false
  },
  
]

export default {
  data () {
    return {
      drawer: false,
      menuList
    }
  }
}
</script>

<style scoped>
.navs{
  text-decoration: none;
  color: black;
}
</style>