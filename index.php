<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Wikipedia Search</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<style type="text/css">
		.single{
			border: 1px solid lightgrey;
			border-radius: 3px;
		}
		.single:hover{
			background: #f1f1f1
		}
	</style>
</head>
<body>
<div>
	<form action="">
		<input type="text" id="keyword" name="search">
	</form>
		
</div><br><br><br>	
<div id="results">
	Type in and hit enter
</div>

<script type="text/javascript">
$(function(){
	$('form').on('submit', function(e){
		e.preventDefault();
		var keywords = encodeURI($('#keyword').val()); 
		$('#results').text('Searching...');
		var url = "https://en.wikipedia.org/w/api.php?action=opensearch&search="+ keywords + "&format=json&callback=";
	$.post('do.php', {key: keywords}, function(data, textStatus, xhr) {
			console.log("success");
			var mod = data.replace('/**/','');
			var mod = mod.replace('(','');
			var mod = mod.replace(']])',']]');			
			var result =$.parseJSON(mod);
			console.info(result);

			var keywords = result[0];
			var titles = result[1];
			var descriptions = result[2];
			var links = result[3];

			console.log(keywords);
			console.log(titles);
			console.log(descriptions);
			console.log(links);
		var html = '<h4>You Searched For: '+keywords+'</h4>';

		$.each(titles, function(index, val) {
			 html += "<div class='single'><a href="+links[index]+"><h5><b>"+val+"</b></h5></a>";
			 html += descriptions[index]+"<br></div>";
		});

		$('#results').html(html);

		});

		// $.ajax({
		// 	url: '/path/to/file',
		// 	type: 'get'	
			
		// })
		// .done(function(data) {
		// 	console.log("success");
		// 	console.info(data);
		// })
		// .fail(function() {
		// 	console.log("error");
		// });
	});


});



	
</script>


</body>
</html>