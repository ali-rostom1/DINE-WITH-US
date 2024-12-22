chefs = document.querySelectorAll("#chefSelect li a");
chefs.forEach(el => {
    el.addEventListener('click',()=>{
        chefs.forEach(element =>{
            if(element.classList.contains("bg-red-500")){
                element.classList.toggle("bg-red-500");
            }
        })
        el.classList.toggle("bg-red-500");
        cardsToHide = document.querySelectorAll('#cardContainer a:not(#'+ el.textContent +')');
        cardsToDisplay = document.querySelectorAll('#cardContainer #' + el.textContent);
        
        cardsToHide.forEach(ele =>{
            if(!ele.classList.contains("hidden")){
                ele.classList.toggle("hidden");
            }
        });
        cardsToDisplay.forEach(ele=>{
            if(ele.classList.contains("hidden")){
                ele.classList.toggle("hidden");
            }
        });
    });
});