<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>AAA</title>
   @vite('resources/css/app.css')
</head>

<body>
   @vite('resources/js/app.js')
   <script>
      document.addEventListener("DOMContentLoaded", function(event) {
         Echo.channel(`hello-channel`).listen('HelloEvent', (e) => {
            console.log("Event from Hello [welcome.blade.php]");
            console.log(e);
         })
      });
   </script>
</body>

</html>
