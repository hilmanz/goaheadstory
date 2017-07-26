<?php /* Smarty version 2.6.13, created on 2014-02-11 17:23:05
         compiled from application/web/apps/travia.html */ ?>
<?php echo '
<style>
.ui-effects-transfer {
        border: 2px solid black;
    }
</style>
'; ?>

<div class="section" style="min-height:850px;">
	<h2 class="theTitle">TRAVIA</h2>
    <div class="">
		<h2>Your Selected</h2>
		<div  style="min-width:700px;min-height:110px;float:left;">
			<div class="box" style="border:1px solid #000;min-width:700px;min-height:110px;float:left;">
			
			</div>
			<div>
				<button class="butn">submit</button>
			</div>
		</div>
		<div class="box2" style="min-width:200px;float:left;">
			<div style="border:1px solid #000;min-width:200px;float:left;">
				<div  style="border:1px solid #000;height:100px;width:100px;margin:20px;">
					<img src="http://localhost/inorout/public_html/assets/images/badges/badges-1.png" width="100" height="100" class="imgAll" dataid='1'>
				</div>
				<div  style="border:1px solid #000;height:100px;width:100px;margin:20px;">
					<img src="http://localhost/inorout/public_html/assets/images/badges/badges-2.png"  width="100" height="100"class="imgAll" dataid='2'>
				</div>
				<div style="border:1px solid #000;height:100px;width:100px;margin:20px;">
					<img src="http://localhost/inorout/public_html/assets/images/badges/badges-3.png" width="100" height="100" class="imgAll" dataid='3'>
				</div>
				<div  style="border:1px solid #000;height:100px;width:100px;margin:20px;">
					<img src="http://localhost/inorout/public_html/assets/images/badges/badges-4.png" width="100" height="100" class="imgAll" dataid='4'>
				</div>
				<div  style="border:1px solid #000;height:100px;width:100px;margin:20px;">
					<img src="http://localhost/inorout/public_html/assets/images/badges/badges-5.png" width="100" height="100" class="imgAll" dataid='5'>
				</div>
				<div   style="border:1px solid #000;height:100px;width:100px;margin:20px;">
					<img src="http://localhost/inorout/public_html/assets/images/badges/badges-6.png" width="100" height="100" class="imgAll" dataid='6'>
				</div>
			</div>
			
		</div>
	
</div>

<?php echo '
<script>
	$(document).ready(function(){
		
		$(document).on(\'click\',\'.imgAll\',function()
		{
			var img = $(this).attr(\'src\');
			var imgid = $(this).attr(\'dataid\');
			var countLi = $(\'.box\').find(\'div\').length;
		
			$(this).animate({
				  opacity:\'0.5\',
			});
			
			if (!$(\'.box div\').hasClass("img"+imgid))
				{
					
					if(countLi <  6)
					{
							
							$(\'.box\').append(\'<div class="img\'+imgid+\'" style="border:1px solid #000;height:100px;width:100px;margin:2px;float:left;"><img width="100" height="100" src="\'+img+\'" dataid="\'+imgid+\'"></div>\');
							// $(this).effect("transfer",{ to: $(".img"+imgid) }, 1000);
							$(this).before(\'<div class="ok" style="color: rgb(0, 0, 0); position: absolute; margin: 40px;font:-moz-list;">ok</div>\');
							
							return false;
					}
					
				}
			else 
				{
				    $(".img"+imgid).effect("transfer",{ to: $(this) }, 1000);
					$(\'.box \').find(\'div\').remove(\'.img\'+imgid);
					$(this).animate({
						opacity:\'1\',
					});
				
					$(this).prev().remove();
					return false;
				}
			 
			
		});
		$(\'.butn\').click(function()
		{
			var phrases = [];
			$( ".box div" ).each(function( index ) {
			phrases.push($(this).find(\'img\').attr(\'dataid\'));
			//console.log($(this).find(\'img\').attr(\'dataid\'));
			 });
			
			$.ajax({
				type: "POST",
				url: basedomain+\'travia/submitImg\',
				data: {imgTravia:phrases},
				dataType: "json",
				success: function( strData ){
						alert(strData.status);
							if(strData.status==1)
							{
								window.location.href = basedomain+\'travia/result\';
							}
							else if(strData.status==0)
							{
								alert(\'hanya sekalu saja user eksekusi\');
								window.location.href =  basedomain+\'travia/result\';
							}
							else
							{
								//alert(\'ulangi\');
								window.location.href = basedomain+\'travia\';
							}
						}
			});
		
		});
	});
	
</script>
'; ?>


<!-- END .section -->