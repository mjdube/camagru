(function() {

const video = document.getElementById('video');
const canvas = document.getElementById('canvas');
const context = canvas.getContext('2d');
const photo = document.getElementById('photo');
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

    document.getElementById('capture2').addEventListener('click', function(){
        
    })
    document.getElementById('capture1').addEventListener('click', function(){
        context.drawImage(video, 0, 0, 400, 300);
        // photo.setAttribute('src', canvas.toDataURL('image/jpg'));
        photo.setAttribute('value', canvas.toDataURL('image/jpg'));
    })
})();