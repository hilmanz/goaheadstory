
<div id="footer">
    <div class="wrapper">
        <p>Informasi dalam website ini ditujukan untuk perokok berusia 18 tahun atau lebih dan tinggal di wilayah Indonesia. 
        Jika kamu tidak ingin dihubungi oleh PT HM Sampoerna Tbk melalui email, kamu bisa hapus kontak kamu dengan mengklik link hapus saya dibawah ini.</p>
        <a href="#">Halaman Utama </a>
        <a target="_blank" href="#">Syarat dan Ketentuan</a>
        <a target="_blank" href="#">Hapus saya</a>
        <a target="_blank" href="#">Kontak Kami</a>
        <a target="_blank" href="http://www.pmi.com/id/smokingandhealth">Perihal Merokok</a>   
    </div>
</div><!-- END #footer -->
<div id="hw">
	<div class="wrapper">
	<img src="images/hw.png" />
    </div>
</div>
<script>
$('.mp3Player audio').mediaelementplayer({
    audioHeight: 30,
    startVolume: 0.8,
    loop: false,
    enableAutosize: true,
    features: ['playpause','current','progress'],
 
});
 $(function(){
        $('.thePlayer audio').mediaelementplayer({
            success: function (mediaElement, domObject) {
                mediaElement.addEventListener('ended', function (e) {
                    mejsPlayNext(e.target);
                }, false);
            },
            keyActions: []
        });

        $('.mejs-list tbody tr').click(function() {
            $(this).addClass('current').siblings().removeClass('current');
            var audio_src = $(this).attr('rel');
            $('audio#mejs:first').each(function(){
                this.player.pause();
                this.player.setSrc(audio_src);
                this.player.play();
            });
			return false;
        });

    });

    function mejsPlayNext(currentPlayer) {
        if ($('.mejs-list tbody tr.current').length > 0){ // get the .current song
            var current_item = $('.mejs-list tbody tr.current:first'); // :first is added if we have few .current classes
            var audio_src = $(current_item).next().text();
            $(current_item).next().addClass('current').siblings().removeClass('current');
            console.log('if '+audio_src);
        }else{ // if there is no .current class
            var current_item = $('.mejs-list tbody tr:first'); // get :first if we don't have .current class
            var audio_src = $(current_item).next().text();
            $(current_item).next().addClass('current').siblings().removeClass('current');
            console.log('elseif '+audio_src);
        }

        if( $(current_item).is(':last-child') ) { // if it is last - stop playing
            $(current_item).removeClass('current');
        }else{
            currentPlayer.setSrc(audio_src);
            currentPlayer.play();
        }
    }
</script>
