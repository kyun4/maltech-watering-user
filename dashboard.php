<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MALTech Dashboard</title>
    <link rel="stylesheet" href="style2.css">
<body>
    <div class="menu-bar">
        <button>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
            </svg>
        </button>
        <h1>Dashboard</h1>
    </div>
    <div class="container">
        <div class="sidebar">
            <a href="#" style="display: block; margin-bottom: 20px; font-size: 1.5em; color: #333; text-decoration: none;">MALTech</a>
            <button>Overview</button>
            <button>Data Analysis</button>
            <button>Add Schedule</button>
            <button>History</button>
            <button id = "signout">Log Out</button>
        </div>
    </div>



      


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

            import { getAuth, updatePassword,reauthenticateWithCredential, EmailAuthProvider, updateEmail,createUserWithEmailAndPassword, sendEmailVerification, signInWithEmailAndPassword, onAuthStateChanged, signOut } from "https://www.gstatic.com/firebasejs/9.13.0/firebase-auth.js";
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

            var logout = document.getElementById('signout');
            var user_id = '';

            const user = auth.currentUser;


            onAuthStateChanged(auth, (user) => {
            
                user ? user_id = user.uid : signout();

            });
        

            // auth.emailVerified ? user_id = user.uid : signout_user();


            logout.addEventListener('click',(e) => {

            signout_user();

            }); // logout event

            function signout_user(){

            const auth = getAuth();

            signOut(auth).then(() =>{
                
                window.location.href = 'index.php';
                
            }).catch((error) => {
                const errorCode = error.code;
                const errorMessage = error.message;
                alert(errorMessage);
            });    

            } // signout_user
            

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
         

                const app = firebase.initializeApp(firebaseConfigApp);
    
                const db = firebase.database();
            
                        


                function add_admin(username,email,password){

                    const userId = db.ref("/users_admin").push().getKey();
                    const userRef = db.ref("/users_admin/"+userId);

                    userRef.set({
                        username: username,
                        user_id:userId,
                        firstname:"",
                        lastname:"",
                        middlename:"",
                        extname:"",
                        mobile_no:"",
                        address:"",
                        email_address:email,
                        date_time_registered:""
                    });

                    alert('Successfully Registered as Administrator!');
                    window.location.href = '';
                }

            

        
        </script>

        <!-- ./ Firebase Auth and Realtime Database Javascript Config [END] -->


</body>
</html>
