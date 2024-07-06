
<div class="container">
        <div class="container-login">
        
      <h1 class="title"><i class="fa fa-user-circle-o" aria-hidden="true"></i>LOGIN</h1>
            
            <div class="row box-input">
                <form  method="post">
                    <input class="dats" type="text" name="ingUsuario" required placeholder="Usuario">
                    <br>
                    <input class="dats" type="password" name="ingPassword" placeholder="Contraseña">
                    <br>
                    <input type="submit"  value="Ingresar" class="ingresar">
                    <?php

                      $login = new ControladorUsuarios();
                      $login -> ctrIngresoUsuario();
                      
                    ?>
                    
                </form>
            </div>
        </div>
    
</div>




<style type="text/css">
  body{
    margin: 0;
    padding: 0;
    border: 0;
    height: 80vh;
    background-image:url(vistas/modulos/inicio/ggg.jpg) ;
    font-size:12px;
}
  .log{
    width: 25%;
    
}
.container{
    width: 450px;
    margin-top: 8rem;
    background-image:url(inicio/ggg.jpg) ;
    width: 100%;
  
}
.container-login{
    background: rgba(0, 0, 0, 0.352);
    padding: 20px;
    padding: 2rem;
    box-shadow:-5px 9px 9px black;
    border-radius: 15px;
}
img{
    display: block;
    margin-left: auto;
    margin-right: auto;  
}
.title{
    color: white;
    letter-spacing: 0.45em;
    text-align: center;
    padding: 30px;
    font-size:3rem;
}
.box-input{
    text-align: center;
    display: contents;
}

.box-input input{
    width: 15rem;
    height: 2.5rem;
    margin: 1rem;
}
.ingresar{
    background: #137ee3;
    border: none;
    border-radius: 20px;
    color: white;
    font-size: 1rem;
    height: 80px;
}
.ingresar:hover{
    background: rgb(96, 121, 190);
    color: black;
    border-radius: 1rem;
    border:none;
}
.dats{
    font-style: italic;
    color: rgb(255, 255, 255);
    font-size: 1.8rem;
    background: transparent;
    border:none;
    border-bottom:3px solid #137ee3;
}
.dats::placeholder{
    color: aliceblue;
}
.dats:focus{
    border-color: aliceblue;
    border: none;
}

input:focus, select:focus, select, input.form-control:focus {

    outline:none !important;

    outline-width: 0 !important;

    box-shadow: 0 1px 1px rgba(237, 140, 80, 0.075)inset, 0 0 8px rgba(255,144,0,0.6);;

    -moz-box-shadow: none;

    -webkit-box-shadow: none;
    border-bottom: 3px solid #137ee3;

}
</style>
