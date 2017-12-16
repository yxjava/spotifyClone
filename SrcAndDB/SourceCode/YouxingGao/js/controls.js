var mytrack = document.getElementById('mytrack');
var playButton = document.getElementById('playButton')

function playOrPause(){
  if (!mytrack.paused && !mytrack.ended) {
    mytrack.pause();
    playButton.style.backgroundImage = 'url(../images.play.png)'
  }
  else {
    mytrack.play();
  }
}
