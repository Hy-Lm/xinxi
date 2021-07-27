<template>
  <div id="shouye">
    <div class="index">
      <!-- 首页登录 -->
      <div>
        <label>账号:</label>
        <input v-model.trim="name" ref='name' placeholder="请输入账号">
      </div>
      <div>
        <label>密码:</label>
        <input v-model.trim="pass" ref='pass' placeholder="请输入密码">
      </div>
      <div @click="xiugai">忘记密码</div>
    </div>
    <div class="zhuce">
      <div @click="login">登录</div>
      <div>注册</div>
    </div>
  </div>

</template>

<script>
  export default {
    name: 'index',
    data() {
      return {
        url:'http://xinxi.hd512.com/xinxiPHP/',
        name: '', //登录账号
        pass: '' //登录密码
      }
    },
    methods: {
      xiugai(){
         console.log('修改密码')
      },
      login() {
        if (!this.name) {
          alert('请输入账号')
          this.$refs.name.focus();
          return false;
        }
        if (!this.pass) {
          alert('请输入密码')
          this.$refs.pass.focus();
          return false;
        }
        this.$axios.get(this.url+'user.php', {
          params: {
            name: this.name,
            pass: this.pass
          }
        }).then(res => {
          console.log(res)
          if (res.data == 'ok') {
            this.$router.push('/home');
          } else {
            alert('请输入正确的账号和密码')
          }
          this.name = ''
          this.pass = ''
        })
      }

    }
  }
</script>

<style>
  #shouye {
    box-sizing: border-box;
    display: flex;
    flex-direction: column;
    position: fixed;
    top: 30%;
    left: 50%;
    transform: translate(-50%);
  }

  #shouye .index {
    width: 100%;
  }

  #shouye .index div {
    width: 100%;
    display: flex;
    margin: 10px 0;
    text-align: center;
    box-sizing: border-box;
  }

  #shouye .index>div>label {
    margin-right: 10px;
  }

  .index>div:last-child {
    font-size: 12px;
    padding-left: 46px;
  }

  .zhuce {
    display: flex;
    justify-content: space-around;
  }

  .index>div:last-child:hover,
  .zhuce>div:hover {
    cursor: pointer;
  }
</style>
