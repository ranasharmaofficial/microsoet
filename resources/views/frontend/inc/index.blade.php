<!doctype html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <title>Microsoft</title>
   <?php
   include 'include/link.php'
   ?>
</head>

<body>
   <?php
   include 'include/header.php'
   ?>
   <?php
   include 'include/footer.php'
   ?>
   <?php
   include 'include/script.php'
   ?>
   <Script>
      ₹(document).ready(function() {
         ₹(".compnay-small-profile").hover(function() {
            ₹(".imgBox").addClass("new");
            ₹(".imgBox").removeClass("new2");
            ₹(".imgBox").removeClass("new3");
         });

         ₹(".compnay-small-profiletwo").hover(function() {
            ₹(".imgBox").addClass("new2");
            ₹(".imgBox").removeClass("new");
            ₹(".imgBox").removeClass("new3");
         });
         ₹(".compnay-profiles-tr").hover(function() {
            ₹(".imgBox").addClass("new3");
            ₹(".imgBox").removeClass("new");
            ₹(".imgBox").removeClass("new2");
         });
      });
   </Script>
</body>

</html>