<template>
	<div class="man-box">
		<div class="man-box-h">
			<div class="boxtit">北京辉达IT教育学员信息
				<div class="tui" @click="delll">
					返回
				</div>
			</div>
			<div class="boxinput">
				<el-input style="width:250px;" class="inou" placeholder="请输入学员身份证或联系方式"
					@keyup.enter.native="input_phone_native" @blur="input_phone_blur" v-model="input_phone">
				</el-input>
				<el-button class="btn" type="primary" icon="el-icon-search" @click="inquire_phone">搜索</el-button>
			</div>
			<!-- <div class="man-box-h-l">
        <div class="demo-input-suffix" style="color: #000;font-size: 18px;">
          <span>学员信息查询</span>
          <div>
            <el-input class="inou" placeholder="请输入学员身份证或联系方式" @keyup.enter.native="input_phone_native"
              @blur="input_phone_blur" v-model="input_phone">
            </el-input>
            <el-button class="btn" type="primary" icon="el-icon-search" @click="inquire_phone">搜索</el-button>
          </div>

        </div>
      </div>
      <div class="btns" style="margin-right: 30px;">
        <el-button type="danger" @click="addXinxi">录入信息</el-button>
        <el-button type="success" @click="delll">退出</el-button>
      </div> -->
		</div>

		<!-- 表格 -->
		<div class="man-content-table">
			<el-table :data="tableData.slice((currpage-1)*pagesize,currpage*pagesize)" style="width: 100%"
				class="tablebox">
				<el-table-column prop="name" label="姓名">
				</el-table-column>
				<el-table-column prop="sex" label="性别">
				</el-table-column>
				<el-table-column prop="age" label="年龄">
				</el-table-column>
				<el-table-column prop="tel" label="手机号">
				</el-table-column>
				<el-table-column prop="codes" label="身份证" width="200">
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
						<el-button @click="delClick(scope.row.id)" type="danger" size="small" plain>删除</el-button>
					</template>
				</el-table-column>
			</el-table>
			<!-- 分页 -->
			<div class="man-content-pages">
				<div class="dixi">
					<el-button type="success" @click="addXinxi">录入信息</el-button>
					<div class="ren">总人数 : {{tableData.length}}人</div>
				</div>
				<el-pagination @size-change="handleSizeChange" @current-change="handleCurrentChange"
					:current-page.sync="currpage" :page-size="pagesize" layout="total, prev, pager, next, jumper"
					:total="tableData.length">
				</el-pagination>
			</div>
		</div>
		<el-dialog title="您确定要退出么?" :visible.sync="dialogVisible" :width="width" :before-close="handleClose">
			<span slot="footer" class="dialog-footer">
				<el-button type="primary" @click="quedin">确 定</el-button>
			</span>
		</el-dialog>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				width: "20%",
				dialogVisible: false,
				// url: 'http:///localhost/xinxiPHP/',
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
		mounted() {
			var system = {};
			var p = navigator.platform;
			console.log(p);
			system.win = p.indexOf("Win") == 0;
			system.mac = p.indexOf("Mac") == 0;
			if (system.win || system.mac) { //如果是电脑
				console.log('电脑')
			} else { //如果是手机,
				this.uploadShow = false
				console.log('手机')
			}


		},
		methods: {
			handleClose() {
				console.log(1)
			},
			quedin(){
				sessionStorage.removeItem('code')
				// 退出
				this.$router.push({
					name: 'index'
				});
				this.dialogVisible=false
			},
			delll() {
				this.dialogVisible=true

			},
			// 进去的时候判断是否有没有登录  请先登录
			deng() {
				if (!sessionStorage.getItem("code")) {
					alert('请先登录')
					this.$router.push({
						name: 'index'
					});
				}
			},
			info() {
				this.$axios.get(this.url + 'info.php').then(res => {
					// console.log(res.data)
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
					alert('请输入查询条件')
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
						alert('删除成功')
						this.info()
					} else {
						alert('删除失败')
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
		}
	}
</script>

<style>
	.man-box {
		margin-top: 20px;
		width: calc(100vw - 40px);
		padding: 0 20px;
		overflow: hidden;
	}

	.dixi {
		display: flex;
		align-items: center;
	}

	/* 搜索框 */
	.el-dialog__body {
		padding: 0;
	}

	.el-input__inner {
		border-radius: 0;
		border: none;
	}

	.boxinput {
		/* padding-left: 35px; */
		background: #409EFF;
		width: 350px;
		border-radius: 10px;
		overflow: hidden;
		border: 1px solid #409EFF;
		height: 40px;

	}

	/* 表格头部 */
	.tui {
		font-size: 16px;
		position: absolute;
		top: 0;
		left: 0px;
	}

	.boxtit {
		position: relative;
		font-size: 20px;
		font-weight: 700px;
		width: calc(100vw - 20px);
		text-align: center;
		margin-bottom: 20px;
		line-height: 34px;
	}

	/* 表格 */
	/* 	.man-content-table .el-table__body-wrapper .el-table_1_column_5 {
		color: #EA4A3C;
	} */
	.ren {
		font-size: 13px;
		height: 28px;
		line-height: 28px;
		margin-left: 20px;
	}

	.tablebox th,
	.tablebox tr,
	.tablebox td {
		/* padding: 0 !important; */
		height: 48px;
		line-height: 48px !important;
	}
</style>
<style scoped lang="scss">
	.btns {
		@media screen and (max-width:1000px) {
			// text-align: center;
			margin-left: 30px;
		}
	}

	.man-box {
		height: 100%;
		background-color: #fff;
	}

	.man-box-h {
		// padding: 10px 0;
		// overflow: hidden;
		// padding-right: 50px;
		// box-sizing: border-box;
		// display: flex;
		// justify-content: space-between;

		@media screen and (max-width:1000px) {
			width: 100%;
			// height: 400px;
			flex-direction: column;
			// padding: 10px;
		}

		.demo-input-suffix {
			display: flex;
			align-items: center;

			&>span {
				@media screen and (max-width:1000px) {
					margin-bottom: 20px;
				}
			}

			&>div {
				display: flex;
				align-items: center;

				&>.inou {
					width: 300px;

					@media screen and (max-width:1000px) {
						width: 200px;
					}
				}
			}

			@media screen and (max-width:1000px) {
				flex-direction: column;

				// display: inline-block;
			}
		}

		.man-box-h-l {
			height: 50px;
			line-height: 50px;
			margin-left: 25px;

			@media screen and (max-width:1000px) {
				width: 100%;
				height: 100px;
				flex-direction: column;
				margin-left: 0;
			}

			;

			span {
				display: inline-block;
				float: left;
				width: auto;
				height: 25px;
				line-height: 25px;
				opacity: 1;
				font-size: 18px;
				color: #363636;
				margin-right: 17px;
				vertical-align: middle;
			}

		}

	}

	.el-button+.el-button {
		@media screen and (max-width:1000px) {
			margin-left: 0;
		}
	}

	.el-button--primary {
		@media screen and (max-width:1000px) {
			height: 40px;
		}
	}

	// .el-input__inner{
	//       @media screen and (max-width:1000px) {
	//       height: 45px;
	//     }
	// }
	// 表格

	.man-content-table {
		// padding-left: 25px;
		// padding-right: 50px;

		@media screen and (max-width:1000px) {
			// padding: 10px;
		}
	}

	// 分页
	.man-content-pages {
		text-align: right;
		padding: 20px 0;

	}

	.el-table--border,
	.el-table--group {
		border: none;
	}

	.el-pagination button {
		background-color: #DEE5E7;
	}

	.man-content-pages {
		// padding-left: 30px;
		display: flex;
		// align-items: center;
		justify-content: space-between;

		@media screen and (max-width:1000px) {
			flex-direction: column;
		}
	}
</style>
