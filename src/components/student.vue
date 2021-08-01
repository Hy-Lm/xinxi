<template>
  <div class="operationBox">
    <div class="operationBoxItem">
      <div class="titleBox">
        学员信息
        <el-button type="primary" @click='logign' style="margin-left: 20px;">退出</el-button>
      </div>
      <div class="BoxItem">
        <div class="box">
          <div>
            <div class="BoxItemList">
              <label>姓名 :</label>
              <el-input :disabled="dis" v-model="row.name" name="name" style="width: 240px;"></el-input>
            </div>
            <div class="BoxItemList">
              <label>性别 :</label>
              <!-- <div class="BoxItemListDiv" v-if="!boxShow">{{row.serial}}</div> -->
              <el-input :disabled="dis" v-model="row.sex" name="sex" style="width: 240px;"></el-input>
            </div>
            <div class="BoxItemList">
              <label>年龄 :</label>
              <!-- <div class="BoxItemListDiv" v-if="!boxShow">{{row.serial}}</div> -->
              <el-input :disabled="dis" v-model="row.age" name="age" style="width: 240px;"></el-input>
            </div>

          </div>
          <div>
            <div class="BoxItemList BoxItemimg">
              <!-- <input style="text-align: center;" type="file" name="file" @change="tirggerFile($event)" /> -->
              <img class="imgs"  :src="row.img">
              <p class="pp" :style="{'text-align': (row.img!=''? 'center':'')}">注:请上传2寸或1寸照片</p>
            </div>
          </div>
        </div>
        <div class="BoxItemList">
          <label>联系电话 :</label>
          <!-- <div class="BoxItemListDiv" v-if="!boxShow">{{row.serial}}</div> -->
          <el-input :disabled="dis" v-model="row.tel" name="tel" style="width: 240px;"></el-input>
        </div>
        <div class="BoxItemList">
          <label>身份证 :</label>
          <!-- <div class="BoxItemListDiv" v-if="!boxShow">{{row.designation}}</div> -->
          <el-input :disabled="dis" v-model="row.codes" name="codes" style="width: 240px;"></el-input>
        </div>
        <div class="BoxItemList">
          <label>家庭住址 :</label>
          <el-input :disabled="dis" class="address" v-model="row.HomeAddress"></el-input>
          <!-- <div class="BoxItemListDiv" v-if="!boxShow">{{row.price}}</div> -->
        </div>
        <div class="BoxItemList">
          <label style="">现居地 :</label>
          <el-input :disabled="dis" class="address" v-model="row.newAddress"></el-input>
          <!-- <div v-if="!boxShow" class="BoxItemListDiv">{{row.particulars}}</div> -->
        </div>
        <!-- <div class="lianxi">联系人信息 </div> -->
        <div class="BoxItemList">
          <label style="">父亲姓名 :</label>
          <el-input :disabled="dis" v-model="row.fatherName" style="width: 240px;"></el-input>
          <!-- <div v-if="!boxShow" class="BoxItemListDiv">{{row.particulars}}</div> -->
        </div>
        <div class="BoxItemList">
          <label style="">联系电话 :</label>
          <el-input :disabled="dis" v-model="row.fatherTel" style="width: 240px;"></el-input>
          <!-- <div v-if="!boxShow" class="BoxItemListDiv">{{row.particulars}}</div> -->
        </div>
        <div class="BoxItemList">
          <label style="">母亲姓名 :</label>
          <el-input :disabled="dis" v-model="row.motherName" style="width: 240px;"></el-input>
          <!-- <div v-if="!boxShow" class="BoxItemListDiv">{{row.particulars}}</div> -->
        </div>
        <div class="BoxItemList">
          <label style="">联系电话 :</label>
          <el-input :disabled="dis" v-model="row.motherTel" style="width: 240px;"></el-input>
          <!-- <div v-if="!boxShow" class="BoxItemListDiv">{{row.particulars}}</div> -->
        </div>
        <div class="BoxItemList">
          <label style="">学制 :</label>
          <el-input :disabled="dis" v-model="row.schooling" style="width: 240px;"></el-input>
          <!-- <div v-if="!boxShow" class="BoxItemListDiv">{{row.particulars}}</div> -->
        </div>
        <div class="BoxItemList">
          <label style="">入学时间 :</label>
          <el-input :disabled="dis" v-model="row.enrollment" style="width: 240px;"></el-input>
          <!-- <div v-if="!boxShow" class="BoxItemListDiv">{{row.particulars}}</div> -->
        </div>
        <div class="BoxItemList">
          <label style="">所学专业 :</label>
          <el-input :disabled="dis" v-model="row.major" style="width: 240px;"></el-input>
          <!-- <div v-if="!boxShow" class="BoxItemListDiv">{{row.particulars}}</div> -->
        </div>
        <div class="BoxItemList">
          <label style="">专业老师 :</label>
          <el-input :disabled="dis" v-model="row.majorTeacher" style="width: 240px;"></el-input>
          <!-- <div v-if="!boxShow" class="BoxItemListDiv">{{row.particulars}}</div> -->
        </div>
        <div class="BoxItemList">
          <label style="">推荐人 :</label>
          <el-input :disabled="dis" v-model="row.referrer" style="width: 240px;"></el-input>
          <!-- <div v-if="!boxShow" class="BoxItemListDiv">{{row.particulars}}</div> -->
        </div>
        <div class="BoxItemList">
          <label style="">备注信息 :</label>
          <el-input :disabled="dis" class="address" type="textarea" v-model="row.remark"></el-input>
          <!-- <div v-if="!boxShow" class="BoxItemListDiv">{{row.particulars}}</div> -->
        </div>
      </div>
    </div>

  </div>
