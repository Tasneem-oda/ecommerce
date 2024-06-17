let see_more = document.querySelector('.see_more');
let messages = document.querySelector('.messages');
let nweimg;
let images = [
    'images/o13.jpg',
    'images/o14.jpg',
    'images/o15.jpg',
    'images/o16.jpg',
    'images/o17.jpg',
    'images/o18.jpg',
    'images/o19.jpg',
    'images/o20.jpg',
    'images/o21.jpg',
    'images/o22.jpg',
    'images/o23.jpg',
    'images/o24.jpg',
    'images/o25.jpg',
    'images/o26.jpg',
    'images/o27.jpg',
    'images/o28.jpg',
    'images/o29.jpg',
    'images/o30.jpg',
    'images/o31.jpg',
    'images/o32.jpg',
    'images/o33.jpg',
    'images/o34.jpg',
    'images/o35.jpg',
    'images/o36.jpg',
    'images/o37.jpg',
    'images/o38.jpg',
    'images/o39.jpg',
    'images/o40.jpg',
    'images/o41.jpg',
    'images/o42.jpg',
    'images/o43.jpg',
    'images/o44.jpg',
    'images/o45.jpg',
    'images/o46.jpg',
    'images/o47.jpg',
    'images/o48.jpg',
    'images/o49.jpg',
    'images/o50.jpg',
    'images/o51.jpg',
    'images/o52.jpg',
    'images/o53.jpg',
    'images/o54.jpg',
    'images/o55.jpg',
    'images/o56.jpg',
    'images/o57.jpg',

];
see_more.addEventListener('click', function(){
    images.forEach(image=>{
        let nweimg = document.createElement('img');
            nweimg.src = image;   
            nweimg.classList.add('message');
        messages.appendChild(nweimg);
        see_more.style.display = 'none';
    })
   
})