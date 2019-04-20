(function() {
var canvas = document.querySelector("#pet");
var context = canvas.getContext("2d");

canvas.height=200;


var deltaX=0;
var deltaY=0;
var play=0;


var rep=0;
var catS= new Image();
catS.src= "Images/pets/Cat_stop.png";

var chameleonS= new Image();
chameleonS.src= "Images/pets/Chameleon_stop.png";

var onionS= new Image();
onionS.src= "Images/pets/Onion_stop.png";



var catMove= new Image();
catMove.src= "Images/pets/Cat.png";


var chameleonMove= new Image();
chameleonMove.src= "Images/pets/Chameleon.png";


var onionMove=new Image();
onionMove.src= "Images/pets/Onion.png";

var catM=sprite({
	context: canvas.getContext("2d"),
	width: 1813,
	height: 193,
	image: catMove,
	numberOfFrames: 8,
	ticksPerFrame: 4
});
var chameleonM=sprite({
	context: canvas.getContext("2d"),
	width: 935,
	height: 197,
	image: chameleonMove,
	numberOfFrames: 6,
	ticksPerFrame: 6
});

var onionM=sprite({
	context: canvas.getContext("2d"),
	width: 680,
	height: 197,
	image: onionMove,
	numberOfFrames: 6,
	ticksPerFrame: 4
});

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

var petnr=2;	
window.onload= function(){
petnr=$("#myPhpValue").val();

if(petnr==1)
	canvas.width=227;
else if(petnr==3)
	canvas.width=156;
else if(petnr==4)
	canvas.width=113;
	if(petnr==1)
		renderStop(catS);
	else
		if(petnr==3)
			renderStop(chameleonS);
		else
			if(petnr==4)
			renderStop(onionS);
	
};

setInterval(function(){
	if(play)
	if(petnr==1){
		catM.render();
		catM.update();
	}
	else
		if(petnr==3){
			chameleonM.render();
			chameleonM.update();
		}
		else
			if(petnr==4){
			onionM.render();
			onionM.update();
		}
}, 50);


canvas.onmouseover=function(){
	play=1;
}
canvas.onmouseout=function(){
	play=0;
if(petnr==1)
		renderStop(catS);
	else
		if(petnr==3)
			renderStop(chameleonS);
		else
			if(petnr==4)
			renderStop(onionS);
	
}


} ());

function myFunction1() {

	window.location.assign("Interface/miscareMapa/WebContent/miscare.php");


}



