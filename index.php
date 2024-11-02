<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Registration</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        .form-container {
            display: none;
        }
        .active {
            display: block;
        }
        .toggle-link {
            cursor: pointer;
            color: #f7f7f7;
            text-decoration: underline;
        }
        .toggle-link:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Login Form -->
        <div id="login-form" class="form-container active">
            <h1>Automatic Watering System</h1>
            <h2>Login</h2>
            <h5 class = "login_note mt-3"></h5>
            <form onsubmit="login(event)">
                <div class="input-box">
                    <input type="text" id="email_signin" placeholder="Email" required>
                    <i class='bx bx-envelope'></i>
                </div>
                <div class="input-box">
                    <input type="password" id="password_signin" placeholder="Password" required>
                    <i class='bx bxs-hide' id="eyeicon"></i>
                </div>
                <div class="remember-forgot">
                    <label>
                        <input type="checkbox"> Remember me
                    </label>
                    <a href="#">Forgot password?</a>
                </div>
                <button type="submit" class="btn" id = "btn_signin">Login</button>
                <p class="toggle-link" onclick="showForm('registration-form')">Don't have an account? Register</p>
            </form>
        </div>

        <!-- Registration Form -->
        <div id="registration-form" class="form-container">
            <h1>Create an Account</h1>
         
                <div class="input-box">
                    <input type="text" id="username_register" placeholder="username" required>
                    <i class='bx bxs-face'></i>
                </div>
                <div class="input-box">
                    <input type="text" id="email_register" placeholder="Email" required>
                    <i class='bx bx-envelope'></i>
                </div>
                <div class="input-box">
                    <input type="password" id="password_register" placeholder="Password" required>
                    <i class='bx bxs-hide' id="eyeicon-register"></i>
                </div>
                <div class="terms-condition">
                    <label>
                        <input type="checkbox"> I agree to the <a href="#">Terms & Conditions</a>
                    </label>
                </div>
                <button type="button" id = "btn_signup" class="btn">Sign Up</button>
                <p class="toggle-link" onclick="showForm('login-form')">Have an account? Login</p>
          
        </div>
    </div>

    <div class="sample_json"></div>
    <input type = "hidden" id = "firebase_uid"/>
    

    <!-- Firebase Auth and Realtime Database Javascript Config [START] -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.js"></script>




    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



    <script type="module">

    // Import the functions you need from the SDKs you need
    

    import { initializeApp } from "https://www.gstatic.com/firebasejs/9.13.0/firebase-app.js";
        // TODO: Add SDKs for Firebase products that you want to use
        // https://firebase.google.com/docs/web/setup#available-libraries

    import { getAuth, createUserWithEmailAndPassword, signInWithEmailAndPassword, onAuthStateChanged, signOut } from "https://www.gstatic.com/firebasejs/9.13.0/firebase-auth.js";
    
        // Your web app's Firebase configuration
        // For Firebase JS SDK v7.20.0 and later, measurementId is optional
        const firebaseConfig = {
            apiKey: "AIzaSyDCYsvfU8iCT5iy4-yCxjpRT87yx0VK49E",
            authDomain: "automated-watering-syste-40cb1.firebaseapp.com",
            databaseURL: "https://automated-watering-syste-40cb1-default-rtdb.firebaseio.com",
            projectId: "automated-watering-syste-40cb1",
            storageBucket: "automated-watering-syste-40cb1.appspot.com",
            messagingSenderId: "551199172264",
            appId: "1:551199172264:web:313d33d7086a528150449d"
        };

        // Initialize Firebase

        const app_firebase = initializeApp(firebaseConfig);
        const auth = getAuth();
    
        

        function signin_firebase(email,password){

            signInWithEmailAndPassword(auth, email, password).then((userCredential) => {

                const user = userCredential.user;

            
                window.location.href = "pages/dashboard.php"
                

            }).catch((error) => {

                var login_note = '';


                const error_code = error.code;
                const error_message = error.message;
            
                //alert(error_code+" : "+error_message);
                
                error_code === 'auth/invalid-email' ? login_note = "E-mail format incorrect" : login_note;
                error_code === 'auth/invalid-login-credentials' ? login_note = "E-mail doesn't exist or Invalid Password" : login_note;

                login_note !== '' ? $('.login_note').html(login_note) : $('.login_note').html('Access granted!');

            });

        } // signin_firebase

        
        var signin = document.getElementById('btn_signin');
        

        signin.addEventListener('click',function(){

            var email = document.getElementById('email_signin').value;
            var password = document.getElementById('password_signin').value;

            signin_firebase(email,password);

        });     

        var btn_signup = document.getElementById('btn_signup');
            

        btn_signup.addEventListener('click',(e)=>{

            var username = document.getElementById('username_register').value;
            var email = document.getElementById('email_register').value;
            var password = document.getElementById('password_register').value;

            register_admin(username,email,password);

        });

        function register_admin(username, email, password){

            createUserWithEmailAndPassword(auth, email, password).then((userCredential)=>{

                const user = auth.currentUser;
                document.getElementById('firebase_uid').value = user.uid;


            }).catch((error)=>{
                $('.login_note').html('Creating new account failed '+error);
            });

        }

        


    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://www.gstatic.com/firebasejs/7.6.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.6.1/firebase-database.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    <script type="module">
            // Import the functions you need from the SDKs you need
            import { initializeApp } from "https://www.gstatic.com/firebasejs/9.22.2/firebase-app.js";
            
        
            // TODO: Add SDKs for Firebase products that you want to use
            // https://firebase.google.com/docs/web/setup#available-libraries
            
            // Your web app's Firebase configuration
            // For Firebase JS SDK v7.20.0 and later, measurementId is optional
            const firebaseConfigApp = {
                    apiKey: "AIzaSyDCYsvfU8iCT5iy4-yCxjpRT87yx0VK49E",
                    authDomain: "automated-watering-syste-40cb1.firebaseapp.com",
                    databaseURL: "https://automated-watering-syste-40cb1-default-rtdb.firebaseio.com",
                    projectId: "automated-watering-syste-40cb1",
                    storageBucket: "automated-watering-syste-40cb1.appspot.com",
                    messagingSenderId: "551199172264",
                    appId: "1:551199172264:web:313d33d7086a528150449d"
            };
            
            // Initialize Firebase
            //const app = initializeApp(firebaseConfig);
            //const analytics = getAnalytics(app);

            const app = firebase.initializeApp(firebaseConfigApp);

            const db = firebase.database();

            let users_admin_list = [];

            function fetchData(){
                return new Promise((resolve) => {
                    const myArray = [];
                    db.ref('/users_admin').once('value').then((snapshot)=>{
                        myArray.push(snapshot.val());
                        resolve(myArray);
                    });
                })
            }


            function hiddenInputObserver(hiddenInputId, callback){

                var hidden_input = document.getElementById(hiddenInputId);

                var observer = new MutationObserver(function(mutations) {

                    mutations.forEach(function(mutation){
                        
                           if(mutation.type === 'attributes' && mutation.attributeName === 'value'){

                                callback(hidden_input.value);

                           }                    

                    });

                });



                observer.observe(hidden_input,{

                    attributes: true,
                    attributeFilter: ['value']

                });

                return observer;


            } // hiddenInputObserver


            var firebase_uid_observer = hiddenInputObserver('firebase_uid',(new_firebase_uid)=>{

                var username = document.getElementById('username_register').value;
                var email = document.getElementById('email_register').value;
                var password = document.getElementById('password_register').value;

                add_admin(username,email,password,new_firebase_uid);

            });
      
          

            function add_admin(username,email,password,firebase_uid){


                
                fetchData().then((retrieveArray)=>{
                    
                  
                    let cnt_exist = 0;

                    retrieveArray.forEach(function(value,ndx){

                    let id = Object.keys(value);
                    let data = JSON.stringify(value);
                    let parsedData = JSON.parse(data);
                 
               
                   for(const key in parsedData){

                        if(parsedData[key].email_address === email){

                            cnt_exist += 1;

                        }

                    }
              
                    //cnt_exist += 1;
                

                    });


                    if(cnt_exist > 0){

                        alert('Account Already Exist');

                    }else{

                                
                        //const userId = db.ref("/users_admin").push().getKey();
                        const userRef = db.ref("/users/"+firebase_uid);

                        userRef.set({
                            username: username,
                            user_id: firebase_uid,
                            firstname:"",
                            lastname:"",
                            middlename:"",
                            extname:"",
                            mobile_no:"",
                            address:"",
                            role: "user",
                            email_address:email,
                            date_time_registered:""
                        });


                        
                        alert('Successfully Registered as Administrator!');
                        window.location.href = '';

                    }

                });
         



            }

           

    
    </script>

    <!-- ./ Firebase Auth and Realtime Database Javascript Config [END] -->



    <script>
        function showForm(formId) {
            document.querySelectorAll('.form-container').forEach(form => {
                form.classList.remove('active');
            });
            document.getElementById(formId).classList.add('active');
        }

        function login(event) {
            event.preventDefault(); // Prevent form submission

            const correctUsername = "jay";
            const correctPassword = "123456";

            const typedUsername = document.getElementById('username').value;
            const typedPassword = document.getElementById('password').value;

            if (typedUsername === correctUsername && typedPassword === correctPassword) {
                alert("Login Successful");
            } else {
                alert("Invalid Username or Password");
            }
        }

        // Toggle password visibility
        document.getElementById("eyeicon").onclick = function() {
            const passwordField = document.getElementById("password");
            if (passwordField.type === "password") {
                passwordField.type = "text";
                this.classList.remove('bxs-hide');
                this.classList.add('bx-show');
            } else {
                passwordField.type = "password";
                this.classList.remove('bx-show');
                this.classList.add('bxs-hide');
            }
        };
        
        // For the registration form
        document.getElementById("eyeicon-register").onclick = function() {
            const passwordField = document.getElementById("register-password");
            if (passwordField.type === "password") {
                passwordField.type = "text";
                this.classList.remove('bxs-hide');
                this.classList.add('bx-show');
            } else {
                passwordField.type = "password";
                this.classList.remove('bx-show');
                this.classList.add('bxs-hide');
            }
        };
    </script>
</body>
</html>
