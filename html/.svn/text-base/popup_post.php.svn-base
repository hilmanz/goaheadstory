
<script type="text/javascript">
	var basedomain = "{$basedomain}";
	var page = "{$pages}";	

	{literal}
	$(document).ready(function(){
		$("#music").hide();
		$("#upload-image").hide();
		$("#upload-music").hide();
		$("#pilih-mp3").hide();
		$("#pilih-video").hide();
		$("#create-band").hide();
		$("#create-dj").hide();
		
        $("#jenis-info").change(function(){
            var jenis_info = $("#jenis-info").val();			
			if (jenis_info!='') {
				$.post(basedomain+page+'/getJenis',{jenis_info:jenis_info},function(data){
					if(data) $(".valjenis").attr("value",data);
					else $(".valjenis").html("");
				},"JSON");
			}
			if (jenis_info==3) {
				$("#music").show();
				$("#upload-image").hide();
				$("#upload-music").hide();
			} else if (jenis_info=='') {
				$("#upload-image").hide();
				$("#pilih-mp3").hide();
				$("#upload-music").hide();
				$("#music").hide();
				$("#create-band").hide();
				$("#create-dj").hide();
			} else {
				$("#upload-image").show();
				$("#pilih-mp3").hide();
				$("#pilih-video").hide();
				$("#upload-music").hide();
				$("#music").hide();
				$("#create-band").hide();
				$("#create-dj").hide();
			}
        });
		
        $("#upload-as").change(function(){
            var upload_as = $("#upload-as").val();
			if (upload_as!='') {
				$(".typemusic").attr("value",upload_as);
				$.post(basedomain+'myband/ajaxcekBand',{upload_as:upload_as},function(data){
					if(data.band==0){
						alert('Maaf, fitur ini hanya tersedia untuk member A360 yang sudah memiliki Band Page, Silahkan Create Band Page.');
						$("#upload-music").hide();
						$("#pilih-mp3").hide();
						$("#pilih-video").hide();
						$("#create-band").show();
						$("#create-dj").hide();
						$("#add_member_band").hide();
						$("#canceladdmember").hide();
					} else if(data.dj==0){
						alert('Maaf, fitur ini hanya tersedia untuk member A360 yang sudah memiliki DJ Page, Silahkan Create DJ Page.');
						$("#upload-music").hide();
						$("#pilih-mp3").hide();
						$("#pilih-video").hide();
						$("#create-band").hide();
						$("#create-dj").show();
						$("#add_member_dj").hide();
						$("#canceladdmemberdj").hide();
					} else {
						$("#create-band").hide();
						$("#create-dj").hide();
						$("#upload-music").show();
						$("#pilih-mp3").show();
						$("#pilih-video").hide();
					}
				},"JSON");
			} else {
				$("#upload-music").hide();
				$("#create-band").hide();
				$("#create-dj").hide();
				$("#pilih-mp3").hide();
				$("#pilih-video").hide();
			}
        });
		
		$('#form-create-band').submit(function(){
			if ($('#setuju').is(':checked')){
			}else{
				alert('Anda belum setuju dengan syarat & ketentuan yang berlaku!');
				return false;
			}
			if( $('#cband-name').val() != '' && $('#cband-influence').val() != '' && $('#cband-profile').val() != '' ){
				if($('#genre').val()==''){
					alert('Mohon pilih genre!');
					return false;
				}
			}else{
				alert('Mohon lengkapi form pendaftaran!');
				return false;
			}
			//$.post(basedomain+'myband/ajaxcreateband',{name:name},function(data){
			
			//},"JSON");
			alert("Sukses Create Band");
		});
		
		$('#form-create-dj').submit(function(){
			if ($('#setujudj').is(':checked')){
			}else{
				alert('Anda belum setuju dengan syarat & ketentuan yang berlaku!');
				return false;
			}
			if( $('#cdj-name').val() != '' && $('#cdj-influence').val() != '' && $('#cdj-profile').val() != '' ){
				if($('#citydj').val()==''){
					alert('Mohon pilih city!');
					return false;
				}if($('#genredj').val()==''){
					alert('Mohon pilih genre!');
					return false;
				}
			}else{
				alert('Mohon lengkapi form pendaftaran!');
				return false;
			}
			//$.post(basedomain+'myband/ajaxcreateband',{name:name},function(data){
			
			//},"JSON");
			alert("Sukses Create DJ");
		});
		
		$('#btn-add-member').click(function(){
			if( $("#member_id").val() == '' ){
				alert("Please put valid member name");
				return false;
			}
			$('#list-members').append('<div class="add-member-load"></div>');
			$.post(basedomain+'myband/getInfoMember',{id: $("#member_id").val() },
				function(data){
					if(data.sukses){
						var htm = "";
						htm += '<td class="member-list" id="mem-'+data.id+'">';
						htm +=    '<a href="javascript:;" class="smallAvatar">';
						htm +=        '<img src="'+basedomain+'public_assets/user/photo/tiny_'+data.img+'" />';
						htm +=    '</a>';
						htm +=        '<a href="javascript:;" class="memberName">'+data.name+'</a>';
						htm +=        	'<a class="edit" href="javascript:editMember('+data.id+','+data.id+',\''+data.name+'\');"> Edit</a> |';
						htm +=            '<a class="delete" href="javascript:deleteMember('+data.id+');">Delete</a>';
						htm += '</td>';
						
						//not[data.id] = ','+data.id;
						$('.add-member-load').empty().remove();
						$('#form-create-band').append('<input class="cband-person" id="hmem-'+data.id+'" type="hidden" name="person[]" value="'+data.id+'[:]'+$("#instrument").val()+'" />');
						
						$('#list-members').append(htm).fadeIn();
						$("#members").val(data.id);
						$("#member_name").val("");
						$("#member_id").val("");
						$("#instrument").val("");
						$("#add-member").css("background","none");
					}
				},
				'json'
			);
		});
		
		$('#member_name').keyup(function(){
			var kw = $(this).val();		
			var delay = (function(){
				var timer = 0;
				return function(callback, ms){
				clearTimeout (timer);
				timer = setTimeout(callback, ms);
				};
			})();
			//alert(kw);
			$(this).addClass("putloader");
			delay(function(){
				$.post(basedomain+'myband/searchMember',{kw:kw},
				function(data){
					if(data.m){
						var num = data.m.length;
						var htm = "";
						for(i=0;i<num;i++){
							htm += '<a href="javascript:addMember('+data.m[i].id+',\''+data.m[i].name+'\');">';
							htm += '<img src="'+basedomain+'public_assets/user/photo/tiny_'+data.m[i].img+'" style="vertical-align:middle;"  />&nbsp;&nbsp;'+data.m[i].name+'</a>';
						}
							$('#select-member').html(htm);
							$('#select-member').hide('fast',function(){
								$(this).slideToggle();
							});
							$('#member_name').removeClass("putloader");
					}else{
						var htm = "";
						$('#member_name').hide();
						htm += '<a href="javascript:;">no result</a>';
						$('#select-member').html(htm);
						$('#select-member').hide('fast',function(){
							$(this).slideToggle();
						});
						$('#member_name').removeClass("putloader");
					}
				},
				'json'
			);
			}, 1000 );
		});		
		
    });
	
	function pilih_upload_mp3() {
		$("#pilih-mp3").show();
		$("#pilih-video").hide();
	}
	
	function pilih_upload_video() {
		$("#pilih-mp3").hide();
		$("#pilih-video").show();
	}
	
	function linkaddmemberband() {
		$("#add_member_band").show();
		$("#canceladdmember").show();
	}
	
	function cancellinkband() {
		$("#add_member_band").hide();
		$("#canceladdmember").hide();
	}
	
	function linkaddmemberdj() {
		$("#add_member_dj").show();
		$("#canceladdmemberdj").show();
	}
	
	function cancellinkdj() {
		$("#add_member_dj").hide();
		$("#canceladdmemberdj").hide();
	}
	
	function addMember(id,name){
		$("#member_name").val(name);
		$("#member_id").val(id);
		$('#select-member').hide();
		//$("#add-member").css("background","none");
	}
	function editMember(el,id,name,instru){
		$("#mem-"+el).remove();
		$("#hmem-"+el).remove();
		not[id] = "";
		$("#member_name").val(name);
		$("#member_id").val(id);
		$("#instrument").val(instru);
		$('#select-member').hide();
		$("#add-member").css("background","#E01A22");
	}
	function deleteMember(id){
		$("#mem-"+id).remove();
		$("#hmem-"+id).remove();
		//not[id] = "";
		$('#select-member').hide();
	}
