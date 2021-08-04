<template>
  <div>
    <!-- <form class="operationBox" role="form" :action="this.url+'addXinxi.php'" method="post"
			enctype="multipart/form-data"> -->
    <div class="operationBoxItem">
      <div class="titleBox">
        学员信息录入
        <el-button type="primary" @click='goback' style="margin-left: 20px;">返回</el-button>
      </div>
      <div class="BoxItem">
        <div class="box">
          <div>
            <div class="BoxItemList">
              <label>姓名 :</label>
              <el-input v-model="row.name" placeholder="请输入姓名" name="name" style="width: 240px;">
              </el-input>
            </div>
            <div class="BoxItemList">
              <label>性别 :</label>
              <!-- <div class="BoxItemListDiv" v-if="!boxShow">{{row.serial}}</div> -->
              <el-input v-model="row.sex" placeholder="请输入性别" name="sex" style="width: 240px;">
              </el-input>
            </div>
            <div class="BoxItemList">
              <label>年龄 :</label>
              <!-- <div class="BoxItemListDiv" v-if="!boxShow">{{row.serial}}</div> -->
              <el-input v-model="row.age" placeholder="请输入年龄" name="age" style="width: 240px;">
              </el-input>
            </div>

          </div>
          <div class="uploadBox">
            <div class="BoxItemList BoxItemimg">
              <el-upload action="none" list-type="picture-card" :auto-upload="false" :limit="numberZhan"
                :file-list="advertisement" :on-exceed="exceedFile" :on-change="changeKey"
                :class="{hide:certHideUpload}">
                <i slot="default" class="el-icon-plus"></i>
                <div slot="file" slot-scope="{file}">
                  <img class="el-upload-list__item-thumbnail" :src="file.url" alt="">
                </div>
              </el-upload>
            </div>
          </div>
        </div>
        <div class="BoxItemList">
          <label>联系电话 :</label>
          <!-- <div class="BoxItemListDiv" v-if="!boxShow">{{row.serial}}</div> -->
          <el-input v-model="row.tel" placeholder="请输入联系电话" name="tel" style="width: 240px;"></el-input>
        </div>
        <div class="BoxItemList">
          <label>身份证 :</label>
          <!-- <div class="BoxItemListDiv" v-if="!boxShow">{{row.designation}}</div> -->
          <el-input v-model="row.codes" placeholder="请输入身份证" name="codes" style="width: 240px;">
          </el-input>
        </div>
        <div class="BoxItemList">
          <label>家庭住址 :</label>
          <el-input class="address" placeholder="请输入家庭住址" v-model="row.HomeAddress" name="HomeAddress">
          </el-input>
          <!-- <div class="BoxItemListDiv" v-if="!boxShow">{{row.price}}</div> -->
        </div>
        <div class="BoxItemList">
          <label style="">现居地 :</label>
          <el-input class="address" placeholder="请输入现居地" v-model="row.newAddress" name="newAddress">
          </el-input>
          <!-- <div v-if="!boxShow" class="BoxItemListDiv">{{row.particulars}}</div> -->
        </div>
        <!-- <div class="lianxi">联系人信息</div> -->
        <div class="BoxItemList">
          <label style="">父亲姓名 :</label>
          <el-input v-model="row.fatherName" placeholder="请输入父亲姓名" name="fatherName" style="width: 240px;"></el-input>
        </div>
        <div class="BoxItemList">
          <label style="">联系电话 :</label>
          <el-input v-model="row.fatherTel" placeholder="请输入联系电话" name="fatherTel" style="width: 240px;">
          </el-input>
          <!-- <div v-if="!boxShow" class="BoxItemListDiv">{{row.particulars}}</div> -->
        </div>
        <div class="BoxItemList">
          <label style="">母亲姓名 :</label>
          <el-input v-model="row.motherName" placeholder="请输入母亲姓名" name="motherName" style="width: 240px;"></el-input>
        </div>
        <div class="BoxItemList">
          <label style="">联系电话 :</label>
          <el-input v-model="row.motherTel" placeholder="请输入联系电话" name="motherTel" style="width: 240px;">
          </el-input>
          <!-- <div v-if="!boxShow" class="BoxItemListDiv">{{row.particulars}}</div> -->
        </div>
        <div class="BoxItemList">
          <label style="">学制 :</label>
          <el-input v-model="row.schooling" placeholder="请输入学制" name="schooling" style="width: 240px;">
          </el-input>
          <!-- <div v-if="!boxShow" class="BoxItemListDiv">{{row.particulars}}</div> -->
        </div>
        <div class="BoxItemList">
          <label style="">入学时间 :</label>
          <el-input v-model="row.enrollment" placeholder="请输入学时间" name="enrollment" style="width: 240px;">
          </el-input>
          <!-- <div v-if="!boxShow" class="BoxItemListDiv">{{row.particulars}}</div> -->
        </div>
        <div class="BoxItemList">
          <label style="">所学专业 :</label>
          <el-input v-model="row.major" placeholder="请输入所学专业" name="major" style="width: 240px;">
          </el-input>
          <!-- <div v-if="!boxShow" class="BoxItemListDiv">{{row.particulars}}</div> -->
        </div>
        <div class="BoxItemList">
          <label style="">专业老师 :</label>
          <el-input v-model="row.majorTeacher" placeholder="请输入专业老师" name="majorTeacher" style="width: 240px;">
          </el-input>
          <!-- <div v-if="!boxShow" class="BoxItemListDiv">{{row.particulars}}</div> -->
        </div>
        <div class="BoxItemList">
          <label style="">推荐人 :</label>
          <el-input v-model="row.referrer" placeholder="请输入推荐人" name="referrer" style="width: 240px;">
          </el-input>
          <!-- <div v-if="!boxShow" class="BoxItemListDiv">{{row.particulars}}</div> -->
        </div>
        <div class="BoxItemList">
          <label style="">备注信息 :</label>
          <el-input type="textarea" placeholder="请输入备注信息" class="address" name="remark" v-model="row.remark"></el-input>
          <!-- <div v-if="!boxShow" class="BoxItemListDiv">{{row.particulars}}</div> -->
        </div>
        <div class="BoxItemList">
          <!-- <label style="">库存详情</label> -->
          <!-- <el-button type="success" plain @click="addFen">录入</el-button> -->
          <input type="submit" class="suv" id="" value="录入" name="" @click="addList" />
        </div>
      </div>
    </div>
    <!-- </form> -->
    <el-dialog title="录入成功" :visible.sync="dialogVisible" :width="width" :before-close="handleClose">
      <span slot="footer" class="dialog-footer">
        <el-button @click="addListBox">再次录入</el-button>
        <el-button type="primary" @click='goback'>返回</el-button>
      </span>
    </el-dialog>

  </div>
