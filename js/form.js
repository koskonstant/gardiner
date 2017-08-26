
$(".next").click(function(){	
	
	$('.step1').animate({ width: 'hide' },"fast");	
	$('.step1').promise().done(function(){		
		$('.step2').animate({ width: 'show' },"fast");			
		$("#progressbar li:nth-child(2)").addClass("active");
	});
	return false;	
});

$(".next2").click(function(){	
	$('.step1').animate({ width: 'hide' },"fast");	
	$('.step2').animate({ width: 'hide' },"fast");	
	$('.step2').promise().done(function(){		
		$('.step3').animate({ width: 'show' },"fast");
		$("#progressbar li:nth-child(3)").addClass("active");
	});
	return false;	
});


$(".previous").click(function(){
	$("#alert").slideUp( "slow" ); 
	$('.step3').animate({ width: 'hide' },"fast");  
	$('.step2').animate({ width: 'hide' },"fast");	
	$('.step2').promise().done(function(){		
		$('.step1').animate({ width: 'show' },"fast");
		$("#progressbar li").removeClass("active");
		$("#progressbar li:nth-child(1)").addClass("active");
	});
	return false;	
});

$(".previous2").click(function(){
	$("#alert").slideUp( "slow" );  

	$('.step3').animate({ width: 'hide' },"fast");	
	$('.step3').promise().done(function(){		
		$('.step2').animate({ width: 'show' },"fast");
		$("#progressbar li").removeClass("active");
		$("#progressbar li:nth-child(2)").addClass("active");
	});
	return false;	
});



