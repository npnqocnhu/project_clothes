// document.addEventListener("DOMContentLoaded", function() {
//     const openLoginButton = document.getElementById("openLoginButton");
//     const openSignUpButton = document.getElementById("openSignUpButton");
//     const returnTextL = document.getElementById("returnTextL");
//     const returnTextS = document.getElementById("returnTextS");
//     let isLoginVisible = true; // Theo dõi trạng thái hiển thị
//     const loginModal = document.getElementById('loginModal');

//     openLoginButton.addEventListener("click", function() {
//         isLoginVisible = true;
//         loginModal.style.display = "flex";
//         toggleAuthForms(isLoginVisible);
//     });

//     openSignUpButton.addEventListener("click", function() {
//         isLoginVisible = false;
//         loginModal.style.display = "flex";
//         toggleAuthForms(isLoginVisible);
//     });

//     returnTextL.addEventListener("click", function() {
//         loginModal.style.display = "none";
//     });

//     returnTextS.addEventListener("click", function() {
//         loginModal.style.display = "none";
//     });

//     // Hàm để ẩn hoặc hiển thị các phần tử auth-form
//     function toggleAuthForms(isLoginVisible) {
//         const loginForm = document.querySelector(".auth-form.login");
//         const signUpForm = document.querySelector(".auth-form.signUp");

//         if (isLoginVisible) {
//             loginForm.style.display = "block";
//             signUpForm.style.display = "none";
//         } else {
//             loginForm.style.display = "none";
//             signUpForm.style.display = "block";
//         }
//     }

//     const passwordInput = document.getElementById("passwordInput");
//     const passInputSignUp1 = document.getElementById("passInputSignUp1");
//     const passInputSignUp2 = document.getElementById("passInputSignUp2");
//     const showPasswordIcon = document.getElementById("showPasswordIcon");
//     const showPasswordIconS1 = document.getElementById("showPasswordIconS1");
//     const showPasswordIconS2 = document.getElementById("showPasswordIconS2");
    
//     showPasswordIcon.addEventListener("click", function() {
//         if (passwordInput.type === "password") {
//             passwordInput.type = "text"; // Hiện mật khẩu
//             showPasswordIcon.innerHTML = '<i class="fa-solid fa-unlock"></i>';
//         } else {
//             passwordInput.type = "password"; // Ẩn mật khẩu
//             showPasswordIcon.innerHTML = '<i class="fa-solid fa-lock"></i>';
//         }
//     }); 

//     showPasswordIconS1.addEventListener("click", function() {
//         if (passInputSignUp1.type === "password") {
//             passInputSignUp1.type = "text"; // Hiện mật khẩu
//             showPasswordIconS1.innerHTML = '<i class="fa-solid fa-unlock"></i>';
//         } else {
//             passInputSignUp1.type = "password"; // Ẩn mật khẩu
//             showPasswordIconS1.innerHTML = '<i class="fa-solid fa-lock"></i>';
//         }
//     }); 

//     showPasswordIconS2.addEventListener("click", function() {
//         if (passInputSignUp2.type === "password") {
//             passInputSignUp2.type = "text"; // Hiện mật khẩu
//             showPasswordIconS2.innerHTML = '<i class="fa-solid fa-unlock"></i>';
//         } else {
//             passInputSignUp2.type = "password"; // Ẩn mật khẩu
//             showPasswordIconS2.innerHTML = '<i class="fa-solid fa-lock"></i>';
//         }
//     });

//     const openLoginFromSignUp = document.getElementById("openLoginFromSignUp");
//     const openLoginFromlogin = document.getElementById("openLoginFromlogin");
//     const loginForm = document.querySelector(".auth-form.login");
//     const signUpForm = document.querySelector(".auth-form.signUp");

//     openLoginFromSignUp.addEventListener("click", function() {
//         loginModal.style.display = "flex";
//         loginForm.style.display = "block";
//         signUpForm.style.display = "none";
//     });

//     openLoginFromlogin.addEventListener("click", function() {
//         loginModal.style.display = "flex";
//         loginForm.style.display = "none";
//         signUpForm.style.display = "block";
//     });
// });


// document.addEventListener("DOMContentLoaded", function() {
//     // Theo dõi trạng thái hiển thị
//     let isLoginVisible = true; 
//     const loginModal = document.getElementById('loginModal');

//     function loadModal() {
//     fetch('modal.html')
//                 .then(response => response.text())
//                 .then(data => {
//                     loginModal.innerHTML = data;
//                 })
//                 .catch(error => console.error(error));
//             }
//             loadModal();

    
//     // Hàm để ẩn hoặc hiển thị các phần tử auth-form
//     function toggleAuthForms(isLoginVisible) {
//         const loginForm = document.querySelector(".auth-form.login");
//         const signUpForm = document.querySelector(".auth-form.signUp");

//         if (isLoginVisible) {
//             loginForm.style.display = "block";
//             signUpForm.style.display = "none";
//         } else {
//             loginForm.style.display = "none";
//             signUpForm.style.display = "block";
//         }
//     }

//     // Chuyển qua form đăng ký
//     const openLoginButton = document.getElementById("openLoginButton");
//     const openSignUpButton = document.getElementById("openSignUpButton");
    
//     openLoginButton.addEventListener("click", function() {
//         isLoginVisible = true;
//         loginModal.style.display = "flex";
//         toggleAuthForms(isLoginVisible);
//     });

//     openSignUpButton.addEventListener("click", function() {
//         isLoginVisible = false;
//         loginModal.style.display = "flex";
//         toggleAuthForms(isLoginVisible);
//     });

//     const returnTextL = document.getElementById("returnTextL");
//     const returnTextS = document.getElementById("returnTextS");

//     returnTextL.addEventListener("click", function() {
//         loginModal.style.display = "none";
//     });

//     returnTextS.addEventListener("click", function() {
//         loginModal.style.display = "none";
//     });

//     const openLoginFromSignUp = document.getElementById("openLoginFromSignUp");
//     const openLoginFromlogin = document.getElementById("openLoginFromlogin");
//     const loginForm = document.querySelector(".auth-form.login");
//     const signUpForm = document.querySelector(".auth-form.signUp");

//     openLoginFromSignUp.addEventListener("click", function() {
//         loginModal.style.display = "flex";
//         loginForm.style.display = "block";
//         signUpForm.style.display = "none";
//     });

//     openLoginFromlogin.addEventListener("click", function() {
//         loginModal.style.display = "flex";
//         loginForm.style.display = "none";
//         signUpForm.style.display = "block";
//     });

    
// });





