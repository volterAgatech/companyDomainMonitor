import { createRouter, createWebHistory } from 'vue-router'
import inedxView from "../views/indexView.vue";


const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: "",
      name: "indexPage",
      component: inedxView,
      meta: {
        title: "Монитор Доменов || AGATECH",
        description:
          "Это приложение написанное для улучшения качества работы админитсратора(менеджера",
        keywords:
          "Агатеч, монитор доменов, локальный монитор доменов",
      },
    },
  ]
})
router.beforeEach(() => {
  window.scrollTo(0, 0);
 
});
export default router
