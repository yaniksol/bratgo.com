<html>
<head>

	<title> Javascript </title>
	
	<style type="text/css">
		.bold {
			font-weight: bold;
		}
		#shape {
			
			width: 200px;
			height: 200px;
			display:none;
			position:relative;
			
			
		}
	</style>
</head>
	


<body>
    
	<p> <h1>Test your reaction </h1></p>
	<p> Click on a circles and boxes as quick as you can </p>
	<p class="bold"> Your time is : <span id="yourTime"> </span> </p>
		
	<div id="shape">  </div>

	<script type="text/javascript">
        
	    var start = new Date().getTime();
		
		function getRandomColor() {
			var letters = '0123456789ABCDEF';
			var color = '#';
			for (var i = 0; i < 6; i++) {
			color += letters[Math.floor(Math.random() * 16)];
			}
			return color;
			}
		
		
		function MakeShapeAppear() {
			document.getElementById("shape").style.backgroundColor = getRandomColor();
			var top = Math.random () * 380;
			document.getElementById("shape").style.top =top + "px";
			var left = Math.random() * 1000;
			document.getElementById("shape").style.left =left + "px";
			var width = (Math.random () * 200) + 100;
			document.getElementById("shape").style.width= width + "px";
			document.getElementById("shape").style.height= width + "px";
			document.getElementById("shape").style.display ="block";
			start = new Date().getTime();
			if (Math.random () > 0.5 ) {
				document.getElementById("shape").style.borderRadius = "50%";
			} else {
				document.getElementById("shape").style.borderRadius= "0";
			}
			
		}
		function appearAfterDelay () {
			setTimeout (MakeShapeAppear, Math.random() * 3000 );
		}
		
		appearAfterDelay ();
		
	
		document.getElementById("shape").onclick = function () {
		
			document.getElementById("shape").style.display ="none";
			
			var end = new Date().getTime();
			var time = (end - start)/ 1000;
			
			document.getElementById("yourTime").innerHTML= time + "s";
			appearAfterDelay ();
		}
		
		
		


	</script>



</body>



</html>