<?php

function getVideoId($src) {
    preg_match('~/embed/([0-9a-z_-]+)~i', $src, $matches);
    return $matches[1];
}

$url = $mainVideo['guid'];

?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div id="mainVideo">
    <div id="player"></div>
    <div class="socials">
        <div class="fb-like" data-href="http://www.reflexeprevention.ch/campagnes/explosion-dans-une-cuisine-2/" data-send="false" data-width="50" data-show-faces="false"></div>
    </div>
</div>

<script>
// 2. This code loads the IFrame Player API code asynchronously.
var tag = document.createElement('script');
tag.src = "//www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

// 3. This function creates an <iframe> (and YouTube player)
//    after the API code downloads.
var player;
function onYouTubeIframeAPIReady() {
    player = new YT.Player('player', {
        height: '390',
        width: '100%',
        videoId: '<?php echo getVideoId($mainVideo['video']); ?>',
        events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
        }
    });
}

function onPlayerReady(event) {
    resizeVideo();
    event.target.playVideo();
}

function onPlayerStateChange(event) {
    
    if( event.data == 0)
    {
        window.location = $('.fb-like').attr('data-href');
    }
        
}

</script>