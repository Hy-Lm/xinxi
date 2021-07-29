<template>
  <div>
    <div id="shouye" v-if="logins">
      <el-form :model="ruleForm" status-icon ref="ruleForm" label-width="100px" class="demo-ruleForm">
        <el-form-item label="身份证账号">
          <el-input type="name" ref="name" placeholder="请输入身份证账号" v-model="ruleForm.name" autocomplete="off"></el-input>
        </el-form-item>
        <el-form-item label="密码">
          <el-input type="password" ref="pass" placeholder="请输入密码" v-model="ruleForm.pass" autocomplete="off">
          </el-input>
        </el-form-item>
        <el-form-item>
          <div class="xiugai" @click="xiugai">忘记密码</div>
        </el-form-item>
        <el-form-item>
          <el-button type="primary" @click="login">提交</el-button>
          <el-button @click="zhuci">注册</el-button>
        </el-form-item>
      </el-form>
    </div>
    <!-- 修改密码 -->
    <div id="shou" v-else="logins">
      <el-form :model="ruleForm" status-icon ref="ruleForm" label-width="100px" class="demo-ruleForm">
        <el-form-item label="身份证账号">
          <el-input type="name" ref="name" placeholder="请输入身份证账号" v-model="ruleForm.name" autocomplete="off"></el-input>
        </el-form-item>
        <el-form-item label="新密码">
          <el-input type="password" ref="pass" placeholder="请输入新密码" v-model="ruleForm.pass" autocomplete="off">
          </el-input>
        </el-form-item>
        <el-form-item>
          <el-button type="primary" @click="bb">返回</el-button>
          <el-button type="primary" @click='update'>重置</el-button>
        </el-form-item>
      </el-form>
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
        ruleForm: {
          name: '', //登录账号
          pass: '' //登录密码
        },

        logins: true
      }
    },
    methods: {
      bb() {
        this.logins = !this.logins
      },
      update() {
        //修改密码
        if (!this.ruleForm.name) {
          alert('请输入账号')
          this.$refs.name.focus();
          return false;
        }
        if (!this.ruleForm.pass) {
          alert('请输入密码')
          this.$refs.pass.focus();
          return false;
        }
        this.$axios.get(this.url + 'updatepass.php', {
          params: {
            name: this.ruleForm.name,
            pass: this.ruleForm.pass
          }
        }).then(res => {
          console.log(res)
          if (res.data == 'ok') {
            alert('修改成功，请登录')
            this.logins = !this.logins
            this.ruleForm.name = ''
            this.ruleForm.pass = ''
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
        this.ruleForm.name = ''
        this.ruleForm.pass = ''
        this.logins = !this.logins
      },
      login() {
        if (!this.ruleForm.name) {
          alert('请输入账号')
          this.$refs.name.focus();
          return false;
        }
        if (!this.ruleForm.pass) {
          alert('请输入密码')
          this.$refs.pass.focus();
          return false;
        }
        this.$axios.get(this.url + 'user.php', {
          params: {
            name: this.ruleForm.name,
            pass: this.ruleForm.pass
          }
        }).then(res => {
          console.log(res)
          if (res.data == 'nono') {
            this.$router.push({
              name: 'home'
            });
            sessionStorage.setItem('code', this.ruleForm.name)
            this.ruleForm.name = ''
            this.ruleForm.pass = ''
          } else if (res.data == 'ok') {
            alert('该账号未注册，请先注册')
          } else(
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

  .xiugai:hover,
  .index>div:last-child:hover,
  .zhuce>div:hover {
    cursor: pointer;
  }
</style>
