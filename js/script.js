let btnClear = document.querySelector('button');
let inputs = document.querySelectorAll('form-control');

btnClear.addEventListener('click', () => {
    inputs.forEach(textarea =>  textarea.value = '');
});