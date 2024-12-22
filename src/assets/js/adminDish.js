document.querySelectorAll(".dish-card").forEach((el)=>{
    el.addEventListener("click",()=>{
        document.getElementById("edit").href = `editDish.php?id_dish=${el.id}`;
        document.getElementById('del').href = `processDeleteDish.php?id_dish=${el.id}`;
    })
})

addDish.addEventListener("click",()=>{
    window.location = "addDish.php";
})