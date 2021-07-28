<template>
  <div>
    <div id="shouye" v-if="logins">
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
        <!-- <div v-if="psss" class="psss">请输入正确的密码</div> -->
        <div @click="xiugai">忘记密码</div>
      </div>
      <div class="zhuce">
        <div @click="login">登录</div>
        <div @click="zhuci">注册</div>
      </div>
    </div>
    <!-- 修改密码 -->
    <div id="shou" v-else="logins">
      <div class="index">
        <!-- 首页登录 -->
        <div>
          <label>账号:</label>
          <input v-model.trim="name" ref='name' placeholder="请输入正确的账号">
        </div>
        <div>
          <label>新密码:</label>
          <input v-model.trim="pass" ref='pass' placeholder="请输入新密码">
        </div>
        <!-- <div v-if="psss" class="psss">请输入正确的密码</div> -->
        <!-- <div @click="xiugai">忘记密码</div> -->
      </div>
      <div class="zhuce">
        <el-button type="primary" @click='update'>完成</el-button>
      </div>
    </div>
  </div>

</template>

<script>
  export default {
    name: 'index',
    data() {
      return {
        url: 'http://localhost/xinxiPHP/',
        // url:'http://xinxi.hd512.com/xinxiPHP/',
        name: '', //登录账号
        pass: '', //登录密码
        logins: true
      }
    },
    methods: {
      update() {
        //修改密码
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
        this.$axios.get(this.url + 'updatepass.php', {
          params: {
            name: this.name,
            pass: this.pass
          }
        }).then(res => {
          console.log(res)
          if (res.data == 'ok') {
            alert('修改成功，请登录')
            this.logins = !this.logins
            this.name = ''
            this.pass = ''
          } else {
            alert('请输入正确的账号')
          }
        })
      },
      zhuci() {
        this.$router.push({
          name: 'zhuci'
        });
      },
      xiugai() {
        // console.log('修改密码')
        this.name = ''
        this.pass = ''
        this.logins = !this.logins
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
        this.$axios.get(this.url + 'user.php', {
          params: {
            name: this.name,
            pass: this.pass
          }
        }).then(res => {
            console.log(res)
            if (res.data == 'nono') {
                  this.$router.push({
                    name: 'home',
                    params: {
                      code: this.name
                    }
                  });
                  this.name = ''
                  this.pass = ''
              }else if(res.data=='ok'){
                alert('该账号未注册，请先注册')
              }else(
                alert('请输入正确的账号或密码')
              )

            })
        }

      }
    }
</script>

<style scoped>
  #shouye,
  #shou {
    box-sizing: border-box;
    display: flex;
    flex-direction: column;
    position: fixed;
    top: 30%;
    left: 50%;
    transform: translate(-50%);
  }

  #shouye .index,
  #shou .index {
    width: 100%;
  }

  #shouye .index div,
  #shou .index div {
    width: 100%;
    display: flex;
    margin: 10px 0;
    text-align: center;
    box-sizing: border-box;
  }

  #shouye .index>div>label,
  #shou .index>div>label {
    margin-right: 10px;
    text-align: right;
  }

  #shou .index>div>label {
    width: 60px;
  }

  #shouye .index>div:last-child {
    font-size: 12px;
    padding-left: 46px;
  }

  .zhuce {
    margin-top: 10px;
    display: flex;
    justify-content: space-around;
  }

  .index>div:last-child:hover,
  .zhuce>div:hover {
    cursor: pointer;
  }
</style>
