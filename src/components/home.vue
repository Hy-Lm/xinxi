<template>
  <div id="home">
    <!-- home{{this.$route.params.code}} -->
  </div>
</template>

<script>
  export default {
    name: 'home',
    data() {
      return {
        url:'http://xinxi.hd512.com/xinxiPHP/',
      }
    },
    mounted() {
      if(this.$route.params.code=='xinxiadmin'){
          this.$router.push({name:'all',params:{code:this.$route.params.code}});
      }else{
           this.$router.push({name:'student',params:{code:this.$route.params.code}});
      }
    }
  }
</script>

<style>
</style>