</template>

<script>
  //
  import Qs from 'qs'
  export default {
    data() {
      return {
        width: "300px",
        dialogVisible: false,
        certHideUpload: false,
        certLimitCount: 1,
        showaddImg: true,
        disabled: false,
        advertisement: [], //保存的图片
        // url: 'http://localhost/xinxiPHP/',
        url: 'http://xinxi.hd512.com/xinxiPHP/',
        imgUrl: '',
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
      addListBox() { //再次录入
        this.dialogVisible = false
        this.row = {
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
        this.advertisement = []
        this.certHideUpload = false
      },
      handleClose() {
        this.dialogVisible = false
      },
      addList() {
        let row = this.row
        let data = new FormData();
        // data.append('imgs', row.img);
        for (var k in row) {
         data.append(k, row[k]);
        }
        this.$axios.post(`${this.url}/addXinxi.php`, data)
          .then(res => {
            console.log('res=>', res);
          })
      },
      changeKey(file, fileList) {
        this.certHideUpload = fileList.length >= this.certLimitCount
        let that = this
        console.log(file.raw, fileList)
        // 转码
        var reader = new FileReader();
        reader.readAsDataURL(file.raw);
        reader.onload = function(e) {
          that.row.img = this.result
        }
      },
      exceedFile(files, fileList) {
        this.$message.error('只能上传' + this.numberZhan + '个文件');
      },
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
        const isLt2M = file.size / 1024 / 1024 < 3;
        if (!isLt2M) {
          // alert('上传图片过大')
          this.$message({
            message: '上传图片过大，请重新上传',
            type: 'warning'
          });
          return false;
        }
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

<style lang="scss">
  .el-dialog__body {
    padding: 0;
  }

  .hide .el-upload--picture-card {
    display: none;
  }

  .el-upload-list__item,
  .el-upload--picture-card {
    width: 116px !important;
    height: 170px !important;
    line-height: 170px !important;
  }

  .uploadBox {
    position: relative;
  }

  .BoxItemimg {
    position: absolute;
    top: -44px;
  }

  // .el-input__inner{}
  .imgs {
    width: 70px;
    height: 100%;

    @media screen and (max-width:1000px) {
      width: 100%;
      // height: 100px;
      height: 100%;
    }

    ;
  }

  .address {
    width: 72% !important;

    @media screen and (max-width:1000px) {
      width: 240px !important;
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
      width: 70px;
      text-align: right;
      font-size: 12px;
      margin-right: 5px;
    }
  }

  .BoxItemList {
    width: 100%;
    margin-bottom: 10px;

    display: flex;
    align-items: center;

    @media screen and (max-width:1000px) {
      height: 55px;

      & label {
        // width:50px;
        // width: 60px !important;
      }

      &:nth-child(5) label,
      &:nth-child(6) label {
        // width:100px;
      }
    }

    ;
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

    @media screen and (max-width:1000px) {
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
    // margin-left: 30px;
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
    // padding: 10px;
    box-sizing: border-box;

    @media screen and (max-width:1000px) {
      width: 100%;
    }
  }

  .box>div:nth-child(1) {
    @media screen and (max-width:1000px) {
      width: 60%;
    }
  }

  .box>div:nth-child(1) label {
    @media screen and (max-width:1000px) {
      width: 102px;
    }
  }

  .box>div:nth-child(2) {
    width: 100%;
    height: 100%;
    margin: auto;

    @media screen and (max-width:1000px) {
      width: 30%;
      padding: 0 5px;
      padding-top: 20px;
      box-sizing: border-box;
    }
  }

  .box>div:nth-child(1) .BoxItemList:nth-child(2) {
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
