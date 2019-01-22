
<html>
    <head>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" >
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="script.js"></script> 
    <style>
    .form-container 
    {
        margin: 10px 100px;
    }
    .container 
    {
        position: absolute !important;
        margin-top: 40px;
        /* margin-left: 100px; */
    }
    .soup 
    {
        color: black;
    }
    .dish 
    {
       margin-left: 5px;
        color: black;
    }
    .salad 
    {
        
        margin-left: 47px;
        color: black;
    }
    .desert 
    {
        
        margin-left: 45px;
        color: black;
    }
    #btnSubmit
    {
        margin-left: 100px;
    }
    span {
        margin:5px 15px;
        padding: 0 30px;
        color: red;
        border: 1px dashed red;
    }
    body {
        background: #ccf;
    }
    </style>
    </head>
    <body>
    
        <form name=foodForm class="form-container" id=food method=POST action="order-food.php">
            <label class="soup">Supe i corbe:</label><select name=supa id=soup></select><span id=msgsoup></span><br>
            <label class="dish">Glavno Jelo:</label><select name=gjelo id=dish></select><span id=msgdish></span>
            <label class="grams">Grams:</label>
            <select name=grams id=dishGrams>
                <option value=200>200</option>
                <option value=400>400</option>
                <option value=500>500</option>
                <option value=1000>1000</option>
            </select><span id=msgcena></span><br>          
            <label class="salad">Salata:</label><select name=salata id=salad></select><span id=msgsalad></span><br>
            <label class="desert">Dezert:</label><select name=desert id=desert></select><span id=msgdesert></span><br>
            
            <input type="hidden" name=jelovnik >
            <input type=submit id=btnSubmit name=submit value=Porucite>
         </form> 

         <div class="container-info" id=info >
            Izabarali ste:
            <p id=psoup name=supa></p>
            <p id=pdish name=gjelo></p>
            <p id=psalad name=salata></p>
            <p id=pdesert name=desert></p>
        </div>

        <script>
            $(document).ready(function(){
                
               $('input[name=jelovnik]').val(JSON.stringify(jelovnik));

                for(let i=0; i<jelovnik.supa.length; i++) {
                    $('#soup').append('<option value='+i+'>'+jelovnik.supa[i].name+'</option>');
                }
                for(let i = 0; i < jelovnik.jelo.length; i++) 
                {
                    $('#dish').append('<option  value='+i+'>' + jelovnik.jelo[i].name+'</option>');
                }
                for(let i = 0; i < jelovnik.salata.length; i++) 
                {
                    $('#salad').append('<option value='+i+'>'+jelovnik.salata[i].name+'</option>');
                }
                for(let i = 0; i < jelovnik.desert.length; i++) 
                {
                    $('#desert').append('<option value='+i+'>'+jelovnik.desert[i].name+'</option>');
                }
            });

            $('#soup').on('change', function(){
                $('#psoup').html(jelovnik.supa[this.value].name); 
                $('#msgsoup').html(jelovnik.supa[this.value].price)
            });
            $('#dish').on('change', function(){
                $('#pdish').html(jelovnik.jelo[this.value].name); 
                $('#msgdish').html(jelovnik.jelo[this.value].price);
                $('#msgdish').attr('value', jelovnik.jelo[this.value].price);
                $('#msgcena').html(jelovnik.jelo[this.value].price*$('#dishGrams').val()/1000);
            });
            $('#salad').on('change', function(){
                $('#psalad').html(jelovnik.salata[this.value].name); 
                $('#msgsalad').html(jelovnik.salata[this.value].price);
            });
            $('#desert').on('change', function(){
                $('#pdesert').html(jelovnik.desert[this.value].name); 
                $('#msgdesert').html(jelovnik.desert[this.value].price);
            });
            $('#dishGrams').on('change', function(){
                // $('#pdesert').html(jelovnik.desert[this.value].name);
                //alert($('#msgdish').val());
                var cena = $('#msgdish').attr('value') * this.value / 1000; 
                //alert(cena);
                $('#msgcena').html(cena);
            });
        
        </script>
    </body>
</html>