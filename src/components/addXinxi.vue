<template>
  <div>
    <form class="operationBox" role="form" :action="this.url+'addXinxi.php'" method="post"
      enctype="multipart/form-data">
      <div class="operationBoxItem">
        <div class="titleBox">
          学员信息录入
          <el-button type="primary" @click='goback' style="margin-left: 20px;">返回</el-button>
        </div>
        <div class="BoxItem">
          <div class="box">
            <div>
              <div class="BoxItemList">
                <label>姓名:</label>
                <el-input v-model="row.name" name="name" style="width: 240px;"></el-input>
              </div>
              <div class="BoxItemList">
                <label>性别:</label>
                <!-- <div class="BoxItemListDiv" v-if="!boxShow">{{row.serial}}</div> -->
                <el-input v-model="row.sex" name="sex" style="width: 60px;"></el-input>
                <label>年龄:</label>
                <!-- <div class="BoxItemListDiv" v-if="!boxShow">{{row.serial}}</div> -->
                <el-input v-model="row.age" name="age" style="width: 60px;"></el-input>
              </div>
              <div class="BoxItemList">
                <label>联系电话:</label>
                <!-- <div class="BoxItemListDiv" v-if="!boxShow">{{row.serial}}</div> -->
                <el-input v-model="row.tel" name="tel" style="width: 240px;"></el-input>
              </div>
              <div class="BoxItemList">
                <label>身份证:</label>
                <!-- <div class="BoxItemListDiv" v-if="!boxShow">{{row.designation}}</div> -->
                <el-input v-model="row.codes" name="codes" style="width: 240px;"></el-input>
              </div>
            </div>
            <div>
              <div class="BoxItemList BoxItemimg">
                <input style="text-align: center;" class="file"   type="file" name="file" @change="tirggerFile($event)" />
               <img class="imgs" v-if="imgUrl!=''" :src="imgUrl">
                <p class="pp" :style="{'text-align': (imgUrl!=''? 'center':'')}" >注:请上传2寸或1存照片</p>
              </div>
            </div>
          </div>
          <div class="BoxItemList">
            <label>家庭住址:</label>
            <el-input class="address" v-model="row.HomeAddress" name="HomeAddress" style="width: 90%;"></el-input>
            <!-- <div class="BoxItemListDiv" v-if="!boxShow">{{row.price}}</div> -->
          </div>
          <div class="BoxItemList">
            <label style="">现居地:</label>
            <el-input v-model="row.newAddress" name="newAddress" style="width: 90%;"></el-input>
            <!-- <div v-if="!boxShow" class="BoxItemListDiv">{{row.particulars}}</div> -->
          </div>
          <div class="lianxi">联系人信息</div>
          <div class="BoxItemList">
            <label style="">父亲姓名:</label>
            <el-input v-model="row.fatherName" name="fatherName" style="width: 240px;"></el-input>
            <label style="">联系电话:</label>
            <el-input v-model="row.fatherTel" name="fatherTel" style="width: 240px;"></el-input>
            <!-- <div v-if="!boxShow" class="BoxItemListDiv">{{row.particulars}}</div> -->
          </div>
          <div class="BoxItemList">
            <label style="">母亲姓名:</label>
            <el-input v-model="row.motherName" name="motherName" style="width: 240px;"></el-input>
            <label style="">联系电话:</label>
            <el-input v-model="row.motherTel" name="motherTel" style="width: 240px;"></el-input>
            <!-- <div v-if="!boxShow" class="BoxItemListDiv">{{row.particulars}}</div> -->
          </div>
          <div class="BoxItemList">
            <label style="">学制:</label>
            <el-input v-model="row.schooling" name="schooling" style="width: 240px;"></el-input>
            <!-- <div v-if="!boxShow" class="BoxItemListDiv">{{row.particulars}}</div> -->
          </div>
          <div class="BoxItemList">
            <label style="">入学时间:</label>
            <el-input v-model="row.enrollment" name="enrollment" style="width: 240px;"></el-input>
            <!-- <div v-if="!boxShow" class="BoxItemListDiv">{{row.particulars}}</div> -->
          </div>
          <div class="BoxItemList">
            <label style="">所学专业:</label>
            <el-input v-model="row.major" name="major" style="width: 240px;"></el-input>
            <!-- <div v-if="!boxShow" class="BoxItemListDiv">{{row.particulars}}</div> -->
          </div>
          <div class="BoxItemList">
            <label style="">专业老师:</label>
            <el-input v-model="row.majorTeacher" name="majorTeacher" style="width: 240px;"></el-input>
            <!-- <div v-if="!boxShow" class="BoxItemListDiv">{{row.particulars}}</div> -->
          </div>
          <div class="BoxItemList">
            <label style="">推荐人:</label>
            <el-input v-model="row.referrer" name="referrer" style="width: 240px;"></el-input>
            <!-- <div v-if="!boxShow" class="BoxItemListDiv">{{row.particulars}}</div> -->
          </div>
          <div class="BoxItemList">
            <label style="">备注信息:</label>
            <el-input type="textarea" name="remark" v-model="row.remark" style="width: 90%;"></el-input>
            <!-- <div v-if="!boxShow" class="BoxItemListDiv">{{row.particulars}}</div> -->
          </div>
          <div class="BoxItemList">
            <!-- <label style="">库存详情</label> -->
            <!-- <el-button type="success" plain @click="addFen">录入</el-button> -->
            <input type="submit" class="suv" id="" value="录入" name="" />
          </div>
        </div>
      </div>
    </form>


  </div>
