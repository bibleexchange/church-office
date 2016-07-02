<canvas 
  id="avatar"
  width="{{$avatar->width}}"
  height="{{$avatar->height}}"
>
Your browswer does not support the html5 canvas tag.
</canvas>

<script>
var colors = ["#3c8dbc","#00a65a","#f39c12","#c3c3c3","purple"];

function getRandomColor(){
	var randomNumber = Math.round(Math.random()*5);

	if(colors[randomNumber] !== undefined){
		return colors[randomNumber];
	}else {
		console.log('guess again.');
		return this;
	}
}

var c = document.getElementById("avatar");
var ctx = c.getContext("2d");
var factor = 11;

for(var c=0; c<=4; c++){
	for(var r=0; r<=4; r++){
		ctx.fillStyle = getRandomColor();
		ctx.fillRect(factor*c,factor*r,10,10);
	}
}

ctx.fillStyle = "#FFFFFF";
ctx.font = "50px Arial";
ctx.fillText("{{$avatar->letter}}",9,43);

</script>
