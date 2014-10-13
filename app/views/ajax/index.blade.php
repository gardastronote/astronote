<!DOCTYPE html>
<html>
<head>
	<title> </title>
</head>
<body>
<a href="#" id='asd' onclick="javascript:swapContent('cont1')">Content1</a>
<a href="#" onclick="swapContent('cont2')">Content2</a>
<a href="#" onclick="swapContent('cont3')">Content3</a>
<div id="content">
	default content
</div>
<script type="text/javascript" src="{{asset('js/jquery-2.1.1.min.js')}}"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#asd').click(function(){
			$.get('/ajaxtest',null,function(){
				$('#content').load('/ajaxtest');
			});
		});
	});
</script>
</body>
</html>