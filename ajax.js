

 $(document).ready(function(){


    $('#buttonlogin').click( function()
    {
        
      $.ajax({
        method: "POST",
        url: "login.php",
        
        success: funcResult
      })
          $('#buttonlogin').hide();
          return false; 
        
    })

    $('#buttonreg').click( function()
    {
        
      $.ajax({
        method: "POST",
        url: "reg.php",
        
        success: funcResult
      })
          $('#buttonreg').hide();
          return false; 
        
    })
    $('#logout').click( function()
    {
        
      $.ajax({
        method: "POST",
        url: "logout.php",
        
        success: funcResult
      })
          $('#logout').hide();
          return false; 
        
    })
    
    $("#formlogin").submit ( function()
    {   var formlogin = {"login": $('#login').val(), "password": $('#password').val(), "id": Math.random()};
       
        var jsonlogin = JSON.stringify(formlogin);
        
        $.ajax({
            method: "POST",
            url: "login.php",
            data: {jsonlogin},
            success: funcResult
          })
          $('#formlogin').hide();
          return false;
            

    }) 

    //Проверка паролей
    $("#confirm_password").on("keyup", function() { 
      if($('#password').val() !=$('#confirm_password').val())
        {
          $("#confirm_password").attr("style", "background-color:red;"); 
          $("#regbutton").attr("disabled", "disabled");
        }
        else{
              $("#regbutton").removeAttr("disabled");
              $("#confirm_password").attr("style", "background-color:green;");
            } 
      });
      $("#password").on("keyup", function() { 
        if($('#password').val() !=$('#confirm_password').val())
          {
            $("#confirm_password").attr("style", "background-color:red;"); 
            $("#regbutton").attr("disabled", "disabled");
          }
          else{
                $("#regbutton").removeAttr("disabled");
                $("#confirm_password").attr("style", "background-color:green;");
              } 
        });
        //Отправка формы регисттрации
    $("#formreg").submit ( function()
    {
      var formreg = {"login": $('#login').val(),
                     "password": $('#password').val(),
                     "confirm_password": $('#confirm_password').val(),
                     "name": $('#name').val(),
                     "email": $('#email').val(),
                     "id": Math.random()};
      
      var jsonreg = JSON.stringify(formreg);
      
      $.ajax({
            method: "POST",
            url: "reg.php",
            data: {jsonreg},
            success: funcResult
          })
          $('#formreg').hide();
          return false;
          
           

    }) 
  function funcResult (data){$("#result").html(data)}
    
       
    
  })


