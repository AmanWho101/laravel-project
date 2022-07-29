<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900$display=swap" rel="stylesheet" type="text/css">

        <!-- Styles -->
       <link rel="stylesheet" href="style.css">
       <style>
           @import url("https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900$display=swap");
    * {
         margin: 0;
         padding: 0;
         box-sizing: border-box;
         font-family: 'Poppins', sans-serif;
     }
     body{
         display: flex;
         justify-content: center;
         align-items: center;
         min-height: 100vh;
         background: #2f363e;
     }
     #time{
         display: flex;
         gap: 40px;
         color: rgb(255, 255, 255);
     }
     #time .circle{
         position: relative;
         width: 150px;
         height: 150px;
         display: flex;
         justify-content: center;
         align-items: center;
     }
     #time div{
         position: absolute;
         text-align: center;
         font-weight: 500;
         font-size: 1.5em;
     }
    #time .ap{
         position: relative;
         font-size: 1em;
         transform: translateX(-20px);
     }
     #time .circle svg{
         position: relative;
         width: 150px;
         height: 150px;
         transform: rotate(270deg)
     }
     #time .circle svg circle{
         
         width: 100%;
         height: 100%;
         fill: transparent;
         stroke: #191919;
         stroke-width: 4;
         transform: translate(5px,5px);
     }
     #time .circle svg circle:nth-child(2){
         stroke: var(--clr);
         stroke-dasharray: 440;
     }
    #time div span{
        position: absolute;
        transform: translateX(-50%) translateY(-10%);
        font-size: 0.35em;
        font-weight: 300;
        letter-spacing: 0.1em;
        text-transform: uppercase;
    }
     .dots {
        position: absolute;
        width: 100%;
        height: 100%;
        z-index: 10;
        display: flex;
        justify-content: center;
     }
     .dots::before{
        content: '';
        position: absolute;
        top: -3px;
        width: 15px;
        height: 15px;
        background: var(--clr);
        border-radius: 50%;
        box-shadow: 0 0 20px var(--clr),
        0 0 60px var(--clr);
     }

     .links > a {
         color: #ffffff;
         padding: 0 25px;
         font-size: 12px;
         font-weight: 600;
         letter-spacing: .1rem;
         text-decoration: none;
         text-transform: uppercase;
     }

     .m-b-md {
         margin-bottom: 30px;
     }
 
       </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    <div id="time">
                        <div class="circle" style="--clr:#0aff01;">
                            <div class="dots hr_dot"></div>
                            <svg>
                                <circle cx="70" cy="70" r="70"></circle>
                                <circle cx="70" cy="70" r="70" id="hh"></circle>
        
                            </svg>
                            <div id="hours">
                                00
                            </div>
                        </div>
                        
                        <div class="circle" style="--clr:#ffff01;">
                            <div class="dots min_dot"></div>
                            <svg>
                                <circle cx="70" cy="70" r="70"></circle>
                                <circle cx="70" cy="70" r="70" id="mm"></circle>
        
                            </svg>
                            <div id="minutes">
                                00
                            </div>
                        </div>
                        
                        <div class="circle" style="--clr:#ff0101;">
                            <div class="dots ss_dot"></div>
                            <svg>
                                <circle cx="70" cy="70" r="70"></circle>
                                <circle cx="70" cy="70" r="70" id="ss"></circle>
        
                            </svg>
                            <div id="seconds">
                                00
                            </div> 
                        </div>
                        
                        <div class="ap">
                            <div id="ampm">
                                AM
                            </div>
                        </div>
                                
                </div>
                </div>
                <div class="containor">
                   
                 
                </div>

                <script>
                    setInterval(() => {
                    let hours =document.getElementById('hours');
                    let minutes =document.getElementById('minutes');
                    let seconds =document.getElementById('seconds');
                    let ampm =document.getElementById('ampm');
                    
                    let h = new Date().getHours();
                    let m = new Date().getMinutes();
                    let s = new Date().getSeconds();
                    let am = h >=12 ? "PM" : "AM";
                    if (h > 12){
                        h = h - 12;
                    }

                    h = (h <10)?"0" + h : h;
                    m = (m <10)?"0" + m : m;
                    s  = (s <10)?"0" + s : s;

                    hours.innerHTML = h + '<br><span>hours</span>';
                    minutes.innerHTML = m  + '<br><span>minutes</span>';
                    seconds.innerHTML = s  + '<br><span>seconds</span>';
                    ampm.innerHTML = am;

                    let hh = document.getElementById('hh');
                    let mm = document.getElementById('mm');
                    let ss = document.getElementById('ss');

                    hh.style.strokeDashoffset = 440 - (440 * h) / 12;
                    // 12 hrs clock 
                    mm.style.strokeDashoffset =  440 - (440 * m) / 60;
                    // 60 mm clock
                    ss.style.strokeDashoffset =  440 - (440 * s) / 60;
                    // 60 ss clock
                    let hr_dot = document.querySelector('.hr_dot');
                    let min_dot = document.querySelector('.min_dot');
                    let ss_dot = document.querySelector('.ss_dot');

                    hr_dot.style.transform = `rotate(${h * 30}deg)`;
                    //360/12
                    min_dot.style.transform = `rotate(${m * 6}deg)`;
                    //360/60
                    ss_dot.style.transform = `rotate(${s * 6}deg)`;
                    //360/60
                });
                   
                    
                </script>

                <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
           
               
                    
              
        </div>
       
            
            
    </body>
</html>
