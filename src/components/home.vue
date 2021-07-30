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
    methods:{
      // 进去的时候判断是否有没有登录  请先登录
      deng(){
         if(!sessionStorage.getItem("code")){
             alert('请先登录')
               this.$router.push({
                 name: 'index'
               });
         }
      }
    },
    mounted() {

      if(sessionStorage.getItem("code")=='huidait'){
          this.$router.push({name:'all'});
          this.deng()
      }else{
           this.$router.push({name:'student'});
           this.deng()
      }
    }
  }
</script>

<style>
</style>