</template>

<script>
  //
  export default {
    data() {
      return {
        url: 'http://localhost/xinxiPHP/',
        // url:'http://xinxi.hd512.com/xinxiPHP/',
        // boxShow:false,
        dis: true,
        photo: true,
        row: {
          name: '',
          sex: '',
          age: '',
          codes: '',
          tel: '',
          HomeAddress: '',
          newAddress: '',
          fatherName: '',
          fatherTel: '',
          motherName: '',
          motherTel: '',
          schooling: '',
          enrollment: '',
          major: '',
          majorTeacher: '',
          referrer: '',
          remark: '',
          img: ''
        }
      }
    },
    mounted() {
      this.info()
      this.deng()
    },
    methods: {
      // 进去的时候判断是否有没有登录  请先登录
      deng() {
        if (!sessionStorage.getItem("code")) {
          alert('请先登录')
          this.$router.push({
            name: 'index'
          });
        }
      },
      logign() {
        sessionStorage.removeItem('code')
        this.$router.push({
          name: 'index'
        });
      },
      info() {
        this.$axios.get(this.url + 'codes.php', {
          params: {
            codes: sessionStorage.getItem("code")
          }
        }).then(res => {
          console.log(res.data)
          this.row = res.data[0]
          // if(this.row==[]){
          //   alert('未录入')
          // }
        })
      }
    }
  }
</script>

