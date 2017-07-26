<div class="widget widget-weekly-popular">
    <div class="the-title">
        <h2 class="icon icon_smile"><span>Weekly Popular</span></h2>
    </div>
    <ul class="weekly-popular clearfix">
        <li><a href="#"><img src="content/thumb/image5.jpg" /></a></li>
        <li><a href="#"><img src="content/thumb/image6.jpg" /></a></li>
        <li><a href="#"><img src="content/thumb/image7.jpg" /></a></li>
        <li><a href="#"><img src="content/thumb/image8.jpg" /></a></li>
        <li><a href="#"><img src="content/thumb/image9.jpg" /></a></li>
        <li><a href="#"><img src="content/thumb/image10.jpg" /></a></li>
        <li><a href="#"><img src="content/thumb/image11.jpg" /></a></li>
        <li><a href="#"><img src="content/thumb/image12.jpg" /></a></li>
        <li><a href="#"><img src="content/thumb/image13.jpg" /></a></li>
    </ul>
</div><!-- END .section -->

<script>
var $container  = $('#ib-container'),
    $articles   = $container.children('article'),
    timeout;
 
$articles.on( 'mouseenter', function( event ) {
         
    var $article    = $(this);
    clearTimeout( timeout );
    timeout = setTimeout( function() {
         
        if( $article.hasClass('active') ) return false;
         
        $articles.not($article).removeClass('active').addClass('blur');
         
        $article.removeClass('blur').addClass('active');
         
    }, 75 );
     
});
 
$container.on( 'mouseleave', function( event ) {
     
    clearTimeout( timeout );
    $articles.removeClass('active blur');
     
});
</script>