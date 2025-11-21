function updateFileName(inputId) {
    let inputElement = document.getElementById(inputId);
    let fileName = inputElement.files.length > 0 ? inputElement.files[0].name : '';
    document.getElementById(inputId + '-name').textContent = fileName;
}

document.addEventListener('DOMContentLoaded', function () {
    const select_dob = document.getElementById('dob');

    const today1 = new Date();
    const min1 = new Date(today1);
    const max1 = new Date(today1);

    min1.setFullYear(today1.getFullYear() - 45);
    max1.setFullYear(today1.getFullYear() - 18);

    const formattedMinDate1 = min1.toISOString().split('T')[0];
    const formattedMaxDate1 = max1.toISOString().split('T')[0];

    select_dob.setAttribute('min', formattedMinDate1);
    select_dob.setAttribute('max', formattedMaxDate1);

    const select_exp = document.getElementById('wexp');

    const today2 = new Date();
    const min2 = new Date(today2);
    const max2 = new Date(today2);

    min2.setFullYear(today2.getFullYear() - 50);
    max2.setFullYear(today2.getFullYear()-1);
    const formattedMinDate2 = min2.toISOString().split('T')[0];
    const formattedMaxDate2=max2.toISOString().split('T')[0];

    select_exp.setAttribute('min', formattedMinDate2);
    select_exp.setAttribute('max', formattedMaxDate2);
});

//Code for real time form
document.addEventListener('DOMContentLoaded',function(){
const form = document.getElementById('form');
const fields = [
    'photo', 'email', 'password', 'fname', 'mname', 'lname', 'dob', 'lang', 'address', 'phone', 'license_no', 'wexp', 'guiding_location', 'document'
];

const phone_regx1 = /^98\d{8}$/;
const phone_regx2 = /^97\d{8}$/;
const email_regx = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
const isAlphabet = /^[A-Za-z]+$/;
const isDigit = /^\d+$/;
const isNumber = /^[0-9]+$/;
const whitespacePattern = /\s/;

fields.forEach(fieldId => {
    const field = document.getElementById(fieldId);
    if (field) {
        field.addEventListener('input', () => validateSingleInput(field));
    }
});


const setError=(element,message)=>{
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText=message;
    inputControl.classList.add('error');
    inputControl.classList.remove('success');
};

const setSuccess=(element) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText='';
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
};

const validateSingleInput=(field) =>{
    if(field===photo){
        if(field.files.length===0){
            setError(field,'Profile picture is required');
        }       
        else{
            setSuccess(field);
        }
    }
    else if(field===email){
        if(field.value.trim()===''){
            setError(field,'Email is required');
        }
        else if(!email_regx.test(field.value)){
            setError(field,'Valid email is required');
        }
        else{
            setSuccess(field);
        }
    }

    else if(field === password){
        if(whitespacePattern.test(field.value)){
            setError(field,"Password shouldn't contain any whitespaces.");
        }
        else if(!(field.value.trim()==='') && field.value.length<6){
            setError(field,'Password should contain more than 6 characters');
        }
        else{
            setSuccess(field);
        }
    }

    else if(field===fname){
        if(field.value.trim()===''){
            setError(field,'First Name is required');
        }
        else if(!isAlphabet.test(field.value)){
            setError(field,'Only letters are allowed');
        }
        else{
            setSuccess(field);
        }
    }

    else if(field == mname){
        if(!isAlphabet.test(field.value)){
            setError(field,'Only letters are allowed');
        }
        else{
            setSuccess(field);
        }
    }

    else if(field===lname){
        if(field.value.trim()===''){
            setError(field,'Last Name is required.');
        }
        else if(!isAlphabet.test(field.value)){
            setError(field,'Only letters are allowed');
        }
        else{
            setSuccess(field);
        }
    }

    else if (field=== dob) {
        if (field.value.length === 0) {
            setError(field, 'Date of Birth is required');
        } 
        else if(isAlphabet.test(field.value)){
            setError(field,'Only date in mm/dd/yyyy allowed');
        }
        else {
            setSuccess(field);
        }
    }

    else if(field===lang){
        if(field.value.trim()===''){
            setError(field,'Known languages is required');
        }
        else if(isDigit.test(field.value)){
            setError(field,'Only letters are allowed');
        }
        else{
            setSuccess(field);
        }
    }
    else if(field===address){
        if(field.value.trim()===''){
            setError(field,'Address is required');
        }
        else{
            setSuccess(field);
        }
    }
    else if(field===phone){
        if(field.value.trim()===''){
            setError(field,'Phone Number is required');
        }
        else if(!isNumber.test(field.value)){
            setError(field,'Only digits are allowed');
        }
        else if(!(phone_regx1.test(field.value) || phone_regx2.test(field.value))){
            setError(field,"Phone Number should start with '98' or '97' & contain 10 digits");
        }
        else{
            setSuccess(field);
        }
    }
    else if(field===license_no){
        if(field.value.trim()===''){
            setError(field,'License Number is required');
        }
        else if(!isNumber.test(field.value)){
            setError(field,'Only digits are allowed');
        }
        else{
            setSuccess(field);
        }
    }
    else if (field=== wexp) {
        if (field.value.length === 0) {
            setError(field, 'Work Experience is required');
        } 
        else if(isAlphabet.test(field.value)){
            setError(field,'Only date in mm/dd/yyyy allowed');
        }
        else {
            setSuccess(field);
        }
    }

    else if(field===guiding_location){
        if(field.value===''){
            setError(field,'Guiding location is required');
        }
        else{
            setSuccess(field);
        }
    }



    else if (field === document) {
        if (field.files.length === 0) {
            setError(field, 'Document is required');
        } else {
            setSuccess(field);
        }
    }
};


const validateGenderInput = () => {
    const genderSelected = document.querySelector('input[name="gender"]:checked');
    const genderErrorDisplay = document.querySelector('.gender + .error');
    if (!genderSelected) {
        genderErrorDisplay.innerText = 'Gender is required';
        document.querySelector('.gender').classList.add('error');
        document.querySelector('.gender').classList.remove('success');
    } else {
        genderErrorDisplay.innerText = '';
        document.querySelector('.gender').classList.add('success');
        document.querySelector('.gender').classList.remove('error');
    }
};

form.addEventListener('submit', (e) => {
    let isValid = true;
    fields.forEach(fieldId => {
        const field = document.getElementById(fieldId);
        if (field) {
            validateSingleInput(field); 
            if (field.classList.contains('error')) {
                isValid = false;
            }
        }
    });

    // Check gender validation before submitting form
    validateGenderInput();

    if (!isValid || document.querySelector('.gender').classList.contains('error')) {
        e.preventDefault();
    }
});
});