<template>
	<div>
		<div id="shouye" v-if="logins">
			<h1>辉达学员信息录入系统</h1>
			<el-form :model="ruleForm" status-icon ref="ruleForm" label-width="40px" class="demo-ruleForm">
				<el-form-item label="账号">
					<el-input type="name" ref="name" placeholder="请输入账号" v-model="ruleForm.name" autocomplete="off">
					</el-input>
				</el-form-item>
				<el-form-item label="密码">
					<el-input type="password" ref="pass" placeholder="请输入密码" v-model="ruleForm.pass" autocomplete="off">
					</el-input>
				</el-form-item>
				<el-form-item>
					<div class="xiugai"><span @click="xiugai">忘记密码</span> </div>
				</el-form-item>
				<el-form-item>
					<el-button type="primary" @click="login">登录</el-button>
					<el-button @click="zhuci">注册</el-button>
				</el-form-item>
			</el-form>
		</div>
		<!-- 修改密码 -->
		<div id="shou" v-else="logins">
			<h1>学员信息录入系统</h1>
			<el-form :model="ruleForm" status-icon ref="ruleForm" label-width="100px" class="demo-ruleForm">
				<el-form-item label="身份证账号">
					<el-input type="name" ref="name" placeholder="请输入身份证账号" v-model="ruleForm.name" autocomplete="off">
					</el-input>
				</el-form-item>
				<el-form-item label="新密码">
					<el-input type="password" ref="pass" placeholder="请输入新密码" v-model="ruleForm.pass"
						autocomplete="off">
					</el-input>
				</el-form-item>
				<el-form-item>
					<el-button type="primary" @click="bb">返回</el-button>
					<el-button type="primary" @click='update'>提交</el-button>
				</el-form-item>
			</el-form>
		</div>
	</div>

</template>

<script>
	export default {
		name: 'index',
		data() {
			return {
				// url: 'http://localhost/xinxiPHP/',
				url: 'http://xinxi.hd512.com/xinxiPHP/',
				ruleForm: {
					name: '', //登录账号
					pass: '' //登录密码
				},

				logins: true
			}
		},
		methods: {
			bb() {
				this.logins = !this.logins
			},
			update() {
				//修改密码
				if (!this.ruleForm.name) {
					this.$message('请输入账号');
					this.$refs.name.focus();
					return false;
				}
				if (!this.ruleForm.pass) {
					this.$message('请输入密码');
					this.$refs.pass.focus();
					return false;
				}
				this.$axios.get(this.url + 'updatepass.php', {
					params: {
						name: this.ruleForm.name,
						pass: this.ruleForm.pass
					}
				}).then(res => {
					console.log(res)
					if (res.data == 'ok') {
						this.$message({
							message: '修改成功，请登录',
							type: 'success'
						});
						this.logins = !this.logins
						this.ruleForm.name = ''
						this.ruleForm.pass = ''
					} else {
						this.$message({
							message: '请输入正确的账号',
							type: 'warning'
						});
					}
				})
			},
			zhuci() {
				this.$router.push({
					name: 'zhuci'
				});
			},
			xiugai() {
				// console.log('修改密码')
				this.ruleForm.name = ''
				this.ruleForm.pass = ''
				this.logins = !this.logins
			},
			login() {
				if (!this.ruleForm.name) {
					this.$message('请输入账号');
					this.$refs.name.focus();
					return false;
				}
				if (!this.ruleForm.pass) {
					this.$message('请输入密码');
					this.$refs.pass.focus();
					return false;
				}
				this.$axios.get(this.url + 'user.php', {
					params: {
						name: this.ruleForm.name,
						pass: this.ruleForm.pass
					}
				}).then(res => {
					console.log(res)
					if (res.data == 'nono') {
						this.$router.push({
							name: 'home'
						})
						sessionStorage.setItem('code', this.ruleForm.name)
						this.ruleForm.name = ''
						this.ruleForm.pass = ''
					} else if (res.data == 'ok') {
						this.$message({
							message: '该账号未注册，请先注册',
							type: 'warning'
						})
					} else(
						this.$message({
							message: '请输入正确的账号或密码',
							type: 'warning'
						})
					)

				})
			}

		}
	}
</script>

<style scoped lang="scss">
	h1 {
		text-align: center;
		margin-bottom: 30px;

		@media screen and (max-width:1000px) {
			font-size: 20px;
			margin-bottom: 30px;
		}
	}

	#shouye,
	#shou {
		box-sizing: border-box;
		display: flex;
		flex-direction: column;
		position: fixed;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);

		@media screen and (max-width:1000px) {
			padding: 10px;
			box-sizing: border-box;
			width: 100%;
		}
	}

	#shouye .index,
	#shou .index {
		width: 100%;
	}

	#shouye .index div,
	#shou .index div {
		width: 100%;
		display: flex;
		margin: 10px 0;
		text-align: center;
		box-sizing: border-box;
	}

	#shouye .index>div>label,
	#shou .index>div>label {
		margin-right: 10px;
		text-align: right;
	}

	#shou .index>div>label {
		width: 60px;
	}

	#shouye .index>div:last-child {
		font-size: 12px;
		padding-left: 46px;
	}

	.zhuce {
		margin-top: 10px;
		display: flex;
		justify-content: space-around;
	}

	.xiugai:hover,
	.index>div:last-child:hover,
	.zhuce>div:hover {
		cursor: pointer;
	}
</style>
