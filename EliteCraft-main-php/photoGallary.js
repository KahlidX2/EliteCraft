const galleryItems = ["gallary1.jpg", "gallary2.jpg", "gallary3.jpg"];//make an array thaat contain the photos 
const banner = document.querySelectorAll(".photoGallary")//make a variable called banner banner 
let currentPhotoIndex = 0;

function showPhoto(index) {//this function will display the photo at specific index
    for (let i = 0; i < banner.length; i++) {
        // Set the background image of the current element
        banner[i].style.backgroundImage = "url('assets/" + galleryItems[index] + "')";
    }
}

function rotatePhotos() {//this function will rotate the photos
    showPhoto(currentPhotoIndex);//display the photo at the index 
    //move to the next photo
    currentPhotoIndex = (currentPhotoIndex + 1) % galleryItems.length;
}
//the diration is 3000 milisecond = 3 seconds
setInterval(rotatePhotos, 3000);