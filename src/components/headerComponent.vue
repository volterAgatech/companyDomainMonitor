<template lang="">
  <header class="header">
    <div class="container-fluid">
      <div class="main_header_container">
        <div class="logo__div">
          <img src="../assets/img/comp.svg" alt="" />
        </div>
        <div class="serchdomain__input">
          <div class="input-group">
            <input
              type="search"
              class="form-control"
              placeholder="Search"
              aria-label="Search"
              aria-describedby="search-addon"
            />
            <button type="button" class="btn btn-outline-primary ser__btn" data-mdb-ripple-init>
              домен
            </button>
          </div>
        </div>
        <div class="profile__div">
          <img src="../assets/img/User.svg" alt="" />
        </div>
      </div>
    </div>
  </header>
</template>
<script>
export default {}
</script>
<style lang="scss">
.header {
  width: 100%;
  position: fixed;
  height: 100px;
  background-color: #002f7d;
  display: flex;
  align-items: center;
}
.main_header_container {
  display: grid;
  grid-template-columns: 1fr 2fr 1fr;
  justify-items: center;
  align-items: center;
}

.logo__div {
  width: 100%;
  img {
    max-width: 220px;
    height: auto;
  }
}
.serchdomain__input {
  width: 100%;
}
.profile__div {
  display: flex;
  justify-content: end;
  width: 100%;
}
.btn {
  font-weight: 600;
  text-transform: uppercase;
  border: unset;
  border-radius: 0;
  // background-color: #002f7d;
  // color: white;
}
.ser__btn {
  background-color: wheat;
  color: #002f7d;
}
</style>
