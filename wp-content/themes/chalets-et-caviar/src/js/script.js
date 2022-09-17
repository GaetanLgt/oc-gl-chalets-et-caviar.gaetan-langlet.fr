window.onload = () => {
    let headerBgLink = document.querySelector('.menu-item-object-custom a')
    let header = document.querySelector('#header')
    let headerBg = window.getComputedStyle(header, "::after");

    let link = headerBgLink.getAttribute('href')

    header.style.setProperty('--headerBeforeBackgroundImage', "url('"+link+"')") ;
    console.log(header)

}