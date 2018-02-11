<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <title>About</title>
        <link rel="stylesheet" type="text/css" href="style/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>       
        <script>
            $(document).ready(function(){
                $('.about').on('click', function(e){
                   e.preventDefault();
                     $('#main').load("about.html");                      
                });
                
                $('.contact').on('click', function(e){
                    e.preventDefault();                
                       $('#main').load("contact.html");
                });
                
                $('.loginForm').on('submit', function(e){
                   e.preventDefault();      
                    var form_data = $(this).serialize();
                     $.ajax({
                       url: "login.php",
                       method: "POST",
                       data: form_data,
                       dataType: "html",
                       success: function(data){
                            $('.status').html(data); 
                            if(data == "Jesteś zalogowany"){ 
                                window.location = "index.php";
                          }                         
                       }                     
                   });                     
                });                                
            });
        </script>
    </head>   
    <body>
        <div class="container">
            <header id="header"></header>
            <nav id="menu">
                <div class="login">                   
                    <?php 
                    if (isset($_SESSION['id'])){
                       
                        echo "<form action='logout.php' method='POST' >   
                              <label>Jesteś zalogowany jako </label>". $_SESSION['username']."
                              <button type='submit' name='submit'>Wyloguj</button>
                              </form>";
                            
                    }else{
                        
                        echo "<form action='login.php' method='POST' class='loginForm'>
                              <input type='text' name='username' placeholder='Nazwa użytkownika/E-mail'>
                              <input type='password' name='password' placeholder='Hasło'>
                              <button type='submit' name='submit' class='log-btn'>Zaloguj</button>
                              </form>";                      
                    }            
                ?>
                     
                </div>
                <span class="status"></span>
                <a href="index.php" class="home">Strona główna</a>
                <div class="dropdown">
                    <button class="dropbtn">Menu</button>
                    <div class="dropdown-content">
                        <a href="about.html" class="about">O mnie</a>
                        <a href="contact.html" class="contact">Kontakt</a>   
                    </div>
                </div>
            </nav>
            
            <div id="image">
                <img src="images/reverse.jpg" class="image"/>
            <div id="sidebar">                
                <p>               
                   <a href= "http://github.com/tweeds89"><img src="images/git.png" class="git"/></a>
                </p>
                <p>
                   <a href= "http://linkedin.com/in/pawel-palinski/"><img src="images/linkedin.png" class="linkedin"/></a>   
                </p>
            </div>       
            <div id="main">
              <p>
                <h1>Witaj na mojej stronie</h1>
              </p>
              <p class="article">
                  <b> Mam na imię Paweł i znajdziesz tutaj kilka informacji o mnie<br>
                      i o technologiach, które do tej pory poznałem.</b>
              </p>         
            </div>       
            <div class="technologies">
                <h2>Poznane technologie</h2>
                <p>
                 <img src="images/php.png" class="php"/>  
                 <img src="images/sql.png" class="sql"/> 
                 <img src="images/jquery.png" class="jquery"/> 
                 <img src="images/ajax.png" class="ajax"/> 
                 <img src="images/html.png" class="html"/> 
                 <img src="images/css.png" class="css"/> 
                </p>               
            </div>
            <footer>
                <span>&copy;Paweł Paliński</span>
            </footer>
            </div>   
        </div>
    </body>
</html>