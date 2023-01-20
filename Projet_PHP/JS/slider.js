
const slide = ["/images/desktopA.jpg", "/images/gaming.jpg"];
let numero = 0;
function changeSlide(){
    while(slide.length < 0){
      numero++;
    }
    document.getElementById("container").src = slide[numero];
}
