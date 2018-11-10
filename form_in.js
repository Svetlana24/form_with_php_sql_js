'use strict';

document.getElementsByClassName('form_in')[0].addEventListener('submit', function (event) {
	
	var _user_name = document.body.getElementsByClassName('user_name')[0],
	_password = document.body.getElementsByClassName('password')[0];
    console.log(_password);
    console.log(_user_name);
	var _return = true;

	if (!validateLogin(_user_name.value)) {
            console.log('User name is not valid');
            alert('The data is entered incorrectly!');
            _return = false;
        }
    if (!validatePassword(_password.value)) {
            console.log('Password is not valid');
            alert('The password must be not less than 6 characters!');
            _return = false;
        }
    if (_return) {
            console.log('All fine');
            var fd = new FormData();

            fd.append('user_name', _user_name.value);
            fd.append('password', _password.value);
        }
    else {
            event.preventDefault();
        }
});

function validateEmail(email) {

    var result = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return result.test(String(email).toLowerCase());
}
function validatePassword(password) {
    var result = /[0-9a-zA-Z!@#$%^&*]{6,16}$/;
    console.log(password);
    return result.test(String(password));

}
function validateLogin(login) {
    var result = /[0-9a-zA-Z]{3,}$/; 
    return result.test(String(login));
}