<!DOCTYPE html>
<html>
<head>
<meta charset="UTF8">
<title>Vue 调用接口测试实例</title>
<script src="https://cdn.bootcss.com/vue/2.4.2/vue.min.js"></script>
<script src="https://cdn.bootcss.com/vue-resource/1.5.1/vue-resource.min.js"></script>
</head>
<body>
<div id="box">
	<input type="button" @click="get()" value="点我异步获取数据(Get)">
	@{{msg}}
	<ul>
	    <li v-for="article in articles">
            @{{article.title}}</br>
						@{{article.content}}</br>
						@{{article.updated_at}}

         </li>
	</ul>
	
	<input type="button" @click="post()" value="点我异步获取数据(post)"> @{{msg}}

</div>
<script type = "text/javascript">
window.onload = function(){

//Vue.http.headers.common['Authorization'] = 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC93d3cuaG9zcGl0YWwuY29tXC9hcGlcL2xvZ2luIiwiaWF0IjoxNTM2NTc2ODU5LCJleHAiOjE1MzY1ODQwNTksIm5iZiI6MTUzNjU3Njg1OSwianRpIjoiaVJwYlZScFBNOEVSUnp6bCIsInN1YiI6NTEsInBydiI6ImM4M2U2YWU5ZWEzNjhiMTE1ZjIzMTM0MjdmNWQ1YzBmOWQxM2M3NjMifQ.nMTs1oc9mRbLQUAtSMIO466xRjqgTPtbmra4o89Vu2s';

	
var vm = new Vue({
    el:'#box',
    data:{
        msg:'Hello World!',
        articles:[]
    },
   
    methods:{
        get:function(){
            //发送get请求
            this.$http.get('http://hospital.mppstore.com/api/trains').then(function(res){
                //document.write(res.body.data.data); 
								this.articles = res.body.data.data;
                console.log(res.body.data.data);
								
            },function(){
                console.log('请求失败处理');
            });
        },
				
        post:function(){
           let data = {
                	name:"张三",
                	age:"http://www.hospital.com",
                "token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9ob3NwaXRhbC5tcHBzdG9yZS5jb21cL2FwaVwvbG9naW4iLCJpYXQiOjE1MzY1ODUxMTksImV4cCI6MTUzNjU4ODcxOSwibmJmIjoxNTM2NTg1MTE5LCJqdGkiOiJHV1J6akNYSFVWV2NTNmM0Iiwic3ViIjo1MSwicHJ2IjoiYzgzZTZhZTllYTM2OGIxMTVmMjMxMzQyN2Y1ZDVjMGY5ZDEzYzc2MyJ9.0lhcyf8ZCQO7dwTftC0x3Pap17jl_p7KO0NsqmfbjKw"

            };
        	this.$http.post('http://hospital.mppstore.com/api/trains/test',data ).then(function(res){
                //document.write(res.body); 
                console.log(res.body.data.data);  
            },function(){
                console.log('请求失败处理');
            });
        }
    }
});
}
</script>
</body>
</html>