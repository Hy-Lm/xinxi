<template>
  <div class="operationBox">
    <div class="operationBoxItem">
      <div class="titleBox">
        学员信息
        <el-button type="primary" @click='logign' style="margin-left: 20px;">退出</el-button>
      </div>
      <div class="BoxItem">
        <div class="BoxItemList">
          <label>姓名:</label>
          <el-input :disabled="dis" v-model="row.name" style="width: 240px;"></el-input>
          <label>性别:</label>
          <!-- <div class="BoxItemListDiv" v-if="!boxShow">{{row.serial}}</div> -->
          <el-input :disabled="dis" v-model="row.sex" style="width: 60px;"></el-input>
          <label>年龄:</label>
          <!-- <div class="BoxItemListDiv" v-if="!boxShow">{{row.serial}}</div> -->
          <el-input :disabled="dis" v-model="row.age" style="width: 60px;"></el-input>
        </div>
        <div class="BoxItemList">
          <label>联系电话:</label>
          <!-- <div class="BoxItemListDiv" v-if="!boxShow">{{row.serial}}</div> -->
          <el-input :disabled="dis" v-model="row.tel" style="width: 240px;"></el-input>
          <label>身份证:</label>
          <!-- <div class="BoxItemListDiv" v-if="!boxShow">{{row.designation}}</div> -->
          <el-input :disabled="dis" v-model="row.codes" style="width: 240px;"></el-input>
        </div>
        <div class="BoxItemList">
          <label>家庭住址:</label>
          <el-input :disabled="dis" v-model="row.HomeAddress" style="width: 90%;"></el-input>
          <!-- <div class="BoxItemListDiv" v-if="!boxShow">{{row.price}}</div> -->
        </div>
        <div class="BoxItemList">
          <label style="">现居地:</label>
          <el-input :disabled="dis" v-model="row.newAddress" style="width: 90%;"></el-input>
          <!-- <div v-if="!boxShow" class="BoxItemListDiv">{{row.particulars}}</div> -->
        </div>
        <div class="lianxi">联系人信息</div>
        <div class="BoxItemList">
          <label style="">父亲姓名:</label>
          <el-input :disabled="dis" v-model="row.fatherName" style="width: 240px;"></el-input>
          <label style="">联系电话:</label>
          <el-input :disabled="dis" v-model="row.fatherTel" style="width: 240px;"></el-input>
          <!-- <div v-if="!boxShow" class="BoxItemListDiv">{{row.particulars}}</div> -->
        </div>
        <div class="BoxItemList">
          <label style="">母亲姓名:</label>
          <el-input :disabled="dis" v-model="row.motherName" style="width: 240px;"></el-input>
          <label style="">联系电话:</label>
          <el-input :disabled="dis" v-model="row.motherTel" style="width: 240px;"></el-input>
          <!-- <div v-if="!boxShow" class="BoxItemListDiv">{{row.particulars}}</div> -->
        </div>
        <div class="BoxItemList">
          <label style="">学制:</label>
          <el-input :disabled="dis" v-model="row.schooling" style="width: 240px;"></el-input>
          <!-- <div v-if="!boxShow" class="BoxItemListDiv">{{row.particulars}}</div> -->
        </div>
        <div class="BoxItemList">
          <label style="">入学时间:</label>
          <el-input :disabled="dis" v-model="row.enrollment" style="width: 240px;"></el-input>
          <!-- <div v-if="!boxShow" class="BoxItemListDiv">{{row.particulars}}</div> -->
        </div>
        <div class="BoxItemList">
          <label style="">所学专业:</label>
          <el-input :disabled="dis" v-model="row.major" style="width: 240px;"></el-input>
          <!-- <div v-if="!boxShow" class="BoxItemListDiv">{{row.particulars}}</div> -->
        </div>
        <div class="BoxItemList">
          <label style="">专业老师:</label>
          <el-input :disabled="dis" v-model="row.majorTeacher" style="width: 240px;"></el-input>
          <!-- <div v-if="!boxShow" class="BoxItemListDiv">{{row.particulars}}</div> -->
        </div>
        <div class="BoxItemList">
          <label style="">推荐人:</label>
          <el-input :disabled="dis" v-model="row.referrer" style="width: 240px;"></el-input>
          <!-- <div v-if="!boxShow" class="BoxItemListDiv">{{row.particulars}}</div> -->
        </div>
        <div class="BoxItemList">
          <label style="">备注信息:</label>
          <el-input :disabled="dis" type="textarea" v-model="row.remark" style="width: 90%;"></el-input>
          <!-- <div v-if="!boxShow" class="BoxItemListDiv">{{row.particulars}}</div> -->
        </div>
        <!-- <div class="BoxItemList"> -->
        <!-- <label style="">库存详情</label> -->
        <!-- <el-button type="primary" @click="updateXinx" plain>修改信息</el-button>
          <el-button v-if="!dis" @click='accomplish' type="success" plain>完成</el-button -->
        <!-- </div> -->
      </div>
    </div>
    <div class="operationBoxItem" style="padding: 0 20px; ">
      <div class="boxImg boxImgA">
          <img style="width: 140px; height: 160px;" :src="row.img">
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
     deng(){
        if(!sessionStorage.getItem("code")){
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

<style>
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
  }

  label {}

  .lianxi {
    width: 100px;
    text-align: right;
    font-size: 18px;
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
  }

  .BoxItemList {
    width: 100%;
    height: 60px;
    display: flex;
    align-items: center;
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
    width: 48%;
    height: 100%;
    background: #fff;
    margin: 0 20px;
  }

  .titleBox {
    width: 100%;
    padding: 10px 20px;
    font-size: 20px;
    font-weight: 700;
    color: #000;
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
</style>
