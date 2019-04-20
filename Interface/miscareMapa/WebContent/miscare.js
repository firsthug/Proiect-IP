(function() {
var canvas = document.querySelector("#moveAnimation");
var context = canvas.getContext("2d");


canvas.width=2869;
canvas.height=1500;

var dif=7.5;

var sex;


var leftS= new Image();
leftS.src= "images/Stop_left.png";

var rightS= new Image();
rightS.src= "images/Stop_right.png";

var frontS= new Image();
frontS.src= "images/Stop_front.png";


var backS= new Image();
backS.src= "images/Stop_back.png";



var leftSm= new Image();
leftSm.src= "images/Stop_left_male.png";

var rightSm= new Image();
rightSm.src= "images/Stop_right_male.png";

var frontSm= new Image();
frontSm.src= "images/Stop_front_male.png";


var backSm= new Image();
backSm.src= "images/Stop_back_male.png";





var leftMove= new Image();
leftMove.src= "images/Walk_left.png";


var rightMove= new Image();
rightMove.src= "images/Walk_right.png";


var frontMove=new Image();
frontMove.src= "images/Walk_front.png";

var backMove= new Image();
backMove.src= "images/Walk_back.png";




var leftMovem= new Image();
leftMovem.src= "images/Walk_left_male.png";


var rightMovem= new Image();
rightMovem.src= "images/Walk_right_male.png";


var frontMovem=new Image();
frontMovem.src= "images/Walk_front_male.png";

var backMovem= new Image();
backMovem.src= "images/Walk_back_male.png";






var leftM=sprite({
	context: canvas.getContext("2d"),
	width: 1091,
	height: 239,
	image: leftMove,
	numberOfFrames: 11,
	ticksPerFrame: 4
});
var rightM=sprite({
	context: canvas.getContext("2d"),
	width: 1091,
	height: 239,
	image: rightMove,
	numberOfFrames: 11,
	ticksPerFrame: 4
});

var frontM=sprite({
	context: canvas.getContext("2d"),
	width: 935,
	height: 239,
	image: frontMove,
	numberOfFrames: 11,
	ticksPerFrame: 4
});


var backM=sprite({
	context: canvas.getContext("2d"),
	width: 850,
	height: 239,
	image: backMove,
	numberOfFrames: 10,
	ticksPerFrame: 4
});





var leftMm=sprite({
	context: canvas.getContext("2d"),
	width: 1091,
	height: 240,
	image: leftMovem,
	numberOfFrames: 11,
	ticksPerFrame: 4
});
var rightMm=sprite({
	context: canvas.getContext("2d"),
	width: 1091,
	height: 240,
	image: rightMovem,
	numberOfFrames: 11,
	ticksPerFrame: 4
});

var frontMm=sprite({
	context: canvas.getContext("2d"),
	width: 1020,
	height: 241,
	image: frontMovem,
	numberOfFrames: 12,
	ticksPerFrame: 4
});


var backMm=sprite({
	context: canvas.getContext("2d"),
	width: 680,
	height: 240,
	image: backMovem,
	numberOfFrames: 8,
	ticksPerFrame: 4
});


var road =	[1362,227,
			1362,403,
			845,403,
			845,220,
			736,220,
			736,492,
			1362,492,
			1362,1268,
			445,1268,	
			445,1072,
			256,1072,
			256,1457,
			2168,1457,
			2168,1158,
			2453,1158,
			2453,968, 
			1982,968,
			1982,1264, 
			1553,1264,
			1553,227,
			1362,227];

var npcArea = [501,104,
				501,226,
				714,226,
				714,502,
				113,502,
				113,104];
			
function turnThePage(dir){
	var feetX=deltaX+40;
	var feetY=deltaY+229;
	var nextX=feetX;
	var nextY=feetY;
	var i,x;
	if(dir===0) nextX-=dif;
	if(dir===1) nextY-=dif;
	if(dir===2) nextX+=dif;
	if(dir===3) nextY+=dif;
	if(nextY<227 && nextX<=1553 && nextX>=1362 && feetY>=227)
		window.open("../../../Room.php","_self");

	if(nextY<1072 && nextX<=445 && nextX>=256 && feetY>=1072){
		var x=$.colorbox({href:"../../../QUIZ/quiz_setup_lightbox/quiz_html.php",iframe:true,
			width:"40%", height:"80%",onClosed:function(){dif=7.5;}});
			dif=0;
			}
	if(nextX>2453 && nextY<=1158 && nextY>=968 && feetX<=2453){

		var x=$.colorbox({href:"../../../Pet Shop/PetShop.php",iframe:true,
			width:"80%", height:"100%",onClosed:function(){dif=7.5;}});
			//window.open("../../Pet Shop/PetShop.php","_self");
			dif=0;
			}
	if(nextY<220 && nextX<=845 && nextX>=736 && feetY>=220){
			//selectare joc
	}
	for(i=0;i<road.length-2;i+=2){
		if(road[i]==road[i+2] && road[i+1]<road[i+3]){
			if(nextX<road[i] && nextY>=road[i+1] && nextY<=road[i+3] && feetX>=road[i])
				return false;
		}
		else if(road[i]==road[i+2] && road[i+1]>road[i+3]){
			if(nextX>road[i] && nextY<=road[i+1] && nextY>=road[i+3] && feetX<=road[i])
				return false;
			
		}
		else if(road[i]<road[i+2] && road[i+1]==road[i+3]){
			if(nextY>road[i+1] && nextX>=road[i] && nextX<=road[i+2] && feetY<=road[i+1])
				return false;
			
		}
		else if(road[i]>road[i+2] && road[i+1]==road[i+3]){
			if(nextY<road[i+1] && nextX<=road[i] && nextX>=road[i+2] && feetY>=road[i+1])
				return false;
			
		}
		
	}
	return true;
} 

//Pozitie start
var deltaX = 1425;
var deltaY = 50;
//window.scrollTo(deltaX,deltaY);
document.documentElement.style.overflow = 'hidden';
document.body.scroll = "no";  
//document.body.style.transform = 'scale(2)';
//canvas.style.transform = 'scale(0.5)';

window.addEventListener("keyup", stopSomething, false);

window.addEventListener("keydown", moveSomething, false);
//window.onbeforeunload = function () {return false;}		pentru refresh!!!

//window.addEventListener("onload",window.scrollTo(deltaX,deltaY), false);

window.onload= function(){
	window.scrollTo(deltaX-400,deltaY-200);
	sex=$("#myPhpValue").val();
	if(sex==0)
		renderStop(frontS);
	else
		renderStop(frontSm);
};

function  renderStop(e) {
	
	context.clearRect(0, 0, canvas.width, canvas.height);
		context.drawImage(
			    e,
			    0,
			    0,
			    e.width,
			    e.height,
			    deltaX,
			    deltaY,
			    e.width,
			    e.height);
			}

			
function stopSomething(e) {
	if(dif!==0){
	var key; 
	key = e.which || key || 0;
				if(key==37){
					e.preventDefault();
					if(sex==0)
					renderStop(leftS);
					else
					renderStop(leftSm);
				}
				else if(key==38){
					e.preventDefault();
					if(sex==0)
					renderStop(backS);
					else
					renderStop(backSm);
				}
				else if(key==39){
					e.preventDefault();
					if(sex==0)
					renderStop(rightS);
					else
					renderStop(rightSm);
				}
				else if(key==40){	
					e.preventDefault();
					if(sex==0)
					renderStop(frontS);
					else
					renderStop(frontSm);
				}
	}

}

function sprite (options) {
	
	var that = {},
		frameIndex = 0,
		tickCount = 0,
		ticksPerFrame = options.ticksPerFrame || 0,
		numberOfFrames = options.numberOfFrames || 1;
	
	that.context = options.context;
	that.width = options.width;
	that.height = options.height;
	that.image = options.image;
	
	that.update = function () {

        tickCount += 1.5;

        if (tickCount > ticksPerFrame) {

			tickCount = 0;
			
            // If the current frame index is in range
            if (frameIndex < numberOfFrames - 1) {	
                // Go to the next frame
                frameIndex += 1;
            } else {
                frameIndex = 0;
            }
        }
    };
	
	that.render = function () {
	
	  // Clear the canvas
	  that.context.clearRect(0, 0, canvas.width, canvas.height);
	  
	  // Draw the animation
	  that.context.drawImage(
	    that.image,
	    frameIndex * that.width / numberOfFrames,
	    0,
	    that.width / numberOfFrames,
	    that.height,
	    deltaX,
	    deltaY,
	    that.width / numberOfFrames,
	    that.height);
	};
	
	return that;
}

//
//
//function  renderMove(move) {
//	
//	move.render();
//	move.update();
//		};
		
function moveSomething(e) {
	if(dif!==0){
	var key; 
	key = e.which || key || 0;
			if(key==37 && turnThePage(0)){
				window.requestAnimationFrame(moveSomething);
				e.preventDefault();
				deltaX -= dif;
				if(sex==0){
				leftM.render();
				leftM.update();
				}else{
					leftMm.render();
					leftMm.update();
				}
				}
			else if(key==38 && turnThePage(1)){
				window.requestAnimationFrame(moveSomething);
				e.preventDefault();
				deltaY -= dif;
				if(sex==0){
				backM.render();
				backM.update();
				}else{
					backMm.render();
					backMm.update();
				}
				}
			else if(key==39 && turnThePage(2)){
				window.requestAnimationFrame(moveSomething);
				e.preventDefault();
				deltaX += dif;
				if(sex==0){
				rightM.render();
				rightM.update();
				}else{
					rightMm.render();
					rightMm.update();
				}
				}
			else if(key==40 && turnThePage(3)){
				window.requestAnimationFrame(moveSomething);
				e.preventDefault();
				deltaY += dif;
				if(sex==0){
				frontM.render();
				frontM.update();
				}else{
					frontMm.render();
					frontMm.update();
				}
				}
			else if(key==37){
				e.preventDefault();
				if(sex==0)
				renderStop(leftS);
				else
				renderStop(leftSm);
					
			}
			else if(key==38){
				e.preventDefault();
				if(sex==0)
				renderStop(backS);
				else
				renderStop(backSm);
			}
			else if(key==39){
				e.preventDefault();
				if(sex==0)
				renderStop(rightS);
				else
				renderStop(rightSm);
			}
			else if(key==40){
				e.preventDefault();
				if(sex==0)
				renderStop(frontS);
				else
				renderStop(frontSm);
			}
			window.scrollTo(deltaX-400,deltaY-200);
}
}
} ());

