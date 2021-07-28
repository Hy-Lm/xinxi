<template>
  <div class="operationBox">
    <div class="operationBoxItem">
      <div class="titleBox">
        学员信息录入
        <!-- <el-button type="primary" style="margin-left: 20px;" v-if="boxShow">提交</el-button> -->
      </div>
      <div class="BoxItem">
        <div class="BoxItemList">
          <label>姓名:</label>
          <el-input v-model="row.name" style="width: 240px;"></el-input>
          <label>性别:</label>
          <!-- <div class="BoxItemListDiv" v-if="!boxShow">{{row.serial}}</div> -->
          <el-input v-model="row.sex" style="width: 60px;"></el-input>
          <label>年龄:</label>
          <!-- <div class="BoxItemListDiv" v-if="!boxShow">{{row.serial}}</div> -->
          <el-input v-model="row.age" style="width: 60px;"></el-input>
        </div>
        <div class="BoxItemList">
          <label>联系电话:</label>
          <!-- <div class="BoxItemListDiv" v-if="!boxShow">{{row.serial}}</div> -->
          <el-input v-model="row.tel" style="width: 240px;"></el-input>
          <label>身份证:</label>
          <!-- <div class="BoxItemListDiv" v-if="!boxShow">{{row.designation}}</div> -->
          <el-input v-model="row.codes" style="width: 240px;"></el-input>
        </div>
        <div class="BoxItemList">
          <label>家庭住址:</label>
          <el-input v-model="row.HomeAddress" style="width: 90%;"></el-input>
          <!-- <div class="BoxItemListDiv" v-if="!boxShow">{{row.price}}</div> -->
        </div>
        <div class="BoxItemList">
          <label style="">现居地:</label>
          <el-input v-model="row.newAddress" style="width: 90%;"></el-input>
          <!-- <div v-if="!boxShow" class="BoxItemListDiv">{{row.particulars}}</div> -->
        </div>
        <div class="lianxi">联系人信息</div>
        <div class="BoxItemList">
          <label style="">父亲姓名:</label>
          <el-input v-model="row.fatherName" style="width: 240px;"></el-input>
          <label style="">联系电话:</label>
          <el-input v-model="row.fatherTel" style="width: 240px;"></el-input>
          <!-- <div v-if="!boxShow" class="BoxItemListDiv">{{row.particulars}}</div> -->
        </div>
        <div class="BoxItemList">
          <label style="">母亲姓名:</label>
          <el-input v-model="row.motherName" style="width: 240px;"></el-input>
          <label style="">联系电话:</label>
          <el-input v-model="row.motherTel" style="width: 240px;"></el-input>
          <!-- <div v-if="!boxShow" class="BoxItemListDiv">{{row.particulars}}</div> -->
        </div>
        <div class="BoxItemList">
          <label style="">学制:</label>
          <el-input v-model="row.schooling" style="width: 240px;"></el-input>
          <!-- <div v-if="!boxShow" class="BoxItemListDiv">{{row.particulars}}</div> -->
        </div>
        <div class="BoxItemList">
          <label style="">入学时间:</label>
          <el-input v-model="row.enrollment" style="width: 240px;"></el-input>
          <!-- <div v-if="!boxShow" class="BoxItemListDiv">{{row.particulars}}</div> -->
        </div>
        <div class="BoxItemList">
          <label style="">所学专业:</label>
          <el-input v-model="row.major" style="width: 240px;"></el-input>
          <!-- <div v-if="!boxShow" class="BoxItemListDiv">{{row.particulars}}</div> -->
        </div>
        <div class="BoxItemList">
          <label style="">专业老师:</label>
          <el-input v-model="row.majorTeacher" style="width: 240px;"></el-input>
          <!-- <div v-if="!boxShow" class="BoxItemListDiv">{{row.particulars}}</div> -->
        </div>
        <div class="BoxItemList">
          <label style="">推荐人:</label>
          <el-input v-model="row.referrer" style="width: 240px;"></el-input>
          <!-- <div v-if="!boxShow" class="BoxItemListDiv">{{row.particulars}}</div> -->
        </div>
        <div class="BoxItemList">
          <label style="">备注信息:</label>
          <el-input type="textarea" v-model="row.remark" style="width: 90%;"></el-input>
          <!-- <div v-if="!boxShow" class="BoxItemListDiv">{{row.particulars}}</div> -->
        </div>
        <div class="BoxItemList">
          <!-- <label style="">库存详情</label> -->
          <el-button type="success" plain @click="addFen">录入</el-button>
        </div>
      </div>
    </div>
    <div class="operationBoxItem" style="padding: 0 20px; ">
      <div class="boxImg boxImgA">
        <el-upload class="avatar-uploader showUploader" list-type="picture-card" ref="businessLicense" action
          :auto-upload="false" :on-preview="handlePreview" :on-remove="handleRemove" :before-remove="beforeRemove"
          :on-change="uploadSectionFile" :limit="1">
          <img v-if="photo" :src="photo" class="avatar">
          <i v-else class="el-icon-plus avatar-uploader-icon"></i>
        </el-upload>
        <p class="pp">注:请上传2寸或1存照片</p>
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
        files: {},
        photo: '',
        photoObj: '',
        // boxShow:false,
        row: {
          name:'',
          sex:'',
          age:'',
          codes:'',
          tel:'',
          HomeAddress:'',
          newAddress:'',
          fatherName:'',
          fatherTel:'',
          motherName:'',
          motherTel:'',
          schooling:'',
          enrollment:'',
          major:'',
          majorTeacher:'',
          referrer:'',
          remark:''
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
    mounted() {},
    methods: {
      // uploadDisabled:function() {
      //         return this.imagelist.length >0
      //     },
      changeKey(file, fileList) {
        console.log(file, fileList)
      },
      uploadFileSuccess(response, file, fileList) {
        console.log("成功")
        // 上传成功的回调，将其名称返回给后台
        // console.log(response, file, fileList)
        // if (response.data.error == 0) {
        // 	file.response = response.data.data;
        // 	this.fileList.push(file)
        // } else {
        // 	this.$message.error(response.data.message); //文件上传错误提示
        // }

      },
      handlePreview(file) {
        console.log(file);
      },
      beforeRemove(file, fileList) {
        return this.$confirm(`确定移除 ${ file.name }？`);
      },
      uploadSectionFile(file) {
        const typeArr = ['image/png', 'image/gif', 'image/jpeg', 'image/jpg'];
        const isJPG = typeArr.indexOf(file.raw.type) !== -1;
        const isLt3M = file.size / 1024 / 1024 < 3;
        if (!isJPG) {
          this.$message.error('只能是图片!');
          this.$refs.upload.clearFiles();
          this.files = null;
          return;
        }
        if (!isLt3M) {
          this.$message.error('上传图片大小不能超过 3MB!');
          this.$refs.upload.clearFiles();
          this.files = null;
          return;
        }
        this.files = file;
        // FormData 对象
        // var formData = new FormData();

        // 文件对象
        // var formData= this.files
        console.log(this.files.url)
        // let config = {
        //   headers: {
        //     'Content-Type': 'multipart/form-data'
        //   },
        //   methods: 'post'
        // }
        // this.$axios.get(this.url+"upload.php", {params:{formData:JSON.stringify(file)}}).then(res => {
        //   console.log(res)
        //   // if (res.data.flag == 'S') {
        //   //   this.photoObj = res.data.data.objectId
        //   //   this.photo = res.data.data.url
        //   // } else {
        //   //   this.$message.error(res.data.message)
        //   // }
        // })
      },

      handleRemove(file) {
        console.log(file);
      },
      handlePictureCardPreview(file) {
        this.dialogImageUrl = file.url;
        this.dialogVisible = true;
      },
      handleDownload(file) {
        console.log(file);
      },
      handleSelectChange() {},
      handleChange(e) {
        console.log(e)
      },
      addFen() { //点击添加按钮时
     // 将数据添加到数据库中
        // console.log(this.form)
        this.row.img=this.files.url
        this.$axios.get(this.url+'addXinxi.php', {params:{row:JSON.stringify(this.row)}}).then(res => {
            console.log(res)
            if(res.data=='ok'){
              alert('录入成功')
            }else{
              alert('请输入正确的信息')
            }
        })
      },
      modification(val) { //点击修改时
        console.log(val)
        this.titleBox = "修改" + val.name + "库存"
        this.form = val
        this.show = true
        this.dialogFormVisible = true
      },
      deleteById(val, index) {
        this.confirmItem = "您确定要删除" + val.name + "的库存么"
        this.subbranch.splice(index, 1)
        this.$notify({
          title: '成功',
          message: val.name + " 库存删除成功",
          type: 'success'
        });
      }
    }
  };
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
    height: 100%;
    display: flex;
    /* align-items: center; */
    flex-direction: column;
  }

  .pp {
    color: #666;
    font-size: 12px;
  }
  .disabled .el-upload--picture-card {
      display: none;
  }
</style>
