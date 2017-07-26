<?php /* Smarty version 2.6.13, created on 2014-02-13 16:54:34
         compiled from application/admin/apps/news-update.html */ ?>

<?php echo '
<script>
	tinyMCE.init({
		theme : "advanced",
        mode : "exact",
        elements : "teditor",
		plugins : "autolink,lists,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
		paste_remove_styles: true,
		paste_auto_cleanup_on_paste : true,
		
		theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
        theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
        theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,ltr,rtl,|,fullscreen",
        theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,spellchecker,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,blockquote,pagebreak,|,insertfile,insertimage",

		file_browser_callback : "ajaxfilemanager",
		paste_use_dialog : true,
		theme_advanced_resizing : true,
		theme_advanced_resize_horizontal : true,
		apply_source_formatting : true,
		force_br_newlines : true,
		force_p_newlines : false,	
		relative_urls : true,
		
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : false
	});
	function ajaxfilemanager(field_name, url, type, win) {
		var ajaxfilemanagerurl = "jscripts/tiny_mce/plugins/ajaxfilemanager/ajaxfilemanager.php";
		var view = \'detail\';
		switch (type) {
			case "image":
			view = \'thumbnail\';
				break;
			case "media":
				break;
			case "flash": 
				break;
			case "file":
				break;
			default:
				return false;
		}
		tinyMCE.activeEditor.windowManager.open({
		    url: "jscripts/tiny_mce/plugins/ajaxfilemanager/ajaxfilemanager.php?view=" + view,
		    width: 782,
		    height: 440,
		    inline : "yes",
		    close_previous : "no"
		},{window : win, input : field_name });
	}
	
function validator(){
	tinyMCE.triggerSave();
	if( $(\'#title\').val() == \'\' ){
		alert("Please fill title");
		return false;
	}
}
</script>
'; ?>


<div id="theContainer" class="inboxPage">
    <div class="theContainer">
        <div class="head-title">
            <h1 class="fl">Update News</h1>
        </div> <!-- /.head-title -->
         <div class="formContent">
            <form method="POST" action="" enctype="multipart/form-data">
			<table border=1>
		
				<tr>
					<td>Title</td>
					<td>:</td>
					<td><input type="text" name="title" id="title" value="<?php echo $this->_tpl_vars['selectupdatedata']['title']; ?>
" /></td>
				</tr>
				<tr>
					<td>Content</td>
					<td>:</td>
					<td><textarea name="content" id="teditor" value="<?php echo $this->_tpl_vars['selectupdatedata']['content']; ?>
" ></textarea></td>
				</tr> 
				<tr>
					<td>Brief</td>
					<td>:</td>
					<td><input type="text" name="brief" id="brief" value="<?php echo $this->_tpl_vars['selectupdatedata']['brief']; ?>
" /></td>
				</tr>
				<tr>
					<td>Published Date</td>
					<td>:</td>
					<td><input type="text" class="half-width" id="datepicker" name="posteddate" value="<?php echo $this->_tpl_vars['posteddate']; ?>
" style="width:100px" /></td>
				</tr>
				<tr>
					<td>Unpublished Date</td>
					<td>:</td>
					<td><input type="text" class="half-width" id="datepicker2" name="unpublished_date" value="<?php echo $this->_tpl_vars['unpublished_date']; ?>
" style="width:100px" /></td>
				</tr>
				<tr>
					<td>type</td>
					<td>:</td>
					<td>
						<select name="type">
							<option value="0" selected>-</option>
							<option value="1"  <?php if ($this->_tpl_vars['selectupdatedata']['type'] == 1): ?>selected<?php endif; ?>>Event</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>image</td>
					<td>:</td>
					<td><input type="file" name="images" value="" /><img width="100px" height="100px" src="<?php echo $this->_tpl_vars['basedomainpath']; ?>
public_assets/news/<?php echo $this->_tpl_vars['selectupdatedata']['img']; ?>
" /></td>
				</tr>								
				<tr>
					<td>City</td>
					<td>:</td>
					<td>
						<select name="city">
						<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['cityreference']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
							<option value="<?php echo $this->_tpl_vars['cityreference'][$this->_sections['i']['index']]['id']; ?>
" <?php if ($this->_tpl_vars['selectupdatedata']['cityid'] == $this->_tpl_vars['cityreference'][$this->_sections['i']['index']]['id']): ?>selected<?php endif; ?> ><?php echo $this->_tpl_vars['cityreference'][$this->_sections['i']['index']]['city']; ?>
</option>
						<?php endfor; endif; ?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Status</td>
					<td>:</td>
					<td>
						<select name="n_status">
							<option value="2"  <?php if ($this->_tpl_vars['selectupdatedata']['n_status'] == 2): ?>selected<?php endif; ?> >unpublished</option>
							<option value="1" <?php if ($this->_tpl_vars['selectupdatedata']['n_status'] == 1): ?>selected<?php endif; ?> > publish</option>
							<option value="3" <?php if ($this->_tpl_vars['selectupdatedata']['n_status'] == 3): ?>selected<?php endif; ?> >deleted</option>
						</select>
					</td>
				</tr>		
				<tr>
					<td colspan="3" >
						<input type="submit" name="submit" value="submit" />
						<input type="button" class="btn" value="Cancel" onclick="javascript: window.location.href='<?php echo $this->_tpl_vars['basedomain']; ?>
news' ;" />
					</td>
					 <input type="hidden" name="editit" value="ok" /> 
				</tr>
				
			</table>
            </form>
		</div>
	</div>
</div>