<style scoped lang="scss">
   input{
    border: none !important;
  }
  .imgs {
   width: 70px;
   height: 100%;
    @media screen and (max-width:1000px) {
       width: 100%;
         height: 100px;
    }
  }

  // #app{
  //   @media screen and (max-width:1000px){
  //     width: 100vw;
  //   }
  // }
  .address{
    width: 83%;
       @media screen and (max-width:1000px){
         width: 70%;
    }
  }

  .boxImg::-webkit-scrollbar {
    width: 2px;
    background: #eee;
  }

  .BoxItemListDiv {
    font-size: 16px;
  }

  .boxImg::-webkit-scrollbar-thumb {
    background: #ccc;
  }

  .boxImgA {
    height: 120px;
    overflow: hidden;
    overflow-y: auto;
  }

  .boxImgC {
    height: 195px;
    overflow: hidden;
    overflow-y: auto;
  }

  .boxImgC .el-upload--picture-card,
  .boxImgC .el-upload-list--picture-card .el-upload-list__item,
  .boxImgB .el-upload--picture-card,
  .boxImgB .el-upload-list--picture-card .el-upload-list__item {
    height: 180px !important;
    line-height: 180px !important;
  }

  .boxImgA .el-upload--picture-card,
  .boxImgA .el-upload-list--picture-card .el-upload-list__item {
    height: 100px !important;
    line-height: 100px !important;
  }

  .el-upload--picture-card .el-upload__input {
    display: none;
  }

  .boxImg {
    width: 100%;
     height: 100%;
  }

  label {}

  .lianxi {
    width: 100px;
    text-align: right;
    font-size: 18px;

    @media screen and (max-width:1000px) {
      font-size: 16px;
      // text-align: left;
    }
  }

  .BoxItemList label {
    color: #000;
    font-size: 18px;
    margin-right: 20px;
    width: 100px;
    text-align: right;

    /* text-align-last: justify;
    text-align: justify;
    text-justify: distribute-all-lines; */
    @media screen and (max-width:1000px) {
      // width: 20%;
      text-align: center;
      font-size: 12px;
      margin-right: 5px;
    }
  }

  .BoxItemList {
    width: 100%;
    height: 60px;
    display: flex;
    align-items: center;
    @media screen and (max-width:1000px){
        & label{
          // width:50px;
          // width: 60px !important;
        }
        // &:nth-child(2) div{
        //     width: 100px !important;
        // }
        &:nth-child(5) label,
        &:nth-child(6) label{
          // width:100px;
        }
      };
  }

  .BoxItemList:last-child {
    justify-content: center;
  }

  .operationBox {
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: space-between;

  }

  .operationBoxItem {
    padding: 10px 30px;
    box-sizing: border-box;
    margin: auto;
    width: 48%;
    height: 100%;
    background: #fff;
    border: 1px solid rgba(153, 153, 153, .3);
    /* margin: 0 20px; */
    @media screen and (max-width:1000px) {
      width: 100%;
     padding: 10px;
    }
  }

  .titleBox {
    width: 100%;
    padding: 10px 20px;
    font-size: 20px;
    font-weight: 700;
    color: #000;
    box-sizing: border-box;

    @media screen and (max-width:1000px) {
      box-sizing: border-box;
      width: 100%;
      display: flex;
      justify-content: space-between;
    }
  }

  .BoxItem {
    width: 100%;
    height: calc(100% - 50px);
    /* padding: 40px 0 0 20px ; */
  }

  .boxImg {
    margin-top: 40px;
    /* width: 100px; */
    height: 100%;
    display: flex;
    /* align-items: center; */
    flex-direction: column;
  }

  textarea:disabled,
  input:disabled {
    background-color: #FFFFFF !important;
    color: #333333 !important;
  }

  .pp {
    /* text-align: center; */
    color: #666;
    font-size: 12px;
    width: 252px;
    @media screen and (max-width:1000px){
      width: 100%;
      padding: 5px;
      box-sizing: border-box;
        // width: 252px;
    }
  }

  .box {
    width: 100%;
    display: flex;
    // padding: 10px;
    box-sizing: border-box;
      @media screen and (max-width:1000px){
        width: 100%;
      }
  }
.box>div:nth-child(1){
    @media screen and (max-width:1000px){
        width:60%;
      }
}
  .box>div:nth-child(1) label{
      @media screen and (max-width:1000px){
          width:200px;
        }
  }
  .box>div:nth-child(2) {
    width: 100%;
     height: 100%;
    margin: auto;
    @media screen and (max-width:1000px){
        width:30%;
        padding:0 5px;
        padding-top: 20px;
        box-sizing: border-box;
      }
  }

  .BoxItemimg {
    /* margin: auto; */
    flex-direction: column;
    /* justify-content: center; */
    align-items: center
  }
  // .address{
  // @media screen and (max-width:1000px) {
  //       width: 90% !important;
  //     }
  // }
</style>
