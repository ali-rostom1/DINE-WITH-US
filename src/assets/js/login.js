let emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
let passRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;


function dynamicInputValidation(input,regex){
    input.addEventListener('input',()=>{
        if(regex.test(input.value)){
            input.classList.remove('border-red-500');
        }else{
            input.classList.add('border-red-500');
        }
    })
}
function inputValidation(input,regex){
    return regex.test(input.value);
}

dynamicInputValidation(email,emailRegex);
dynamicInputValidation(password,passRegex);

document.querySelector("form").addEventListener("submit",(event)=>{
    event.preventDefault();
    if(inputValidation(email,emailRegex) && inputValidation(password,passRegex)){
        document.querySelector("form").submit();
    }
});
