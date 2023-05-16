<!doctype html>
<html lang="en">

<head>
   <title>Title</title>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <!-- Bootstrap CSS v5.2.1 -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
   <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
</head>

<body>

   <main>
      <div class="container">
         <div class="jumbotron">
            <div class="container text-center">
               <p>Phone Number Authentication using Firebase In Laravel 8</p>
            </div>
         </div>

         <div class="alert alert-danger" id="error" style="display: none;"></div>
         <div class="card">
            <div class="card-header">
               Enter Phone Number
            </div>
            <div class="card-body">
               <div class="alert alert-success" id="sentSuccess" style="display: none;"></div>
               <form>
                  <label>Phone Number:</label>
                  <input type="text" id="number" class="form-control" placeholder="+91********">
                  <div id="recaptcha-container"></div>
                  <button type="button" class="btn btn-success" onclick="phoneSendAuth();">SendCode</button>
               </form>
            </div>
         </div>
         <div class="card" style="margin-top: 10px">
            <div class="card-header">
               Enter Verification code
            </div>
            <div class="card-body">
               <div class="alert alert-success" id="successRegsiter" style="display: none;"></div>
               <form>
                  <input type="text" id="verificationCode" class="form-control" placeholder="Enter verification code">
                  <button type="button" class="btn btn-success" onclick="codeverify();">Verify code</button>
               </form>
            </div>
         </div>
      </div>
   </main>

   <script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>
   {{-- <script type="module">
      // Import the functions you need from the SDKs you need
      import { initializeApp } from "https://www.gstatic.com/firebasejs/9.22.0/firebase-app.js";
      import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.22.0/firebase-analytics.js";
      // TODO: Add SDKs for Firebase products that you want to use
      // https://firebase.google.com/docs/web/setup#available-libraries
    
      // Your web app's Firebase configuration
      // For Firebase JS SDK v7.20.0 and later, measurementId is optional
      const firebaseConfig = {
        apiKey: "AIzaSyBNs6nBllqFftIgjaqF6nA0Fh-zTZsHzs0",
        authDomain: "test-laravel-otp-aff6c.firebaseapp.com",
        projectId: "test-laravel-otp-aff6c",
        storageBucket: "test-laravel-otp-aff6c.appspot.com",
        messagingSenderId: "368753457402",
        appId: "1:368753457402:web:06ce453154d17450f57143",
        measurementId: "G-353QPVP2M0"
      };
    
      // Initialize Firebase
      const app = initializeApp(firebaseConfig);
      const analytics = getAnalytics(app);
    </script> --}}
   <script>
      // var firebaseConfig = {
      //   apiKey: "AIzaSyCg-NbICvCrdlzpPuRGtfFpPKKBxkXqQfE",
      //   authDomain: "test-e434b.firebaseapp.com",
      //   databaseURL: "https://test-e434b.firebaseapp.com",
      //   projectId: "test-e434b",
      //   storageBucket: "test-e434b.appspot.com",
      //   messagingSenderId: "108177260",
      //   appId: "1:1081772606944:web:9817e1803948b1699d1785",
      //   measurementId: "p266654231222"
      // };
      var firebaseConfig = {
        apiKey: "AIzaSyBNs6nBllqFftIgjaqF6nA0Fh-zTZsHzs0",
        authDomain: "test-laravel-otp-aff6c.firebaseapp.com",
        databaseURL: "https://test-e434b.firebaseapp.com",
        projectId: "test-laravel-otp-aff6c",
        storageBucket: "test-laravel-otp-aff6c.appspot.com",
        messagingSenderId: "368753457402",
        appId: "1:368753457402:web:06ce453154d17450f57143",
        measurementId: "G-353QPVP2M0"
      };
        
      firebase.initializeApp(firebaseConfig);
   </script>
   <script type="text/javascript">
      window.onload=function () {
        render();
      };
      
      function render() {
          window.recaptchaVerifier=new firebase.auth.RecaptchaVerifier('recaptcha-container');
          recaptchaVerifier.render();
      }
      
      function phoneSendAuth() {
             
          var number = $("#number").val();
            
          firebase.auth().signInWithPhoneNumber(number,window.recaptchaVerifier).then(function (confirmationResult) {
                
              window.confirmationResult=confirmationResult;
              coderesult=confirmationResult;
              console.log(coderesult);
      
              $("#sentSuccess").text("Message Sent Successfully.");
              $("#sentSuccess").show();
                
          }).catch(function (error) {
              $("#error").text(error.message);
              $("#error").show();
          });
      
      }
      
      function codeverify() {
      
          var code = $("#verificationCode").val();
      
          coderesult.confirm(code).then(function (result) {
              var user=result.user;
              
              $("#successRegsiter").text("you are register Successfully.");
              $("#successRegsiter").show();
      
          }).catch(function (error) {
              $("#error").text(error.message);
              $("#error").show();
          });
      }
   </script>
</body>

</html>
