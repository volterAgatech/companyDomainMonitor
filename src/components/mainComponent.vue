<template lang="">
  <section class="main__section">
    <div class="container-fluid">
      <div class="main__upper__container">
        <div class="h1_container"><h1 class="h1_main">Список доменов</h1></div>
        <div class="monitor__btns">
          <button type="button" class="btn">
            Обновить<img src="../assets/img/reload.svg" alt="" />
          </button>
          <button type="button" class="btn">Добавить</button>
        </div>
      </div>
      <div class="main__table__container">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col" class="number">№</th>
              <th scope="col">Domain</th>
              <th scope="col">Created</th>
              <th scope="col">Paid-Till</th>
              <th scope="col">SSL-Till</th>
            </tr>
          </thead>
          <tbody>
            <tr class="table__row" v-for="(domain, index) in domainsInfo" :key="index">
              <th scope="row">{{ index + 1 }}</th>
              <td>
                <a :href="`http://${domain.dname}`" target="_blank" rel="noopener noreferrer">{{
                  domain.dname
                }}</a>
              </td>
              <td>{{ dateFormat(domain.datecreated) }}</td>
              <td>{{ dateFormat(domain.paidtill) }}</td>
              <td class="ssltd" :class="{ alert: domain.ssltill == '0000-00-00' }">
                <div v-if="domain.ssltill != '0000-00-00'">{{dateFormat( domain.ssltill) }}</div>
                <div v-else class="ssltd__nosert">НЕТ СЕРТИФИКАТА</div>
                <button type="button" class="btn btn-danger">X</button>
              </td>
            </tr>
          </tbody>
        </table>
        <div class="pagination__container">
          <div class="arrows__container">
            <button class="btn arrow__next btn-danger" @click.prevent="setLimit(10)">
              Показать еще
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
<script>
import axios from 'axios'
export default {
  data() {
    return {
      domainsInfo: {},
      limitOnPage: 10
    }
  },
  methods: {
    dateFormat(date) {
      let dateArray = date.split('-')
      return dateArray[2] + '.' + dateArray[1] + '.' + dateArray[0]
    },
    setData(res) {
      //сохранить список полученных задач
      this.domainsInfo = res
      console.log(this.domainsInfo)
    },
    loadDomainsInfo() {
      axios
        .post('http://domainmonitor/public/Api/', {
          action: 'getAllDomainData',
          limit: this.limitOnPage
        })
        .then((response) => this.setData(response.data))
    },
    setLimit(num) {
      this.limitOnPage += num
      console.log(this.limitOnPage)
      this.loadDomainsInfo()
    }
  },
  mounted() {
    this.loadDomainsInfo()
  }
}
</script>
<style lang="scss">
.main__section {
  padding-top: 100px;
  // height: 100dvh;
  background-color: #fff4f4;
}
.ssltd.alert {
  background-color: #dc3545 !important;
}
.number {
  width: 45px;
}
.arrows__container {
  display: flex;
  justify-content: end;
}
.monitor__btns {
  display: flex;
  justify-content: space-between;
  align-items: center;

  .btn {
    background-color: #002f7d;
    color: white;
    display: flex;
    align-items: center;
    height: 45px;

    img {
      max-width: 25px;
      margin-left: 10px;
    }
  }
}

.main__upper__container {
  display: grid;
  grid-template-columns: 1fr 2fr;
  padding: 50px 0 30px 0;
}

.table__row td:last-child {
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.table__row:nth-child(odd) {
  td {
    background-color: #fff4f4;
  }

  th {
    background-color: #fff4f4;
  }
}
</style>
