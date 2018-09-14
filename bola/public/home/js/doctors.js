
window.onload = function(){

    Vue.http.post('http://hospital.mppstore.com/api/trains/test',{"name":"jack","token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9ob3NwaXRhbC5tcHBzdG9yZS5jb21cL2FwaVwvbG9naW4iLCJpYXQiOjE1MzY2NDg3NjksImV4cCI6MTUzNjY1MjM2OSwibmJmIjoxNTM2NjQ4NzY5LCJqdGkiOiJSVmlpVlJzNlU1cnpWQWhpIiwic3ViIjo1MSwicHJ2IjoiYzgzZTZhZTllYTM2OGIxMTVmMjMxMzQyN2Y1ZDVjMGY5ZDEzYzc2MyJ9.0eAMx38sQhZLPOz4d4GPoic5tYuZ09awoRUxvvQQAlo"}).then(function(res){
        console.log(res.body);
    }, function(error){

    });

}
