<?php /* Smarty version 2.6.13, created on 2014-02-14 10:43:42
         compiled from application/web/apps/aspiration.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'strip_tags', 'application/web/apps/aspiration.html', 27, false),)), $this); ?>
<div class="section" style="min-height:850px;">
	<h2 class="theTitle">TRAVIA Aspiration</h2>
    <div class="">
		
			<?php if ($this->_tpl_vars['aspiration']): ?>
			<h2>Your Aspiration</h2>
			<div class="resulte"  style="min-width:600px;min-height:400px;float:left;border:1px solid #000;float:left;">
				<div style="margin:30px"><?php echo $this->_tpl_vars['result']['result']; ?>
</div>
			</div>
			<div>
				<div style="min-width:500px;min-height:400px;float:left;margin-top:5px;">
						<input type="hidden" name="email" value="<?php echo $this->_tpl_vars['email']; ?>
" id="email">
						<input type="hidden" name="watermark" value="<?php echo $this->_tpl_vars['result']['result']; ?>
" id="watermark">
						<input type="hidden" name="images" value="<?php echo $this->_tpl_vars['aspiration']['user_aspiration_images_travia']; ?>
"  id="images">
			
				</div>
			</div>
			<?php else: ?>
			<h2>Your Aspiration</h2>
			<div class="resulte"  style="min-width:700px;min-height:110px;float:left;border:1px solid #000;min-width:700px;min-height:110px;float:left;">
				<div style="margin:30px"><?php echo $this->_tpl_vars['result']['result']; ?>
</div>
			</div>
			
				<div style="min-width:300px;min-height:110px;float:left;border:1px solid #000;margin-top:5px;">
				<input type="hidden" name="email" value="<?php echo $this->_tpl_vars['email']; ?>
" id="email">
				<input type="hidden" name="images" value="<?php echo $this->_tpl_vars['baground']; ?>
"  id="images">
				<input type="hidden" name="watermark" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['result']['result'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
" id="watermark">
				<textarea style="min-width:500px;min-height:110px;margin:5px;" class="isiresult"></textarea>
				
				</div>
				<div style="float:left;margin-top:5px; margin-left:5px;">
				<button class='result' > submit</button>
				</div>
			<?php endif; ?>
	</div>
	
</div>

<?php echo '
<script>
	$(document).ready(function(){
	var	email =  $(\'#email\').val(),
		images =  $(\'#images\').val();
		watermark =  $(\'#watermark\').val();
		$(\'.resulte\').css(\'background-image\', \'url(\' +basedomain+\'public_assets/\'+ images + \')\');
		$(document).on(\'click\',\'.result\',function()
		{
				var isiResult = $(\'.isiresult\').val();
					
				$.ajax({
						type: "POST",
						url: basedomain+\'travia/aspiration\',
						data: {email:email,images:images,aspiration:isiResult,watermark:watermark},
						dataType: "json",
						success: function( comnData ){
						alert(comnData.status);
							
							
						}
										
				});
				
		});
		
	});
	
</script>
'; ?>


<!-- END .section -->