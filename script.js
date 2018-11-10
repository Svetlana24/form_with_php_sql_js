'use strict';




document.getElementsByClassName('form_up')[0].addEventListener('submit', function (event) {
	var _login = document.body.getElementsByClassName('login')[0],
	_email = document.body.getElementsByClassName('email')[0],
	_password = document.body.getElementsByClassName('password')[0],
	_password_repeat = document.body.getElementsByClassName('pasword_repeat')[0];
	var _return = true;

    if (!validateLogin(_login.value)) {
            console.log('Login is not valid');
            alert('The login is entered incorrectly!');
            _return = false;
        }

	if (!validateEmail(_email.value)) {
            console.log('Email is not valid');
            alert('The email is entered incorrectly!');
            _return = false;
        }
    if (!validatePassword(_password.value)) {
            console.log('Password is not valid');
            alert('The password must be not less than 6 characters!');
            _return = false;
        }
    if (!validateLogin(_password_repeat.value)) {
            console.log('Repeated password is not valid');
            alert('Repeated password is entered incorrectly!');
            _return = false;
        }
    if (_password.value !== _password_repeat.value) {
    		_return = false;
    	}
    if (_return) {
            console.log('All fine');
            var fd = new FormData();

            fd.append('login', _login.value);
            fd.append('email', _email.value);
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




