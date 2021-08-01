<template>
  <div id="shouye">
    <h1>学员信息录入系统</h1>
    <el-form :model="ruleForm" status-icon ref="ruleForm" label-width="100px" class="demo-ruleForm">
      <el-form-item label="账号">
        <el-input type="name" ref="name" placeholder="请输入身份证" v-model="ruleForm.name" autocomplete="off"></el-input>
      </el-form-item>
      <el-form-item label="密码">
        <el-input type="password" ref="pass" placeholder="请输入登录密码" v-model="ruleForm.pass" autocomplete="off">
        </el-input>
      </el-form-item>
      <el-form-item>
        <el-button type="primary" @click="bb">返回</el-button>
        <el-button type="primary" @click='wanc'>提交</el-button>
      </el-form-item>
    </el-form>
  </div>

</template>

<script>
  export default {
    name: 'index',
    data() {
      return {
        // url: 'http://localhost/xinxiPHP/',
        url:'http://xinxi.hd512.com/xinxiPHP/',
        ruleForm: {
          name: '', //登录账号
          pass: '' //登录密码
        }
      }
    },
    methods: {
      bb() {
        this.$router.push({
          name: 'index'
        });
      },
      wanc() {
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
        this.$axios.get(this.url + 'adduser.php', {
          params: {
            name: this.ruleForm.name,
            pass: this.ruleForm.pass
          }
        }).then(res => {
          console.log(res)
          if (res.data == 'ok') {
            alert('注册成功，请登录')
            this.$router.push({
              name: 'index'
            });
            this.ruleForm.name = ''
            this.ruleForm.pass = ''
          } else {
            alert('注册失败')
          }
        })
      }
    }
  }
</script>

<style scoped lang="scss">
  h1{
    text-align: center;
    margin-bottom:30px;
    @media screen and (max-width:1000px){
      font-size: 20px;
      margin-bottom:30px;
    }
  }
  #shouye {
    box-sizing: border-box;
    display: flex;
    flex-direction: column;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    @media screen and (max-width:1000px){
      padding: 10px;
      box-sizing: border-box;
      width: 100%;
    }
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
    text-align: right;
  }

  #shou .index>div>label {
    width: 60px;
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
