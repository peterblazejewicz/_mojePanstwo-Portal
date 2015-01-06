/*LOAD YOUTUBE BASIC JS*/
var tag = document.createElement('script');
tag.src = "http://www.youtube.com/player_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
var player;

/*GENERATE YT IFRAME*/
function onYouTubePlayerAPIReady() {
    var videoId = jQuery('#player').data('youtube');

    player = new YT.Player('player', {
        videoId: videoId,
    });
}