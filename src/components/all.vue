<template>
	<div class="allH5">
		<!-- 模态框 -->
		<div class="dialogss">
			<el-dialog title="您确定要退出么?" :visible.sync="dialogVisible" :width="width" :before-close="handleClose">
				<span slot="footer" class="dialog-footer">
					<el-button type="primary" @click="quedin">确 定</el-button>
				</span>
			</el-dialog>
		</div>
		<div class="allH5Tlt">
			北京辉达IT教育学员信息
			<!-- <div class="allH5TltBox" @click="delll">
				<i class="el-icon-arrow-left"></i>
			</div> -->
		</div>
		<div class="boxList" v-if="showBoxText">
			<div>
				<el-button type="success" @click="addXinxi">录入信息</el-button>
				<el-button type="primary"><a style="color:#fff; text-decoration: none;"
						href="http://xinxi.hd512.com/xinxiPHP/xsl.php" download>导出信息</a></el-button>
				<el-button type="danger" @click="delll">退出</el-button>
			</div>
			<div class="boxinput" style="margin-left: 20px;">
				<el-input style="width:250px;" class="inou" placeholder="请输入学员身份证或联系方式"
					@keyup.enter.native="input_phone_native" @blur="input_phone_blur" v-model="input_phone">
				</el-input>
				<el-button class="btn" type="primary" icon="el-icon-search" @click="inquire_phone">搜索</el-button>
			</div>
		</div>
		<div v-if="!showBoxText" style="display: flex; justify-content: center;">
			<div>
				<el-button type="success" @click="addXinxi">录入信息</el-button>
				<el-button type="primary"><a style="color:#fff; text-decoration: none;"
						href="http://xinxi.hd512.com/xinxiPHP/xsl.php" download>导出信息</a></el-button>
				<el-button type="danger" @click="delll">退出</el-button>
			</div>
		</div>
		<div v-if="!showBoxText" style="display: flex; justify-content: center; margin: 10px 0;">
			<div class="boxinput">
				<el-input style="width:250px;" class="inou" placeholder="请输入学员身份证或联系方式"
					@keyup.enter.native="input_phone_native" @blur="input_phone_blur" v-model="input_phone">
				</el-input>
				<el-button class="btn" type="primary" icon="el-icon-search" @click="inquire_phone">搜索</el-button>
			</div>
		</div>
		<!-- 表格 -->
		<div class="h5_table">
			<el-table :data="tableData.slice((currpage-1)*pagesize,currpage*pagesize)" style="width: 100%"
				class="tablebox">
				<el-table-column width="80;" prop="name" label="姓名">
				</el-table-column>
				<el-table-column width="60;" prop="sex" label="性别">
				</el-table-column>
				<el-table-column width="60;" prop="age" label="年龄">
				</el-table-column>
				<el-table-column prop="tel" label="手机号">
				</el-table-column>
				<el-table-column prop="codes" label="身份证号" width="200">
				</el-table-column>
				<el-table-column prop="major" label="所学专业">
				</el-table-column>
				<el-table-column prop="enrollment" label="入学时间">
				</el-table-column>
				<el-table-column prop="referrer" label="推荐人">
				</el-table-column>
				<el-table-column fixed="right" label="操作" width="150">
					<template slot-scope="scope">
						<el-button @click="handleClick(scope.row)" type="success" size="small" plain>详情</el-button>
						<!-- <el-buttontype="danger" size="small" plain>删除</el-button> -->
						<template>
							<el-popconfirm title="你确定要删除这个学生的信息么？" @confirm="delClick(scope.row.id)">
								<el-button slot="reference" type="danger" size="small" plain>删除</el-button>
							</el-popconfirm>
						</template>
					</template>
				</el-table-column>
				<div slot="append" v-if="tableData.length>0">
					<div class='sum_footer' ref='sum_heji'>
						<div style="width: 80px; padding: 0 10px;">总人数</div>
						<div style="width: 100px; text-align: center;">{{tableData.length}} 人</div>
					</div>
				</div>
			</el-table>

			<div class="man-content-pages">
				<el-pagination @size-change="handleSizeChange" @current-change="handleCurrentChange"
					:current-page.sync="currpage" :page-size="pagesize" layout="total, prev, pager, next, jumper"
					:total="tableData.length">
				</el-pagination>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				showBoxText:true,
				width: "260px",
				dialogVisible: false,
				// url: 'http://localhost/xinxiPHP/',
				url: 'http://xinxi.hd512.com/xinxiPHP/',
				input_phone: '', // 学员查询
				tableData: [],
				pagesize: 10, // 每页的数据条数
				currpage: 1, // 默认开始页面
				visible: false,
				modal: false, //模态框的状态
				details: [{}], //详情时看到的数据
			};
		},
		methods: {
			// excel(){
			// 	// this.$axios.get(this.url + 'xsl.php')
			// 	// .then(res => {

			// 	// 	console.log(res.data)
			// 	// })
			// },

			handleClose() {
				this.dialogVisible = false
			},
			quedin() {
				sessionStorage.removeItem('code')
				// 退出
				this.$router.push({
					name: 'index'
				});
				this.dialogVisible = false
			},
			delll() {
				console.log(1)
				this.dialogVisible = true
			},
			// 进去的时候判断是否有没有登录  请先登录
			deng() {
				if (!sessionStorage.getItem("code")) {
					this.$message('请先登录');
					this.$router.push({
						name: 'index'
					});
				}
			},
			info() {
				this.$axios.get(this.url + 'info.php').then(res => {
					console.log(res.data)
					this.tableData = res.data
				})
			},
			// 录入信息
			addXinxi() {
				// this.modal = true
				this.$router.push({
					name: 'addXinxi'
				});
			},
			// 手机号查询
			inquire_phone() {
				if (this.input_phone == '') {
					this.$message('请输入查询条件');
					return false;
				}
				// console.log(this.input_phone);
				this.$axios.get(this.url + 'search.php', {
					params: {
						codes: this.input_phone
					}
				}).then(res => {
					console.log(res.data)
					this.tableData = res.data
				})
			},
			input_phone_native() {
				this.inquire_phone()
			},
			input_phone_blur() {
				if (this.input_phone == '') {
					this.info()
				}
			},
			// 详情
			handleClick(row) {
				// console.log(row.codes);
				this.$router.push({
					name: 'updateXinxi',
					params: {
						row: row
					}
				});
			},
			// 删除
			delClick(index) {
				this.$axios.get(this.url + 'del.php', {
					params: {
						id: index
					}
				}).then(res => {
					console.log(res.data)
					if (res.data == 'ok') {
						this.$message({
							message: '删除成功',
							type: 'success'
						});
						// alert('删除成功')
             this.tableData=this.tableData.filter(item=>item.id!=index)
						this.info()
					} else {
						this.$message.error('删除失败');

					}
				})
			},
			// 分页--每页条数
			handleSizeChange(val) {
				console.log(`每页 ${val} 条`);
				this.pagesize = val
			},
			// 当前页
			handleCurrentChange(val) {
				console.log(`当前页: ${val}`);
				this.currpage = val
			}
		},
		mounted() {
			this.info()
			this.deng()
			this.flag = navigator.userAgent.match(
				/(phone|pad|pod|iPhone|iPod|ios|iPad|Android|Mobile|BlackBerry|IEMobile|MQQBrowser|JUC|Fennec|wOSBrowser|BrowserNG|WebOS|Symbian|Windows Phone)/i
			);
			console.log(this.flag);
			if (this.flag === null) {
				console.log("pc端");
				this.showBoxText=true
			} else {
				console.log("移动端");
				this.showBoxText=false
			}
		}
	}
