
function dynamicInputValidation(input,regex){
    input.addEventListener('input',()=>{
        if(regex.test(input.value)){
            input.classList.add('border-green-500');
            input.classList.remove('border-red-500');
        }else{
            input.classList.add('border-red-500');
            input.classList.remove('border-green-500');
        }
    })
}
function inputValidation(input,regex){
    return regex.test(input.value);
}

let nameRegex = /^[a-zA-Z\s'-]{4,20}$/;
let emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
let passRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;


dynamicInputValidation(nameInput,nameRegex);
dynamicInputValidation(emailInput,emailRegex);
dynamicInputValidation(passwordInput,passRegex);
dynamicInputValidation(confirmPassword,passRegex);


registerForm.addEventListener("submit",(event)=>{
    event.preventDefault();
    if(inputValidation(nameInput,nameRegex) && inputValidation(emailInput,emailRegex) && inputValidation(passwordInput,passRegex) && inputValidation(confirmPassword,passRegex)){
        registerForm.submit();
    }
})