</script>
{/literal}
<div class="popup">
	<div class="popupContainer" id="popup-post">
        <div class="popupContent">
        	<div class="popupHead">
                <div class="the-title">
                    <h2 class="icon icon_smile"><span>New Post</span></h2>
                </div>
            </div>
        	<div id="post-upload" class="row">
                <select name="jenis_info" id="jenis-info" class="styled">
                    <option value="" >Category</option>
                    {section name=i loop=$jenis_type}
                    <option value="{$jenis_type[i].id}">{$jenis_type[i].type}</option>
                    {/section}
                </select>
            </div>
            <div id="music" class="row">
                <select name="upload-as" id="upload-as" class="styled">
                    <option value="" selected="selected">Upload As</option>
                    <option value="3">Band</option>
                    <option value="15">DJ</option>
                </select>
            </div>
            <div id="upload-image" class="row">
                <form method="post" action="{$basedomain}{$pages}/upload" enctype="multipart/form-data">
                    <input type="hidden" class="valjenis" value="" name="type"/>
                    {$upload_pages_image}
                    <input type="hidden" name="upload" value="image" />	
                </form>
            </div>
            <div id="upload-music">	
                <ul id="main-menu" class="fl">
                    <li onclick="pilih_upload_mp3()"><a href="#" >MP3</a></li>	
                    <li onclick="pilih_upload_video()"><a href="#" >Video</a></li>
                </ul>
            </div>
            <div id="pilih-mp3" class="row">
                <form method="post" action="{$basedomain}{$pages}/upload" enctype="multipart/form-data">
                    <input type="hidden" class="typemusic" value="" name="typemusic"/>
                    {$upload_pages_music}
                    <input type="hidden" name="upload" value="music" />	
                </form>
            </div>
            
            <div id="pilih-video" class="row">
                <form method="post" action="{$basedomain}{$pages}/upload" enctype="multipart/form-data">
                    <input type="hidden" class="typemusic" value="" name="typemusic"/>
                    {$upload_pages_video}
                    <input type="hidden" name="upload" value="video" />	
                </form>
            </div>
            
            <div id="create-band" class="row">
                {include file="application/web/widgets/create-band.html"}
            </div>
            
            <div id="create-dj" class="row">
                {include file="application/web/widgets/create-dj.html"}
            </div>
        </div><!-- END .popupContent -->
    </div><!-- END .popupContainer -->
</div><!-- END .popup -->

