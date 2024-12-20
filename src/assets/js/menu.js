chefs = document.querySelectorAll("#chefSelect li a");
chefs.forEach(el => {
    el.addEventListener('click',()=>{
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