<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
   
</head>
<body>
    
    <h1>RELOJ MUNDIAL</h1>
    <select name="relojMundial" id="relojMundial">
    <option value="0">...</option>
        @foreach($paisesReloj as $paisReloj)
        {
            <option value="{{ $paisReloj['zonaHora'] }}">{{ $paisReloj['pais'] }}</option>
        }
        @endforeach
    </select>
    {{$i=0}}
    @foreach($paisesReloj as $paisRelojs)
    {
        <p >La Hora en {{ $paisRelojs['pais'] }} es: <label for="" id="{{$i++}}"></label></p>
        
    }
    @endforeach
    
    <script>
        $(document).ready(function(){
            //var ajax;
            var interval = null;
            $("#relojMundial").change(function(){
                var value = $("#relojMundial").val();
                
                obtenerFecha(value);
                //setInterval(obtenerFecha(value), 1000);
                interval = setInterval(obtenerFecha(value), 1000);
                clearInterval(interval);
            });
            
            
            function obtenerFecha(value)
            {
                var value_ = value;
                var params = {
                  
                  "id": value_
              };
             
               $.ajax({
                 
                  url:'{{ route('obtengofecha') }}',
                  data:params,
                  dataType:'html',
                  
                  success: function(res){
                      
                       var zonaHor;
                       //var data;
                       //clearInterval(interval);
                       
                        zonaHor = value;
                        if(value == 'America/Argentina/Buenos_Aires'){
                          
                             $("#0").html(res);
                        }else if(value == 'America/Mexico_City'){
                            $("#1").html(res);
                        }else if(value == 'Europe/Madrid'){
                            $("#2").html(res);
                        }else if(value == 'Pacific/Auckland'){
                            $("#3").html(res);
                        }else{
                            $("#4").html(res);
                        }
                        setTimeout(function(){
                                obtenerFecha(value); 
                        
                             }, 1000);
                        
                      
                  }
              });
            }
           
            
            
            //setInterval(ajax, 1000);
            
        }); 
    </script>
</body>
</html>