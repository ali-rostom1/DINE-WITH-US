document.querySelectorAll(".menuCard").forEach((el)=>{
    el.addEventListener("click",()=>{
        document.getElementById("edit").href = `editMenu.php?id_menu=${el.id}`;
        document.getElementById('del').href = `deleteMenu.php?id_menu=${el.id}`;
    })
})

addMenu.addEventListener("click",()=>{
    window.location = "addMenu.php";
})