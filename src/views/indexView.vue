<template>
  <mainComponent />
</template>

<script>
import mainComponent from '../components/mainComponent.vue'

export default {
  head() {
    return {
      title: 'AGATECH || Монитор доменов',
      meta: [
        {
          name: 'description',
          content: 'Данный инструмент создан для моиторинга всех домменов компании агатеч, мониторинг дат создания->освобождения,SSl'
        }
      ]
    }
  },
  components: {
    mainComponent
  }
}
</script>
<style lang="scss"></style>
