<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>About</title>
        <link rel="stylesheet" type="text/css" href="style/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script>           
            $(document).ready(function(){            
                $('#signup-form').on('submit', function(){
                     var form_data = $(this).serialize();                                      
                     $.ajax({
                         url: "signup.php",
                         method: "POST",
                         data: form_data,
                         dataType: "html",
                         success: function(data){
                            $('.success').html(data);
                            $('#signup-form')[0].reset();                           
                         }
                     });
                      return false;
                });
            });           
        </script>
    </head>
    <body>
        <div id="signup">
        <h2>Rejestracja</h2>
        <form method="POST" id="signup-form" >
            <p>
               <label>Imię:</label><br>
               <input type="text" placeholder="Podaj swoje imię" name="first_name" required/>
            </p>
            <p>
               <label>Nazwisko:</label><br>
               <input type="text" placeholder="Podaj swój nazwisko" name="last_name" required/>
            </p>
            <p>
               <label>E-mail:</label><br>
               <input type="email" placeholder="Podaj swój email" name="email" required/>
            </p>
            <p>
               <label>Login:</label><br>
               <input type="text" placeholder="Login" name="username" required/>
            </p>
            <p>
               <label>Hasło:</label><br>
               <input type="password" placeholder="Hasło" name="password" required/>
            </p>
            <p>
                <button type="submit" name="submit" class="btn-submit">Zajejestruj</button>
            </p>
        </form>
        </div>
        <div class="success"></div>
    </body>
</html>



