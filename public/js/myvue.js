// disabled and able any filed

new Vue({
	el:"#step-1",
	data:{
		nationality:true,
	},methods:{
		nationalitychange:function(){
			if(this.nationality == 'الامارات العربية المتحدة'){
				this.nationality = false;   
			}else{
				this.nationality = true;
			}
			
		},	
	}
});