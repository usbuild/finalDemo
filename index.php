<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <title>测试页面</title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css" />
	<style type="text/css" rel="stylesheet">

body{
    background-color: #D8D8D8;
    color: #444;
}
.content-container{
    line-height: 1.7em;
    padding-top:40px;
    width: 960px;
    margin: 0 auto;
    padding: 80px 50px 20px 50px;
    background-color: white;
    box-shadow: 0 2px 6px rgba(100, 100, 100, 0.3);
}
.post-content{
    width: 100%;
}
body > .navbar .brand {
    padding-right: 0;
    padding-left: 0;
    margin-left: 20px;
    float: right;
    font-weight: bold;
    color: black;
    text-shadow: 0 1px 0 rgba(255, 255, 255, .1), 0 0 30px rgba(255, 255, 255, .125);
    -webkit-transition: all .2s linear;
    -moz-transition: all .2s linear;
    transition: all .2s linear;
}
</style>
        <script type="text/javascript" charset="utf-8" src="js/jquery-1.9.1.min.js"></script>
        <script type="text/javascript" charset="utf-8" src="bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" charset="utf-8">
	$(function() {
			$("#post").click(function(){
				var content = $(".post-content").val();
				$.post("post.php", {data:content}, function(e){
					if(e.code == 0) {
					var div = $('<div class="alert alert-block alert-info"></div>');
					div.html(e.data);
					$(".post-list").prepend(div);
					$(".post-content").val("");
					} else {
alert(e.data);
}
					}, "json");
				});;
			});
</script>
</head>
<body>
<div class="navbar navbar-inverse navbar-fixed-top">
<div class="navbar-inner">
<div class="container">
<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="brand" href="/">测试站点</a>
<div class="nav-collapse collapse">
<ul class="nav">
<li class="active"> <a href="/">主页</a> </li>
<li> <a href="/about.html">关于</a> </li>
<li> <a href="https://github.com/usbuild" target="_blank">GitHub</a> </li>
</ul>
</div>
</div>
</div>
</div>
<div class="content-container">
<div class="row-fluid">
<div class="span9">
<textarea name="content" rows="3" class="post-content"></textarea>
</div>
<div class="span3">
<a href="javascript:;" class="btn btn-large btn-primary" id="post">发表</a>
</div>
</div>
<hr />
<div class="post-list">
<?php
$dm = new Distmem();
$dm->connect("localhost", 4327);
$dm->use("show");
$idx = $dm->get("index");
if(!is_null($idx)) {
	foreach($idx as $i) {
		?>
			<div class="alert alert-block alert-info">
			<?=$dm->get($i)?>
			</div>
			<?php
	}
}
?>
</div>
</div>
</body>
</html>
