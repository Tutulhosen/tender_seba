/*=============== ACCORDION ===============*/
const accordionItems = document.querySelectorAll('.accordion__item')

// 1. Selecionar cada item
accordionItems.forEach((item) =>{
    const accordionHeader = item.querySelector('.accordion__header')

    // 2. Seleccionar cada click del header
    accordionHeader.addEventListener('click', () =>{
        // 7. Crear la variable
        const openItem = document.querySelector('.accordion-open')
        
        // 5. Llamar a la funcion toggle item
        toggleItem(item)

        // 8. Validar si existe la clase
        if(openItem && openItem!== item){
            toggleItem(openItem)
        }
    })
})

// 3. Crear una funcion tipo constante
const toggleItem = (item) =>{
    // 3.1 Crear la variable
    const accordionContent = item.querySelector('.accordion__content')

    // 6. Si existe otro elemento que contenga la clase accorion-open que remueva su clase
    if(item.classList.contains('accordion-open')){
        accordionContent.removeAttribute('style')
        item.classList.remove('accordion-open')
    }else{
        // 4. Agregar el height maximo del content
        accordionContent.style.height = accordionContent.scrollHeight + 'px'
        item.classList.add('accordion-open')
    }
}

(function () {
    "use strict";

    var carousels = function () {
        $(".owl-carousel1").owlCarousel({
            loop: true,
            autoplay: true,
            center: true,
            margin: 0,
            responsiveClass: true,
            nav: true,
            responsive: {
                0: {
                    items: 1,
                    nav: false
                },
                680: {
                    items: 2,
                    nav: false,
                    loop: false
                },
                1000: {
                    items: 3,
                    nav: true
                }
            }
        });
    };

    (function ($) {
        carousels();
    })(jQuery);
})();