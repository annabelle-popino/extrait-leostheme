

$('.transition-moody').on('click', function(e) {
    e.preventDefault();
    $('.fineart').toggleClass('moody-transition');
});

$('.transition-fineart').on('click', function(e) {
    e.preventDefault();
    $('.fineart').toggleClass('moody-transition');
});

$('.modal-toggle').on('click', function(e) {
    e.preventDefault();
    $('.modal').toggleClass('is-visible');
});

function chargerVideo(idframe, idvideo) {
    document.getElementById(idframe).src = 'https://player.vimeo.com/video/' + idvideo;
}



var playButton = document.querySelector('.play'),
    pauseButton = document.querySelector('.pause'),
    iframe = document.querySelector('#video1');

/* Helper function to send a message to Vimeo-iframe */
function vimeoPost(action, value, target) {
    var data = { method: action };
    if (value) {
        data.value = value;
    }
    target.postMessage(JSON.stringify(data), '*');
}

/* When clicking the playButton, send a "play"-message */
playButton.addEventListener('click', function() {
    vimeoPost('play',null,iframe.contentWindow)
}, false);

/* When clicking the pauseButton, send a "pause"-message */
pauseButton.addEventListener('click', function() {
    vimeoPost('pause',null,iframe.contentWindow)
}, false);

/* When a message is received, deal with it */
window.addEventListener('message', function(event) {
    /* Get message and sender from the event */
    var message = JSON.parse(event.data);
    var sender = event.source;

    /* If the message.event is "ready", then send a message to add eventlisteners for play and pause also */
    if(message.event == "ready") {
        vimeoPost('addEventListener','play',sender);
        vimeoPost('addEventListener','pause',sender);
    }

    /* Because of the above, we will start receiving events when video is played or paused - we will toggle a class, just to show it visually */
    if(message.event == 'play') {
        iframe.classList.add('playing');
    }
    if(message.event == 'pause') {
        iframe.classList.remove('playing');
    }

}, false);


var playButton = document.querySelector('.play2'),
    pauseButton = document.querySelector('.pause2'),
    iframe = document.getElementById('video2');

/* Helper function to send a message to Vimeo-iframe */
function vimeoPost(action, value, target) {
    var data = { method: action };
    if (value) {
        data.value = value;
    }
    target.postMessage(JSON.stringify(data), '*');
}

/* When clicking the playButton, send a "play"-message */
playButton.addEventListener('click', function() {
    vimeoPost('play',null,iframe.contentWindow)
}, false);

/* When clicking the pauseButton, send a "pause"-message */
pauseButton.addEventListener('click', function() {
    vimeoPost('pause',null,iframe.contentWindow)
}, false);

/* When a message is received, deal with it */
window.addEventListener('message', function(event) {
    /* Get message and sender from the event */
    var message = JSON.parse(event.data);
    var sender = event.source;

    /* If the message.event is "ready", then send a message to add eventlisteners for play and pause also */
    if(message.event == "ready") {
        vimeoPost('addEventListener','play',sender);
        vimeoPost('addEventListener','pause',sender);
    }

    /* Because of the above, we will start receiving events when video is played or paused - we will toggle a class, just to show it visually */
    if(message.event == 'play') {
        iframe.classList.add('playing');
    }
    if(message.event == 'pause') {
        iframe.classList.remove('playing');
    }

}, false);


