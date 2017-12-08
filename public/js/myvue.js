// disabled and able any filed

new Vue({
	el:"#step-1",
	data:{
		nationality:true,
		city_id:0,
		discity_id:true,
		division:[],
	},methods:{
		nationalitychange:function(){
			if(this.nationality == 'الامارات العربية المتحدة'){
				this.nationality = false;   
			}else{
				this.nationality = true;
			}
			
		},citychange:function(){
			if(this.city_id == '2'){
				this.discity_id = false;
				this.getdivision();   
			}else{
				this.discity_id = true;
			}
			
		},getdivision:function(){
			this.$http.get('api/division/'+this.city_id).then(function(response) {
				this.division = response.body;
			},
			function(){
			//error if any eror happen in data base
			alert('Unkown Error');
		});
		},
	}
});