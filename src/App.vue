<template>
  <headerComponent />
  <router-view />
  <footerComponent />
</template>
<script>
import headerComponent from "./components/headerComponent.vue";
import footerComponent from "./components/footerComponent.vue";

export default {
  components: {
    headerComponent,
    footerComponent,
  }
};
</script>
<style lang="scss">
// main stile

$blueMain: rgba(0, 113, 254, 1);
$cyanMain: rgba(217, 234, 255, 1);
$borderColor: #dedede;
*,
ul,
li,
button,
p {
  margin: 0;
  padding: 0;
  list-style-type: none;
  transition: all 600ms;
  font-family: Montserrat;
  border: unset;
}
a {
  font-size: 14px;
  line-height: 18px;
  text-decoration: none;
  &:hover {
    text-decoration: none;
    //color: transparent;
  }
}
strong {
    color: $blueMain;
    font-weight: 500;
}
body {
  padding: 0 !important;
}
*::-webkit-scrollbar {
  width: 0;
}
h2 {
  margin: 0;
  font-size: 36px;
  line-height: 46px;
  font-weight: 500;
  @media (max-width: 768px) {
    br {
      display: none;
    }
  }
  @media (max-width: 480px) {
    font-size: 30px;
    line-height: 39px;
  }
}
h3 {
  margin: 0;
  font-size: 18px;
  line-height: 23px;
  font-weight: 500;
  color: $blueMain;
}
h4 {
  margin: 0;
  font-size: 24px;
  line-height: 31px;
  font-weight: 500;
  text-transform: uppercase;
}
h5 {
  margin: 0;
  font-size: 18px;
  line-height: 25px;
  font-weight: 700;
  text-transform: uppercase;
}
span {
  font-size: 16px;
  line-height: 20px;
  font-weight: 300;
}
.container-fluid {
  max-width: 1600px;
  padding: 0 100px;
  @media (max-width: 1000px) {
    padding: 0 50px;
  }
  @media (max-width: 480px) {
    padding: 0 10px;
  }
}
.sr-only {
  display: none;
}
</style>
