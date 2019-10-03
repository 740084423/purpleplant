window.onload = function()
{
	var faceimg = document.getElementById('faceimg');
	var code = document.getElementById('yzm');
	faceimg.onclick = function()
	{
		window.open('includes/face.php','face','top=0,left=0,scrollbars=1');
	}
	code.onclick = function()
	{
		this.src='includes/code.php?tm='+Math.random();
	};
};
