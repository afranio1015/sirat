<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/style.css" />
</head>
<body>
    <div class="container">
        <div class="sidebar">
           <div class="logo"> <img src="/assets/images/logoPGDF.png" /></div>
        </div>
        <div class="content">
            <nav>
               
            </nav>

            <main>
                <section id="login_section">        
                    @if($errors->any()) 
                        <ul class="alert alert-error">
                            @foreach ($errors->all() as $error)
                            <li>{{$error}}                    
                            @endforeach
                        </ul>      
                    @endif
                    <fieldset> <legend>Acessar</legend>
                    <form method="POST" action="{{route('user.login_action')}}">
                        @csrf  
                                 
                        <x-form.text_input                 
                            name="login" 
                            label="Login"
                            placeholder="informe seu login"
                        />
                        <x-form.text_input 
                            type="password"
                            name="password" 
                            label="Sua senha"
                            placeholder="Sua senha"
                        />          
            
                        <x-form.form_button resetTxt="Limpar" submitTxt="Login" />       
                    
                    </form>
                    </fieldset>
                    {{-- <span class="alert label">{{$aviso}}</span> --}}
                </section>                                  
            </main>

        </div>

    </div>    
</body>
</html>