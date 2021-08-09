<template>
	<!-- <div>
		<div class="operationBoxItem">
			<div class="titleBox">
				学员信息
				<el-button type="primary" @click='goback' style="margin-left: 20px;">返回</el-button>
			</div>
			<div class="BoxItem">
				<input type="hidden" name="id" v-model="row.id" value="" />
				<div class="box">
					<div>
						<div class="BoxItemList">
							<label>姓名:</label>
							<el-input :disabled="dis" v-model="row.name" name="name" style="width: 240px;">
							</el-input>
						</div>
						<div class="BoxItemList">
							<label>性别:</label>
							<el-input :disabled="dis" v-model="row.sex" name="sex" style="width: 240px;"></el-input>
						</div>
						<div class="BoxItemList">
							<label>年龄:</label>
							<el-input :disabled="dis" v-model="row.age" name="age" style="width: 240px;"></el-input>
						</div>
					</div>
					<div class="uploadBox">
						<div class="BoxItemList BoxItemimg">
							<img :src="row.img" style="width: 100%;" v-if="!elupload">
							<el-upload v-if="elupload" action="none" list-type="picture-card" :auto-upload="false"
								:limit="numberZhan" :file-list="advertisement" :on-exceed="exceedFile"
								:on-change="changeKey" :class="{hide:certHideUpload}">
								<i slot="default" class="el-icon-plus"></i>
								<div slot="file" slot-scope="{file}">
									<img class="el-upload-list__item-thumbnail" :src="file.url" alt="">
								</div>
							</el-upload>
						</div>
					</div>
				</div>
				<div class="BoxItemList">
					<label>联系电话:</label>
					<el-input :disabled="dis" v-model="row.tel" name="tel" style="width: 240px;"></el-input>
				</div>
				<div class="BoxItemList">
					<label>身份证:</label>
					<el-input :disabled="dis" v-model="row.codes" name="codes" style="width: 240px;"></el-input>
				</div>
				<div class="BoxItemList">
					<label>家庭住址:</label>
					<el-input :disabled="dis" class="address" name='HomeAddress' v-model="row.HomeAddress">
					</el-input>
				</div>
				<div class="BoxItemList">
					<label style="">现居地:</label>
					<el-input :disabled="dis" class="address" name='newAddress' v-model="row.newAddress"></el-input>
				</div>
				<div class="BoxItemList">
					<label style="">父亲姓名:</label>
					<el-input :disabled="dis" name='fatherName' v-model="row.fatherName" style="width: 240px;">
					</el-input>
				</div>
				<div class="BoxItemList">
					<label style="">联系电话:</label>
					<el-input :disabled="dis" name='fatherTel' v-model="row.fatherTel" style="width: 240px;">
					</el-input>
				</div>
				<div class="BoxItemList">
					<label style="">母亲姓名:</label>
					<el-input :disabled="dis" name='motherName' v-model="row.motherName" style="width: 240px;">
					</el-input>
				</div>
				<div class="BoxItemList">
					<label style="">联系电话:</label>
					<el-input :disabled="dis" name='motherTel' v-model="row.motherTel" style="width: 240px;">
					</el-input>
				</div>
				<div class="BoxItemList">
					<label style="">学制:</label>
					<el-input :disabled="dis" name='schooling' v-model="row.schooling" style="width: 240px;">
					</el-input>
				</div>
				<div class="BoxItemList">
					<label style="">入学时间:</label>
					<el-input :disabled="dis" name='enrollment' v-model="row.enrollment" style="width: 240px;">
					</el-input>
				</div>
				<div class="BoxItemList">
					<label style="">所学专业:</label>
					<el-input :disabled="dis" name='major' v-model="row.major" style="width: 240px;"></el-input>
				</div>
				<div class="BoxItemList">
					<label style="">专业老师:</label>
					<el-input :disabled="dis" name='majorTeacher' v-model="row.majorTeacher" style="width: 240px;">
					</el-input>
				</div>
				<div class="BoxItemList">
					<label style="">推荐人:</label>
					<el-input :disabled="dis" name='referrer' v-model="row.referrer" style="width: 240px;">
					</el-input>
				</div>
				<div class="BoxItemList">
					<label style="">备注信息:</label>
					<el-input :disabled="dis" class="address" name='remark' type="textarea" v-model="row.remark">
					</el-input>
				</div>
				<div class="BoxItemList">
					<el-button type="primary" @click="updateXinx" plain v-if="dis">修改信息</el-button>
					<el-button type="primary" @click="addList" plain v-if="!dis">完成</el-button>
				</div>
			</div>
		</div>
		<el-dialog title="修改成功" :visible.sync="dialogVisible" :width="width" :before-close="handleClose">
			<span slot="footer" class="dialog-footer" >
				<el-button type="primary" @click='goback'>返回</el-button>
			</span>
		</el-dialog>
	</div> -->
	<div class="addList">
		<div class="addListBox">
			辉达学员信息
		</div>
		<div class="addListItem">
			<div class="addListItemBox">
				<div class="BoxItemList">
					<label>姓名 :</label>
					<el-input :disabled="dis" v-model="row.name" placeholder="请输入姓名" name="name" style="width: 140px;">
					</el-input>
				</div>
				<div class="BoxItemList">
					<label>性别 :</label>
					<el-input :disabled="dis" v-model="row.sex" placeholder="请输入性别" name="sex" style="width: 140px;">
					</el-input>
				</div>
				<div class="BoxItemList">
					<label>年龄 :</label>
					<el-input :disabled="dis" v-model="row.age" placeholder="请输入年龄" name="age" style="width: 140px;">
					</el-input>
				</div>
				<div class="BoxItemList">
					<label>联系电话 :</label>
					<el-input :disabled="dis" v-model="row.tel" placeholder="请输入联系电话" name="tel" style="width: 260px;">
					</el-input>
				</div>
				<div class="BoxItemList">
					<label>身份证 :</label>
					<el-input :disabled="dis" v-model="row.codes" placeholder="请输入身份证" name="codes"
						style="width: 260px;">
					</el-input>
				</div>
				<div class="BoxItemList">
					<label>家庭住址 :</label>
					<el-input :disabled="dis" placeholder="请输入家庭住址" v-model="row.HomeAddress" name="HomeAddress"
						style="width: 260px;">
					</el-input>
				</div>
				<div class="BoxItemList">
					<label style="">现居地 :</label>
					<el-input :disabled="dis" placeholder="请输入现居地" v-model="row.newAddress" name="newAddress"
						style="width: 260px;">
					</el-input>
				</div>
				<div class="BoxItemList">
					<label style="">父亲姓名 :</label>
					<el-input :disabled="dis" v-model="row.fatherName" placeholder="请输入父亲姓名" name="fatherName"
						style="width: 260px;"></el-input>
				</div>
				<div class="BoxItemList">
					<label style="">联系电话 :</label>
					<el-input :disabled="dis" v-model="row.fatherTel" placeholder="请输入联系电话" name="fatherTel"
						style="width: 260px;">
					</el-input>
				</div>
				<div class="BoxItemList">
					<label style="">母亲姓名 :</label>
					<el-input :disabled="dis" v-model="row.motherName" placeholder="请输入母亲姓名" name="motherName"
						style="width: 260px;"></el-input>
				</div>
				<div class="BoxItemList">
					<label style="">联系电话 :</label>
					<el-input :disabled="dis" v-model="row.motherTel" placeholder="请输入联系电话" name="motherTel"
						style="width: 260px;">
					</el-input>
				</div>
				<div class="BoxItemList">
					<label style="">学制 :</label>
					<el-input :disabled="dis" v-model="row.schooling" placeholder="请输入学制" name="schooling"
						style="width: 260px;">
					</el-input>
				</div>
				<div class="BoxItemList">
					<label style="">入学时间 :</label>
					<el-input :disabled="dis" v-model="row.enrollment" placeholder="请输入学时间" name="enrollment"
						style="width: 260px;">
					</el-input>
				</div>
				<div class="BoxItemList">
					<label style="">所学专业 :</label>
					<el-input :disabled="dis" v-model="row.major" placeholder="请输入所学专业" name="major"
						style="width: 260px;">
					</el-input>
				</div>
				<div class="BoxItemList">
					<label style="">专业老师 :</label>
					<el-input :disabled="dis" v-model="row.majorTeacher" placeholder="请输入专业老师" name="majorTeacher"
						style="width: 260px;">
					</el-input>
				</div>
				<div class="BoxItemList">
					<label style="">推荐人 :</label>
					<el-input :disabled="dis" v-model="row.referrer" placeholder="请输入推荐人" name="referrer"
						style="width: 260px;">
					</el-input>
				</div>
				<div class="BoxItemList" style="display: flex;">
					<label style="margin-right:4px ;">备注信息 :</label>
					<el-input :disabled="dis" type="textarea" placeholder="请输入备注信息" name="remark" style="width: 260px;"
						v-model="row.remark"></el-input>
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

								<span class="el-upload-list__item-delete" @click="handleRemove(file)" v-if="!dis">
									<i class="el-icon-delete"></i>
								</span>
							</span>
						</div>

					</el-upload>
				</div>
				<div style="display: flex; justify-content: center; margin-bottom: 20px;">
					<el-button type="primary" @click="updateXinx" plain v-if="dis">修改信息</el-button>
					<el-button type="primary" @click="addList" plain v-if="!dis">完成</el-button>
				</div>
			</div>
		</div>
		<el-dialog :visible.sync="dialogVisibleImg">
			<img width="100%" :src="dialogImageUrl" alt="">
		</el-dialog>
		<div class="dialogss">
			<el-dialog title="修改成功" :visible.sync="dialogVisible" :width="width" :before-close="handleClose">
				<span slot="footer" class="dialog-footer">
					<el-button type="primary" @click='goback'>返回</el-button>
				</span>
			</el-dialog>
		</div>
		
	</div>
