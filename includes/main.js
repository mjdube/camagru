var video = document.getElementById('video');
var canvas = document.getElementById('canvas');
var context = canvas.getContext('2d');
var photo = document.getElementById('photo');
var sticker = new Image();
var btn = document.getElementsByClassName('btn');

(function() {
const vendorUrl = window.URL || window.webkitURL;
// navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia;
// navigator.getUserMedia({video:true, audio:false}, 
//     function(stream){
//         video.src = stream;
//         video.play();
//     }, function (error){
//     });
if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
    // Not adding `{ audio: true }` since we only want video now
    navigator.mediaDevices.getUserMedia({ video: true }).then(function(stream) {
        //video.src = window.URL.createObjectURL(stream);
        video.srcObject = stream;
        video.play();
    });
}
    
    document.getElementById('capture1').addEventListener('click', function(){
        context.drawImage(video, 0, 0, 400, 300);
        // photo.setAttribute('src', canvas.toDataURL('image/jpg'));
        photo.setAttribute('value', canvas.toDataURL('image/jpg'));
    })
})();

function addSticker(path){
    var sticker = new Image();
    var name = null;
    // var width = video.offsetWidth, height = video.offsetHeight;
    // sticker.src = path;
    if (path === 1) 
        name = "includes/stickers/thinking.png";
    else if (path === 2)
        name = "includes/stickers/poo.png";
    else if (path === 3)
        name = "includes/stickers/android.png";
    else if (path === 4)
        name = "includes/stickers/peacock.png";
    
    sticker.src = name;

    if (canvas){
        context = canvas.getContext('2d');
        context.drawImage(sticker, 0, 0, 50, 50);
        photo.src = canvas.toDataURL('image/png');
        document.getElementById("canvas").innerHTML = "<img src="+photo.src+">";
    }
    else{
        document.getElementById("canvas").innerHTML = "Take a picture first."; 
    }
  }

// btn.addEventListener("click", addSticker);