</script>

<style scoped>
	.man-content-pages {
		display: flex;
		justify-content: center;
		height: 60px;
		align-items: center;
	}

	.sum_footer {
		height: 70px;
		line-height: 70px;
		display: flex;
	}
.boxinput .el-input__inner{
	border: 1px solid #fff !important;
}
	.h5_table {
		width: calc(100% - 22px);
		padding-left: 20px;
	}

	.allH5 .boxinput .el-button {
		border-radius: 0;
	}

	.allH5 .boxinput .el-input__inner {
		border: none;
	}

	.boxList {
		width: calc(100% - 40px);
		padding: 0 20px;
		display: flex;
		align-items: center;
		justify-content: center;
		margin-bottom: 20px;
	}

	.allH5 .boxinput {
		width: 300px;
		align-self:center;
		height: 36px;
		border: 1px solid #409EFF;
		display: flex;
		border-radius: 5px;
		overflow: hidden;
	}


	.el-dialog__body {
		padding: 0;
	}

	.allH5 {
		width: 100%;
		/* border: 1px solid #f00; */
		overflow: hidden;
	}

	.allH5Tlt {
		display: flex;
		justify-content: center;
		align-items: center;
		width: 100%;
		height: 60px;
		font-size: 20px;
		font-weight: 700;
		position: relative;
	}

	.allH5TltBox {
		position: absolute;
		left: 25px;
	}
</style>
