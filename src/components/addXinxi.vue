<template>
  <div class="addList">
	  <div class="addListBox">
		  辉达学员信息录入
	  </div>
	  <div class="addListItem">
		  <div class="addListItemBox">
			  <div class="BoxItemList">
			    <label>姓名 :</label>
			    <el-input v-model="row.name" placeholder="请输入姓名" name="name" style="width: 140px;">
			    </el-input>
			  </div>
			  <div class="BoxItemList">
			    <label>性别 :</label>
			    <el-input v-model="row.sex" placeholder="请输入性别" name="sex" style="width: 140px;">
			    </el-input>
			  </div>
			  <div class="BoxItemList">
			    <label>年龄 :</label>
			    <el-input v-model="row.age" placeholder="请输入年龄" name="age" style="width: 140px;">
			    </el-input>
			  </div>
			  <div class="BoxItemList">
			    <label>联系电话 :</label>
			    <el-input v-model="row.tel" placeholder="请输入联系电话" name="tel" style="width: 260px;"></el-input>
			  </div>
			  <div class="BoxItemList">
			    <label>身份证 :</label>
			    <el-input v-model="row.codes" placeholder="请输入身份证" name="codes" style="width: 260px;">
			    </el-input>
			  </div>
			  <div class="BoxItemList">
			    <label>家庭住址 :</label>
			    <el-input  placeholder="请输入家庭住址" v-model="row.HomeAddress" name="HomeAddress" style="width: 260px;">
			    </el-input>
			  </div>
			  <div class="BoxItemList">
			    <label style="">现居地 :</label>
			    <el-input  placeholder="请输入现居地" v-model="row.newAddress" name="newAddress" style="width: 260px;">
			    </el-input>
			  </div>
			  <div class="BoxItemList">
			    <label style="">父亲姓名 :</label>
			    <el-input v-model="row.fatherName" placeholder="请输入父亲姓名" name="fatherName" style="width: 260px;"></el-input>
			  </div>
			  <div class="BoxItemList">
			    <label style="">联系电话 :</label>
			    <el-input v-model="row.fatherTel" placeholder="请输入联系电话" name="fatherTel" style="width: 260px;">
			    </el-input>
			  </div>
			  <div class="BoxItemList">
			    <label style="">母亲姓名 :</label>
			    <el-input v-model="row.motherName" placeholder="请输入母亲姓名" name="motherName" style="width: 260px;"></el-input>
			  </div>
			  <div class="BoxItemList">
			    <label style="">联系电话 :</label>
			    <el-input v-model="row.motherTel" placeholder="请输入联系电话" name="motherTel" style="width: 260px;">
			    </el-input>
			  </div>
			  <div class="BoxItemList">
			    <label style="">学制 :</label>
			    <el-input v-model="row.schooling" placeholder="请输入学制" name="schooling" style="width: 260px;">
			    </el-input>
			  </div>
			  <div class="BoxItemList">
			    <label style="">入学时间 :</label>
			    <el-input v-model="row.enrollment" placeholder="请输入学时间" name="enrollment" style="width: 260px;">
			    </el-input>
			  </div>
			  <div class="BoxItemList">
			    <label style="">所学专业 :</label>
			    <el-input v-model="row.major" placeholder="请输入所学专业" name="major" style="width: 260px;">
			    </el-input>
			  </div>
			  <div class="BoxItemList">
			    <label style="">专业老师 :</label>
			    <el-input v-model="row.majorTeacher" placeholder="请输入专业老师" name="majorTeacher" style="width: 260px;">
			    </el-input>
			  </div>
			  <div class="BoxItemList">
			    <label style="">推荐人 :</label>
			    <el-input v-model="row.referrer" placeholder="请输入推荐人" name="referrer" style="width: 260px;">
			    </el-input>
			  </div>
			  <div class="BoxItemList" style="display: flex;">
			    <label style="margin-right:4px ;">备注信息 :</label>
			    <el-input type="textarea" placeholder="请输入备注信息"  name="remark" style="width: 260px;" v-model="row.remark"></el-input>
			  </div>
			  <div class="uploadImg">
				 <el-upload action="none" list-type="picture-card" :auto-upload="false" :limit="numberZhan"
				   :file-list="advertisement" :on-exceed="exceedFile" :on-change="changeKey"
				   :class="{hide:certHideUpload}">
				   <i slot="default" class="el-icon-plus"></i>
				   <div slot="file" slot-scope="{file}">
					 <img class="el-upload-list__item-thumbnail" :src="file.url" alt="">
					<span class="el-upload-list__item-actions">
						<span class="el-upload-list__item-preview" @click="handlePictureCardPreview(file)">
							<i class="el-icon-zoom-in"></i>
						</span>
						
						<span  class="el-upload-list__item-delete" @click="handleRemove(file)">
							<i class="el-icon-delete"></i>
						</span>
					</span>
				   </div>
				   
				 </el-upload>
			 </div>
			 <div style="display: flex; justify-content: center; margin-bottom: 20px;">
			 	<el-button type="primary" @click="addList" plain>录 入</el-button>
			 </div>
		  </div>
		  
	  </div>
	  <el-dialog :visible.sync="dialogVisibleImg">
	  	<img width="100%" :src="dialogImageUrl" alt="">
	  </el-dialog>
	<div class="dialogss">
		<el-dialog title="录入成功" :visible.sync="dialogVisible" :width="width" :before-close="handleClose">
		  <span slot="footer" class="dialog-footer">
		    <el-button @click="addListBox">再次录入</el-button>
		    <el-button type="primary" @click='goback'>返回</el-button>
		  </span>
		</el-dialog>
	</div>
	  
  </div>
</template>

<script>
  //
  import Qs from 'qs'
  export default {
    data() {
      return {
		dialogVisibleImg:false,
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
		
		handlePictureCardPreview(file){//大图
			this.dialogVisibleImg=true
			console.log(file)
			this.dialogImageUrl=file.url
		},
		handleRemove(){//删除
			this.advertisement=[]
			this.certHideUpload = false
			
		},
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
        if(this.row.img==""){
        	this.$message('请上传图片');
        	return false
        }
        let data = new FormData();
        // data.append('imgs', row.img);
        for (var k in row) {
         data.append(k, row[k]);
        }
        this.$axios.post(`${this.url}/addXinxi.php`, data)
          .then(res => {
            // console.log('res=>', res);
            if(res.data=='ok'){
              this.dialogVisible=true
            }
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
	.dialogss .el-dialog__body {
		padding: 0;
	}
	.uploadImg{
		position: absolute;
		top:10px;
		left:240px;
	}
	.BoxItemList label{
		display: inline-block;
		width: 80px;
		text-align: right;
	}
	.BoxItemList{
		margin: 10px 0;
	}
	.addListItemBox{
		position: relative;
		width: 400px;
	}
	.addList{
		width: calc(100% - 40px);
		padding: 0 20px;
	}
	.addListBox{
		height: 60px;
		line-height: 60px;
		text-align: center;
		font-size: 20px;
	}
	.addListItem{
		
		width: 100%;
		display: flex;
		justify-content: center;
	}
	.el-upload-list__item{
		border: none;
	}
	.el-upload-list__item,
	.el-upload--picture-card {
	  width: 100px !important;
	  height: 140px !important;
	  line-height: 140px !important;
	}
	.hide .el-upload--picture-card {
	  display: none;
	}
	
</style>