</template>

<script>
  //
  export default {
    data() {
      return {
        // url: 'http://localhost/xinxiPHP/',
        url:'http://xinxi.hd512.com/xinxiPHP/',
        imgUrl: '',
        files: {},
        photo: '',
        photoObj: '',
        // boxShow:false,
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
        },
        titleBoxitem: "",
        number: 3,
        numberZhan: 1,
        dialogImageUrl: '',
        dialogVisible: false,
        disabled: false,
        show: true,
        formLabelWidth: '120px',
        form: {
          name: '',
          num: ''
        },
        dialogFormVisible: false,
        titleBox: "",
        num: '',
        selectItem: '',
        input: '',
      };
    },
    mounted() {
      // this.deng()
    },
    methods: {
      goback() {
        // console.log(this.$route.params.row.codes)
        //返回首页
        this.$router.push({
          name: 'all'
        });
      },
      tirggerFile: function(event) {
        let file = event.target.files[0];
        // console.log(file.size)
        // if(!file.size / 1024 / 1024 < 3){
        //    alert('上传图片过大')
        //    return false;
        // }
        let url = "";
        var reader = new FileReader();
        reader.readAsDataURL(file);
        let that = this;
        reader.onload = function(e) {
          url = this.result.substring(this.result.indexOf(",") + 1);
          that.imgUrl = "data:image/png;base64," + url;
          // that.$refs['imgimg'].setAttribute('src','data:image/png;base64,'+url);
        };
      }
    }
  };
</script>

<style  lang="scss">
  .imgs {
      width: 140px;
      height: 200px;
      @media screen and (max-width:1000px){
          width: 100%;
          // height: 100%;
        };
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
    }

    label {}

    .lianxi {
      width: 100px;
      text-align: right;
      font-size: 18px;

      @media screen and (max-width:1000px) {
        font-size: 16px;
        text-align: left;
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
        width: 20%;
        font-size: 12px;
        margin-right: 5px;
      }
    }

    .BoxItemList {
      width: 100%;
      height: 55px;
      display: flex;
      align-items: center;
      @media screen and (max-width:1000px){
          & label{
            width:50px;
            // width: 60px !important;
          }

          &:nth-child(5) label,
          &:nth-child(6) label{
            width:100px;
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
.suv {
    display: inline-block;
    line-height: 1;
    white-space: nowrap;
    cursor: pointer;
    border: 1px solid #DCDFE6;
    color: #67C23A;
    -webkit-appearance: none;
    text-align: center;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    outline: 0;
    margin-left: 30px;
    -webkit-transition: .1s;
    transition: .1s;
    font-weight: 500;
    padding: 12px 20px;
    font-size: 14px;
    border-radius: 4px;
    background: #f0f9eb;
    border-color: #c2e7b0;
  }

  .suv:hover {
    background-color: #67C23A;
    color: #FFFFFF;
  }
  .file {
      @media screen and (max-width:1000px) {
        width: 73px;
      }
    }
    .box {
      width: 100%;
      display: flex;
      padding: 10px;
      box-sizing: border-box;
        @media screen and (max-width:1000px){
          width: 100%;
        }
    }

  .box>div:nth-child(1){
      @media screen and (max-width:1000px){
          width:70%;
        }
  }
    .box>div:nth-child(2) {
      width: 100%;
      margin: auto;
      @media screen and (max-width:1000px){
          width:30%;
        }
    }
.box>div:nth-child(1) .BoxItemList:nth-child(2){
  @media screen and (max-width:1000px) {
    // width: 100px;
  }
}
    .BoxItemimg {
      @media screen and (max-width:1000px) {
        height: 100px;
      }
      /* margin: auto; */
      flex-direction: column;
      /* justify-content: center; */
      align-items: center
    }
    // .address{
    //   width: 90% !important;

    // }
</style>
