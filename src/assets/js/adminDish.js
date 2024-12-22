document.querySelectorAll(".dish-card").forEach((el)=>{
    el.addEventListener("click",()=>{
        document.getElementById("edit").href = `editDish.php?id_menu=${el.id}`;
        document.getElementById('del').href = `deleteDish.php?id_menu=${el.id}`;
    })
})

addDish.addEventListener("click",()=>{
    window.location = "addDish.php";
})