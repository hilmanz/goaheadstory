<?php /* Smarty version 2.6.13, created on 2014-02-13 15:18:39
         compiled from application/admin/widgets/administrator-roles-lists.html */ ?>
<div id="theContainer2" class="galleryPage">
    <div class="theContainer2">
        <div class="theContent2">
        	<div class="col-content">
                <div class="theBox">
                    <div class="theBox-title">
                        <h2 class="fl">LISTS Roles </h2>
                       
                    </div><!-- /.theBox-title -->
                    <div class="theBox-content">
                        <div class="forms">
							<table border="1px" width=100% >
							<tr><td><a class="Btn" href="<?php echo $this->_tpl_vars['basedomain']; ?>
administrator/addroles" > add user role </a></td>
							<td><a class="Btn" href="<?php echo $this->_tpl_vars['basedomain']; ?>
administrator/modulepermissionlist" > module list </a></td></tr>
							<tr><th>role name</th><th colspan='2' >action</th></tr>
							<?php $_from = $this->_tpl_vars['roles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
							<tr><th><?php echo $this->_tpl_vars['v']['name']; ?>
</th><th><a class="Btn" href="<?php echo $this->_tpl_vars['basedomain']; ?>
administrator/seepermission/<?php echo $this->_tpl_vars['v']['id']; ?>
" >permission</a></th></tr>
							<?php endforeach; endif; unset($_from); ?>
							</table>
                        </div> <!-- /.forms -->
                    </div> <!-- /.theBox-content -->
                </div> <!-- /.theBox -->
            </div><!-- /.col-content -->
          
        </div> <!-- /.theContent2 -->
    </div> <!-- /.theContainer -->
</div> <!-- /#theContainer -->