</template>

<script>
	//
	export default {
		data() {
			return {
				dall:false,//是否删除图片重新上传
				dialogImageUrl: '',
				dialogVisibleImg: false,
				width: "300px",
				dialogVisible: false,
				certHideUpload: false,
				certLimitCount: 1,
				numberZhan: 1,
				advertisement: [], //保存的图片
				elupload: false,
				url: 'http://xinxi.hd512.com/xinxiPHP/',
				// url: 'http://localhost/xinxiPHP/',
				imgUrl: '',
				imgactive: false,
				dis: true,
				photo: true,
				row: {
					id: '',
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
			this.deng()
			this.info()
		},
		methods: {
			handlePictureCardPreview(file) { //大图
				this.dialogVisibleImg = true
				console.log(file)
				this.dialogImageUrl = file.url
			},
			handleRemove() { //删除
				this.dall=true
				this.advertisement = []
				this.certHideUpload = false
			},
			handleClose() {
				this.dialogVisible = false
			},
			addList() {
				let row = this.row
				if(!this.dall){
					row.img = '.' + row.img.split('.')[2] + '.' + row.img.split('.')[3]
				}else{
					row.update="update"
				}
				console.log(row)
				let data = new FormData();
				for (var k in row) {
					data.append(k, row[k]);
				}
				this.$axios.post(`${this.url}updateXx.php`, data)
					.then(res => {
						console.log(res)
						if (res.data == 'ok') {
							this.dialogVisible = true
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
			deng() {
				if (!this.$route.params.row) {
					this.$router.push({
						name: 'all'
					});
				}
			},

			goback() {
				this.$router.push({
					name: 'all'
				});
			},
			updateXinx() {
				this.dis = false
				// this.elupload = true
				this.imgactive = true
				// this.row.img = ''
				for (var k in this.row) {
					if (this.row[k] == '无数据') {
						this.row[k] = ''
					}
				}
			},
			info() {
				console.log(this.$route.params.row.id)
				this.$axios.get(this.url + 'xinxiid.php', {
					params: {
						id: this.$route.params.row.id
					}
				}).then(res => {
					console.log(res.data)
					// advertisement.push
					this.row = res.data[0]
					let url = {
						url: this.row.img
					}
					this.advertisement.push(url)
					this.certHideUpload = true
					for (var k in this.row) {
						if (this.row[k] == '') {
							this.row[k] = '无数据'
						}
					}
				})
			}
		}
	}
</script>



<style lang="scss">
	.dialogss .el-dialog__body {
		padding: 0;
	}
	.uploadImg {
		position: absolute;
		top: 10px;
		left: 240px;
	}

	.BoxItemList label {
		display: inline-block;
		width: 80px;
		text-align: right;
	}

	.BoxItemList {
		margin: 10px 0;
	}

	.addListItemBox {
		position: relative;
		width: 400px;
	}

	.addList {
		width: calc(100% - 40px);
		padding: 0 20px;
	}

	.addListBox {
		height: 60px;
		line-height: 60px;
		text-align: center;
		font-size: 20px;
	}

	.addListItem {

		width: 100%;
		display: flex;
		justify-content: center;
	}

	.el-upload-list__item {
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
