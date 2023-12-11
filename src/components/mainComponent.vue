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
              <th scope="col">SSL Created</th>
              <th scope="col">SSL-Till</th>
            </tr>
          </thead>
          <tbody>
            <tr class="table__row">
              <th scope="row">1</th>
              <td>string</td>
              <td>string</td>
              <td>string</td>
              <td>string</td>
              <td>string<button type="button" class="btn btn-danger">X</button></td>
            </tr>
            <tr class="table__row">
              <th scope="row">1</th>
              <td>string</td>
              <td>string</td>
              <td>string</td>
              <td>string</td>
              <td>string<button type="button" class="btn btn-danger">X</button></td>
            </tr>
            <tr class="table__row">
              <th scope="row">1</th>
              <td>string</td>
              <td>string</td>
              <td>string</td>
              <td>string</td>
              <td>string<button type="button" class="btn btn-danger">X</button></td>
            </tr>
            <tr class="table__row">
              <th scope="row">1</th>
              <td>string</td>
              <td>string</td>
              <td>string</td>
              <td>string</td>
              <td>string<button type="button" class="btn btn-danger">X</button></td>
            </tr>
            <tr class="table__row">
              <th scope="row">1</th>
              <td>string</td>
              <td>string</td>
              <td>string</td>
              <td>string</td>
              <td>string<button type="button" class="btn btn-danger">X</button></td>
            </tr>
            <tr class="table__row">
              <th scope="row">1</th>
              <td>string</td>
              <td>string</td>
              <td>string</td>
              <td>string</td>
              <td>string<button type="button" class="btn btn-danger">X</button></td>
            </tr>
            <tr class="table__row">
              <th scope="row">1</th>
              <td>string</td>
              <td>string</td>
              <td>string</td>
              <td>string</td>
              <td>string<button type="button" class="btn btn-danger">X</button></td>
            </tr>
            <tr class="table__row">
              <th scope="row">1</th>
              <td>string</td>
              <td>string</td>
              <td>string</td>
              <td>string</td>
              <td>string<button type="button" class="btn btn-danger">X</button></td>
            </tr>
            <tr class="table__row">
              <th scope="row">1</th>
              <td>string</td>
              <td>string</td>
              <td>string</td>
              <td>string</td>
              <td>string<button type="button" class="btn btn-danger">X</button></td>
            </tr>
            <tr class="table__row">
              <th scope="row">1</th>
              <td>string</td>
              <td>string</td>
              <td>string</td>
              <td>string</td>
              <td>string<button type="button" class="btn btn-danger">X</button></td>
            </tr>
            <tr class="table__row">
              <th scope="row">1</th>
              <td>string</td>
              <td>string</td>
              <td>string</td>
              <td>string</td>
              <td>string<button type="button" class="btn btn-danger">X</button></td>
            </tr>
            <tr class="table__row">
              <th scope="row">1</th>
              <td>string</td>
              <td>string</td>
              <td>string</td>
              <td>string</td>
              <td>string<button type="button" class="btn btn-danger">X</button></td>
            </tr>
          </tbody>
        </table>
        <div class="pagination__container">
          <div class="arrows__container">
            <button class="btn arrow__prev btn-danger">PREV</button>
           <button class="btn arrow__next btn-danger">NEXT</button>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
<script>
export default {}
</script>
<style lang="scss">
.main__section {
  padding-top: 100px;
  // height: 100dvh;
  background-color: #fff4f4;
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
