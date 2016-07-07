$(function() {
	$(".knob").knob();
});

function calculateChecks(){
	//80+100+45+100+100+100+165+300+60

	var input = this.event.target.value;
	
	var numbers = input.split("+");

	var answer = 0;
	
	for(i=0; i <= numbers.length-1; i++){
		console.log(numbers[i]);
		answer = answer + parseFloat(numbers[i]);
	}
	
	this.event.target.value = answer;
	console.log(answer);
}

(function ($) {
	  jQuery.expr[':'].Contains = function(a,i,m){		  
		  return (a.textContent || a.innerText || "").toUpperCase().indexOf(m[3].toUpperCase())>=0;
	  };
	 
	  function listFilter(header, list) {
		var form = $("<form>").attr({"class":"filterform","action":"#"}),
			input = $("<input>").attr({"class":"filterinput","type":"text"});
		$(form).append(input).appendTo(header);
	 
		$(input)
		  .change( function () {
			var filter = $(this).val();
			if(filter) {
			  $(list).find("a:not(:Contains(" + filter + "))").parent().slideUp();
			  $(list).find("a:Contains(" + filter + ")").parent().slideDown();
			} else {
			  //$(list).find("li").slideDown();
			}
			return false;
		  })
		.keyup( function () {
			$(this).change();
		});
	  }
	
	  $(function () {
		listFilter($("#header"), $("#list"));
	  });
	}(jQuery));