/*
 * create by zhe-he
 * e-mail: luanhong_feiguo@sina.com
 * 
 */

var userid = getCookie("user_id") || getCookie("userid");
if (!userid) {
	window.reload();
}

new Vue({
	el: "#chicken",
	data: {
		iswaiting: true,
		c_money: 50,
		t_money: '',
		tx_name: '',
		tx_card: '',
		is_tx: false,
		t_timer: null, 	// 弹窗时间控制器
		a_message: { 	// 弹窗
			font: '',
			isStatus: 1,
			isClose: true
		},
		isMenuCz: 0, 	// 充值菜单
		isGuize: false,  // 规则弹窗
		isTuijian: false,　// 推荐弹窗
		j_data: { 		// 用户的鸡蛋数据
			ji: 0,
			dan: 0,
			di: 1,
			die_ji: 0,
			friend: 0,
			all_money: 0
		},
		recommand_list: [],
		tian: []
	},
	mounted: function (){
		var _this = this;
		ajax({
			url: "http://h5.91marryu.com/onechicken/index.php/api/info",
			data: {
				"userid": userid
			},
			type: "post",
			success: function (message){
				_this.iswaiting = false;
				message = eval('('+message+')');
				var data = message.data;


				var j_data = {
					ji: 0,
					dan: data.eggs,
					di: 0,
					die_ji: 0,
					friend: data.recommand_eggs,
					all_money: data.money
				};
				var tian = [];
				for (var i = 0; i < data.soil_list.length; i++) {
					var d = data.soil_list[i].enabled=="1";
					var a = data.soil_list[i].henroost_a;
					var b = data.soil_list[i].henroost_b;
					var c = data.soil_list[i].chickens || [];
					if (a && a!=null && a!='null') {
						j_data.ji++
					}
					if (b && b!=null && b!='null') {
						j_data.ji++
					}
					for(var j=0;j<c.length;j++){
						if(c[j].is_dead && c[j].is_dead != "0"){
							j_data.die_ji++;
							c.splice(i,1);
							i--;
						}
					}
					if (d) {
						j_data.di++;
					}

					tian[i] = {
						"enabled": d,
						"henroost_a": a,
						"henroost_b": b,
						"chickens": c
					}
				}

				
				_this.j_data = j_data;
				_this.tian = tian;
				_this.recommand_list = data.recommand_list.slice(0,8);
				
				var s_time = 0;
				if (_this.j_data.friend > 0) {
					_this.show_msg(1,'通过你的小伙伴分享，你已获得了'+_this.j_data.friend+'个蛋。');
					_this.j_data.dan += _this.j_data.friend;
					_this.j_data.friend = 0;
					s_time = 2000;
				}

				if (_this.j_data.die_ji > 0) {
					setTimeout(function (){
						_this.show_msg(2,'很遗憾，你的鸡已不会生蛋了，将告别你。');
						_this.j_data.ji -= _this.j_data.die_ji;
					},s_time);
					
				}
			},
			error: function (){
				_this.iswaiting = false;
			}
		});

	},
	methods: {
		set_ji_di: function (type){
			if (type == 'ji') {
				for (var i = 0; i < this.tian.length; i++) {
					if (this.tian[i].chickens.length<2) {
						this.tian[i].chickens.push({
							no_get_eggs: "0"
						});
						break;
					}
				}
			}else if(type == 'di'){
				for (var i = 0; i < this.tian.length; i++) {
					if (!this.tian[i].enabled) {
						this.tian[i].enabled = true;
						break;
					}
				}
			}
		},
		copy: function (json){
			return JSON.parse(JSON.stringify(json));
		},
		put_dan: function (j,index,index2){
			var _this = this;
			if (j.no_get_eggs>0) {
				_this.iswaiting = true;
				ajax({
					url: "http://h5.91marryu.com/onechicken/index.php/api/pickup_eggs",
					data: {
						"userid": userid,
						"chicken_id": j.id,
                        "soil_id": j.soil_id
					},
					type: "post",
					success: function(data){
						_this.iswaiting = false;
						data = eval('('+data+')');
						if (data) {
							_this.j_data.dan += 5;
							_this.tian[index].chickens[index2].no_get_eggs = 0;
						}
					},
					error: function (){
						_this.iswaiting = false;
					}
				})
			}
		},
		show_msg: function (status,font){
			this.a_message.isClose = false;
			this.a_message.isStatus = status;
			this.a_message.message = font;
		},
		show_menu_cz: function (num){
			this.isMenuCz = num;
		},
		mai:function(item,bool){
			var _this = this;
			if (item.enabled) {
				if (item.chickens.length<2) {
					if (!bool && item.chickens.length==1 && item.chickens[0].no_get_eggs>0) {return };
					if (window.confirm('是否花100只蛋买一只鸡?')) {
						
						if (this.j_data.dan >= 100) {
							_this.iswaiting = true;
							ajax({
								url: "http://h5.91marryu.com/onechicken/index.php/api/egg2chicken",
								data: {
									"userid": userid
								},
								type: "post",
								success: function (data){
									_this.iswaiting = false;
									data = eval('('+data+')');
									if (data) {
										_this.j_data.dan -= 100;
										_this.j_data.ji += 1;
										_this.show_msg(1,'你已拥有一只超生产力的母鸡！');
										_this.set_ji_di('ji');
									}
									
								},
								error: function (){
									_this.iswaiting = false;
								}
							});
							
						}else{
							this.show_msg(0,'鸡蛋不足，无法购买');
						}
					}
				}
			}else{
				if (window.confirm('是否花10只蛋买一块地?')) {
					if (this.j_data.dan >= 10) {
						_this.iswaiting = true;
						ajax({
							url: "http://h5.91marryu.com/onechicken/index.php/api/enable_soil",
							data: {
								"userid": userid
							},
							type: "post",
							success: function (data){
								_this.iswaiting = false;
								data = eval('('+data+')');
								if (data) {
									_this.j_data.dan -= 10;
									_this.j_data.di += 1;
									_this.show_msg(1,'你已永久拥有一块养鸡的地！');
									_this.set_ji_di('di');
								}
								
								
							},
							error: function (){
								_this.iswaiting = false;
							}
						});
						
					}else{
						this.show_msg(0,'鸡蛋不足，无法购买');
					}
				}
			}
		},
		mai2: function (type){
			if (type == 1) {
				if (this.j_data.ji==20) {return}
				var cur = 0;
				for (var i = 0; i < this.tian.length; i++) {
					if (this.tian[i].chickens.length<2) {
						cur = i;
						break;
					}
				}
				this.mai(this.tian[cur],true);
			}else if(type == 2){
				if (this.j_data.di==10) {return}
				var cur = 0;
				for (var i = 0; i < this.tian.length; i++) {
					if (!this.tian[i].enabled) {
						cur = i;
						break;
					}
				}
				this.mai(this.tian[cur],true);
			}
		},
		cz: function(item){
			var _this = this;
			this.isMenuCz = item;
			if (item == 1) {
				var t2 = Math.floor(this.c_money/10) != Math.ceil(this.c_money/10);
				if(t2){
					this.show_msg(0,'请按10的倍数进行充值');
				}else if(this.c_money < 10){
					this.show_msg(0,'最少充值10元');
				}else if (window.confirm('充值'+this.c_money+'元？')) {
					_this.iswaiting = true;
					ajax({
						url: "http://h5.91marryu.com/onechicken/index.php/api/pay",
						data: {
							"userid": userid,
							"money": this.c_money
						},
						type: "post",
						success: function (data){
							_this.iswaiting = false;
							if(data){
								_this.show_msg(1,'充值'+_this.c_money+'元成功');
								_this.j_data.dan += _this.c_money;
								setTimeout(function(){
									_this.show_msg(1,'您已获得'+_this.c_money+'只鸡蛋');
								},2000);
							}
							
						},
						error: function (){
							_this.iswaiting = false;
						}
					});
				}
			}else if(item == 2){
				this.is_tx = true;

			}
		},
		tx: function(){
			var _this = this;
			var t2 = Math.floor(this.t_money/10) != Math.ceil(this.t_money/10);
			if (this.j_data.dan < this.t_money) {
				this.show_msg(0,'鸡蛋不足'+this.t_money+'个,无法提现');
			}else if(this.t_money < 10){
				this.show_msg(0,'最少提现10个鸡蛋');
			}else if(t2){
				this.show_msg(0,'请按10个蛋的倍数进行提现');
			}else{
				if (!this.tx_name) {
					this.show_msg(0,'请填写姓名');
				}
				if (!/^\d{8,24}$/.test(this.tx_card)) {
					this.show_msg(0,'请填写正确的银行卡号');
				}
				_this.iswaiting = true;
				ajax({
					url: "http://h5.91marryu.com/onechicken/index.php/api/tixian",
					data: {
						"userid": userid,
						"name": this.tx_name,
						"money": this.t_money,
						"brank_num": this.tx_card
					},
					type: "post",
					success: function (data){
						_this.iswaiting = false;
						if (data) {
							_this.show_msg(1,'提现'+_this.t_money+'元成功，请等待客服处理');
							_this.j_data.dan -= _this.t_money;
							_this.j_data.all_money += _this.t_money;
						}
					},
					error: function (){
						_this.iswaiting = false;
					}
				});
			}
		}
	}
})


function getCookie(e)
{
	for(var t=document.cookie,i=t.split("; "),n=0;n<i.length;n++){
		var a=i[n].split("=");
		if(a[0]==e)return unescape(a[1])
	}
	return ""
}