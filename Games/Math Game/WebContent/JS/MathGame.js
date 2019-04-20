
// declaring start variable
var start = 0;

 // declare modal
 var modal = document.getElementById("popup1");


//score
 var score=0;
 
 //number of correct anwers
 var answ=0;
 
 window.onkeypress = function(e){
	 var key; 
	 key = e.which || key || 0;
		if(key == 13 && start===0)
		{   startGame();
			startCounter();
			ask();
		    return false;
		}
	};

 function startGame(){
	    // reset start
	    start = 0;
	    //reset timer
	    second = 30;
	    minute = 2;
	    var timer = document.querySelector(".timer");
	    timer.innerHTML = "2 mins 30 secs";

	    var answers = document.querySelector(".answers");
	    answers.innerHTML = "0 correct answers";
	    clearInterval(interval);
	}

 function startCounter(){
	    //start timer on first click
	    if(start === 0){
	        second = 30;
	        minute = 2;
	        startTimer();
	        start++;
	    }
	   
	}
 
 var second = 30, minute = 2;
 var timer = document.querySelector(".timer");
 var interval;
 function startTimer(){
     interval = setInterval(function(){
         second--;
         timer.innerHTML = minute+" mins "+second+" secs";
         if(second === 0){ 
             if(minute === 0){
             	endgame();
             }
             else{
             	minute--;
             	second=60;
         	}
         }
     },1000);
 }

 function ask(){
	 	var neg=0;
	    var a = Math.floor(Math.random() * 100) + 1;
	    afterm1(a);
	    var b = Math.floor(Math.random() * 100) + 1;
	    afterm2(b);
	    var op = ["+","-"][Math.floor(Math.random()*2)];
	    afsigns(op);
		 var result=document.getElementById("result");
		 var res=0;
		 window.onkeypress=function(e){
			 var key; key = e.which || key || 0;
			 if(res === 0 && key==45 && neg===0){
				 var fig=document.createElement("LI");
				 fig.classList.add("minus","cifra");
				 neg=1;
				 result.appendChild(fig);
			 }
			 else if(res === 0 && key>=49 && key<=57 ){
				 var fig=document.createElement("LI");
				 fig.classList.add("cifra","c"+(key-48));
				 res=res*10+key-48;
				 result.appendChild(fig);
			 }
			 else if(res === 0 && key>=97 && key<=105 ){
				 var fig=document.createElement("LI");
				 fig.classList.add("cifra","c"+(key-96));
				 res=res*10+key-96;
				 result.appendChild(fig);
			 }
			 else if(res !== 0 && key>=48 && key<=57 ){
				 var fig=document.createElement("LI");
				 fig.classList.add("cifra","c"+(key-48));
				 res=res*10+key-48;
				 result.appendChild(fig);
			 }
			 else if(res !== 0 && key>=96 && key<=105 ){
				 var fig=document.createElement("LI");
				 fig.classList.add("cifra","c"+(key-96));
				 res=res*10+key-96;
				 result.appendChild(fig);
			 }
			 if(key == 13 || res>9999){
				 if(neg==1){
					 res=res*(-1);
				 }
				 if(res == eval( a + op + b)){
					answ++;
			    	var answers=document.querySelector(".answers");
			    	answers.innerHTML = answ +" correct answers";
			    	score+=20;
			    	if(second!==0){
			    		clearQuestion();
				    	ask();
			    	}
				 }
				 else{
					 if(second!==0){
			    		clearQuestion();
				    	ask();
			    	}
				 }
			 }
		 };
	    
	   
 }
 
 
 function afterm1(nr){
	 var term = document.getElementById("term1");
	 var figs=[];
	 var i;
	 while(nr!==0){
		 figs.push(nr%10);
		 nr=Math.floor(nr/10);
	 }
	 for(i=figs.length-1;i>=0;i--){
		 var fig=document.createElement("LI");
		 fig.classList.add("cifra","c"+figs[i]);
		 term.appendChild(fig);
	 }
 }
 function afterm2(nr){
	 var term=document.getElementById("term2");
	 var figs=[];
	 var i;
	 while(nr!==0){
		 figs.push(nr%10);
		 nr=Math.floor(nr/10);
	 }
	 for(i=figs.length-1;i>=0;i--){
		 var fig=document.createElement("LI");
		 fig.classList.add("cifra","c"+figs[i]);
		 term.appendChild(fig);
	 }
 }
 
 function afsigns(opr){
	 var operation = document.getElementById("operation");
	 var op=document.createElement("LI");
	 if(opr==="+"){
		 op.classList.add("plus","cifra");
	 }
	 else{
		 op.classList.add("minus","cifra");
	 }
	 operation.appendChild(op);
	 var equals = document.getElementById("equals");
	 var eq = document.createElement("LI");
	 eq.classList.add("equals","cifra");
	 equals.appendChild(eq);
	 
 }
 
 function clearQuestion(){
	 var operation = document.getElementById("operation");
	 while (operation.firstChild) {
		 	operation.removeChild(operation.firstChild);
	 }
	 var equals = document.getElementById("equals");
	 while (equals.firstChild) {
		 	equals.removeChild(equals.firstChild);
		}
	 var term1 = document.getElementById("term1");
	 while (term1.firstChild) {
		 	term1.removeChild(term1.firstChild);
		}
	 var term2=document.getElementById("term2");
	 while (term2.firstChild) {
		 	term2.removeChild(term2.firstChild);
		}
	 var result=document.getElementById("result");
	 while (result.firstChild) {
		 result.removeChild(result.firstChild);
		}
 }
 
 function endgame(){
	    if (minute===0 && second===0){
	        clearInterval(interval);
	        var finalTime = timer.innerHTML;

	        // show congratulations modal
	        modal.classList.add("show");


	        //showing answers, score , time on modal
	        document.getElementById("correct").innerHTML =answ;
	        document.getElementById("score").innerHTML = score;					//final score, updates step by step, can be modified easily
	        var stars=score*1.5;														//final number of stars

	        createCookie("coinsM", stars, "2");
        	createCookie("scoreM", score, "2");
            setTimeout(function(){
            location.reload();
            },5000);	
        deleteCookie("coinsM");
        deleteCookie("scoreM");
	    }
	}

function createCookie(name, value, days) {
  var expires;
  if (days) {
    var date = new Date();
    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
    expires = "; expires=" + date.toGMTString();
  } else {
   expires = "";
  }
  document.cookie = escape(name) + "=" + escape(value) + expires + "; path=/";
  
}

function deleteCookie(name)
{
 document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}



 

