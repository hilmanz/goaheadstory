<?php /* Smarty version 2.6.13, created on 2014-02-13 15:18:24
         compiled from application/admin/widgets/administrator-user-lists.html */ ?>
<?php echo '
<style>
#selectfid{width:170px}
#selectfidbrand{width:170px}
#selectfidarea{width:170px}
#selectfidpl{width:170px}
#selectfidba{width:170px}
</style>
'; ?>

<div id="theContainer2" class="galleryPage">
    <div class="theContainer2">
        <div class="theContent2">
        	<div class="col-content" style="width:100%">
                <div class="theBox register-box">
                    <div class="theBox-title">
                        <h2 class="fl">LISTS USER</h2>
                       	<input id="search" class="fr" type="text" name="search" value="" placeholder="search">
                    </div><!-- /.theBox-title -->
                    <div class="theBox-content">
                        <div class="forms">
							<table class="registerUser" border="1px" width=100% >
							<thead>
							<tr>
							<th class="header"><a href="javascript:void(0)" class="sort" data-sorter="name" >NAME</a></th>
							<th class="header"><a href="javascript:void(0)" class="sort" data-sorter="email">EMAIL</a></th>
							<th class="header"><a href="javascript:void(0)" class="sort" data-sorter="pagename" >ROLE</a></th>
						 	<th class="alCenter" colspan='2' >ACTION</th>
							</tr>
							</thead>
							<tbody class="reg">
							
							</tbody>
							</table>
							<div class="paging" id="paging_of_user_list"></div> <!-- END .paging -->
							<a class="Btn button" href="<?php echo $this->_tpl_vars['basedomain']; ?>
administrator/doregister" >REGISTER</a>
                        </div> <!-- /.forms -->
                    </div> <!-- /.theBox-content -->
                </div> <!-- /.theBox -->
            </div><!-- /.col-content -->
          
        </div> <!-- /.theContent2 -->
    </div> <!-- /.theContainer -->
</div> <!-- /#theContainer -->
<script type="text/javascript">
<?php echo '
	var user={};
	user.orderType=\'ASC\';
	user.orderBy=\'name\';
	user.search="";
	var brand=0;
	$(document).ready(function(){
		get_list_of_user(user,0);
	});

	$(\'#search\').keypress(function(e) {
	    if(e.which == 13) {
	    	user.search=$(this).val();
	        get_list_of_user({},0);
	    }
	});

	$(\'#search\').change(function(e) {
	    if($(this).val()=="") {
	    	user.search="";
	        get_list_of_user({},0);
	    }
	});
	$(\'a.sort\').on(\'click\',function(){
		user.orderBy=$(this).data(\'sorter\');
		user.orderType=((user.orderType==\'ASC\')?\'DESC\':\'ASC\');
		 
		
		get_list_of_user({},0);
	});
'; ?>

</script>