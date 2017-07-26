<?php /* Smarty version 2.6.13, created on 2014-02-17 10:57:43
         compiled from application/admin//apps/aspirationtraviaview.html */ ?>
<div id="theContainer" class="inboxPage">
    <div class="theContainer">
        <div class="head-title">
            <h1 class="fl">View Travia</h1>
        </div> <!-- /.head-title -->
        <div class="formContent">
            <form method="POST" action="<?php echo $this->_tpl_vars['basedomain']; ?>
aspirationtravia/prosesupdate" enctype="multipart/form-data">
			<table border=1>
				<tr>
					<td>Aspiration Email</td>
					<td>:</td>
					<td><input type="hidden" name="aspirationEmail" id="aspirationEmail" value="<?php echo $this->_tpl_vars['aspiration']['user_aspiration_email']; ?>
" /><?php echo $this->_tpl_vars['aspiration']['user_aspiration_email']; ?>
</td>
				</tr> 
				<tr>
					<td>aspiration</td>
					<td>:</td>
					<td><input type="hidden" name="aspiration" id="aspiration" value="<?php echo $this->_tpl_vars['aspiration']['user_aspiration']; ?>
" /><?php echo $this->_tpl_vars['aspiration']['user_aspiration']; ?>
</td>
				</tr>
				
				<tr>
					<td>Images aspiration result</td>
					<td>:</td>
					<td><input type="hidden" name="aspirationImagesTravia" id="aspirationImagesTravia" value="<?php echo $this->_tpl_vars['aspiration']['user_aspiration_images_travia']; ?>
" /><img width="300" height="300" src="<?php echo $this->_tpl_vars['basedomainpath']; ?>
assets/<?php echo $this->_tpl_vars['aspiration']['user_aspiration_images_travia']; ?>
"></td>
				</tr>
				
				<tr>
					<td>Images aspiration artis</td>
					<td>:</td>
					<td>
						
						<?php if ($this->_tpl_vars['aspiration']['user_aspiration_images']): ?>
						<input type="hidden" name="aspirationImages" id="aspirationImages"  value="<?php echo $this->_tpl_vars['aspiration']['user_aspiration_images']; ?>
" />
							<img src="<?php echo $this->_tpl_vars['basedomainpath']; ?>
public_assets/<?php echo $this->_tpl_vars['aspiration']['user_aspiration_images']; ?>
">
						<?php else: ?>
							<img width="300" height="300" src="<?php echo $this->_tpl_vars['basedomainpath']; ?>
assets/content/thumb/default_image.jpg">
						<?php endif; ?>
					
					</td>
				</tr>
				<tr>
					<td>Status</td>
					<td>:</td>
					<td>
						<select name="aspirationStatus">
							<option value="0">UnPublished</option>
							<option value="1" selected>Published</option>
						</select>
					</td>
				</tr> 
				<tr>
					<td>Upload</td>
					<td>:</td>
					<td>
						<input type="file" name="aspirationImagesNew" id="aspirationImagesNew"  value="" />
					</td>
				</tr> 
				<tr>
					<td>aspiration artis</td>
					<td>:</td>
					<td>
						<textarea style='width:680px;height:229px;' name="aspirationartis" id="aspirationartis" ></textarea>
					</td>
				</tr> 
				<tr>
					<td colspan="3" >
						<input type="submit" name="submit" value="submit" />
						<input type="button" class="btn" value="Cancel" onclick="javascript: window.location.href='<?php echo $this->_tpl_vars['basedomain']; ?>
aspirationtravia';" />	
						<input type="hidden" name="editit" value="ok" />						
						<input type="hidden" name="aspirationId" value="<?php echo $this->_tpl_vars['aspiration']['user_aspiration_id']; ?>
" />
					</td>
				</tr>
			</table>
            </form>
		</div>
	</div>
</div>