<!-- Traemos la estructura del Layout -->
@extends ('layouts.estructura')

@section('include-header')
<!--usa la libreria flickity para el carrousel-->
<link rel="stylesheet" href="{{asset('librerias/flickity/flickity.min.css')}}">
<link rel="stylesheet" href="{{asset('css/index.css')}}">
<link rel="stylesheet" href="{{asset('css/carrousells.css')}}">
@endsection

<!-- se inserta el titulo -->
@section('title', 'resultado')


<!-- SECCION RESULTADOS -->
@section('contenido')

<!-- CONTENIDO -->
<div class="container-fluid">
    <div class="row m-0">
        <!-- TITULO -->
        <div class="text-center text-white">
            <h1>Poomsae Individual-Promocional</h1>
        </div>
        <!-- CARROUSEL DE IMAGENES -->
        <div class="carousel bg-dark mb-2" data-flickity='{ "groupCells": true, "wrapAround": true}'>
            <div class="carousel-cell">
                <div onclick="mostrar(1)" role="button" class="link-underline-dark">
                    <img src="img/Carrousel/Hombre/InfantilesA.jpg" alt="" class="img-fluid">
                    <p class="text-center text-light">Hombre</p>
                </div>
            </div>
            <div class="carousel-cell">
                <div onclick="mostrar(2)" role="button" class="link-underline-dark">
                    <img src="img/Carrousel/Hombre/InfantilesB.jpg" alt="" class="img-fluid">
                    <p class="text-center text-light">Hombre</p>
                </div>
            </div>
            <div class="carousel-cell">
                <div onclick="mostrar(3)" role="button" class="link-underline-dark">
                    <img src="img/Carrousel/Hombre/Cadete.jpg" alt="" class="img-fluid">
                    <p class="text-center text-light">Hombre</p>
                </div>
            </div>
            <div class="carousel-cell">
                <div onclick="mostrar(4)" role="button" class="link-underline-dark">
                    <img src="img/Carrousel/Hombre/Juveniles.jpg" alt="" class="img-fluid">
                    <p class="text-center text-light">Hombre</p>
                </div>
            </div>
            <div class="carousel-cell">
                <div onclick="mostrar(5)" role="button" class="link-underline-dark">
                    <img src="img/Carrousel/Hombre/Senior1.jpg" alt="" class="img-fluid">
                    <p class="text-center text-light">Hombre</p>
                </div>
            </div>
            <div class="carousel-cell">
                <div onclick="mostrar(6)" role="button" class="link-underline-dark">
                    <img src="img/Carrousel/Hombre/Senior2.jpg" alt="" class="img-fluid">
                    <p class="text-center text-light">Hombre</p>
                </div>
            </div>
            <div class="carousel-cell">
                <div onclick="mostrar(7)" role="button" class="link-underline-dark">
                    <img src="img/Carrousel/Hombre/Master1.jpg" alt="" class="img-fluid">
                    <p class="text-center text-light">Hombre</p>
                </div>
            </div>
            <div class="carousel-cell">
                <div onclick="mostrar(8)" role="button" class="link-underline-dark">
                    <img src="img/Carrousel/Hombre/Master2.jpg" alt="" class="img-fluid">
                    <p class="text-center text-light">Hombre</p>
                </div>
            </div>
            <div class="carousel-cell">
                <div onclick="mostrar(9)" role="button" class="link-underline-dark">
                    <img src="img/Carrousel/Mujer/InfantilesA.jpg" alt="" class="img-fluid">
                    <p class="text-center text-light">Mujer</p>
                </div>
            </div>
            <div class="carousel-cell">
                <div onclick="mostrar(10)" role="button" class="link-underline-dark">
                    <img src="img/Carrousel/Mujer/InfantilesB.jpg" alt="" class="img-fluid">
                    <p class="text-center text-light">Mujer</p>
                </div>
            </div>
            <div class="carousel-cell">
                <div onclick="mostrar(11)" role="button" class="link-underline-dark">
                    <img src="img/Carrousel/Mujer/Cadete.jpg" alt="" class="img-fluid">
                    <p class="text-center text-light">Mujer</p>
                </div>
            </div>
            <div class="carousel-cell">
                <div onclick="mostrar(12)" role="button" class="link-underline-dark">
                    <img src="img/Carrousel/Mujer/Juveniles.jpg" alt="" class="img-fluid">
                    <p class="text-center text-light">Mujer</p>
                </div>
            </div>
            <div class="carousel-cell">
                <div onclick="mostrar(13)" role="button" class="link-underline-dark">
                    <img src="img/Carrousel/Mujer/Senior1.jpg" alt="" class="img-fluid">
                    <p class="text-center text-light">Mujer</p>
                </div>
            </div>
            <div class="carousel-cell">
                <div onclick="mostrar(14)" role="button" class="link-underline-dark">
                    <img src="img/Carrousel/Mujer/Senior2.jpg" alt="" class="img-fluid">
                    <p class="text-center text-light">Mujer</p>
                </div>
            </div>
            <div class="carousel-cell">
                <div onclick="mostrar(15)" role="button" class="link-underline-dark">
                    <img src="img/Carrousel/Mujer/Master1.jpg" alt="" class="img-fluid">
                    <p class="text-center text-light">Mujer</p>
                </div>
            </div>
            <div class="carousel-cell">
                <div onclick="mostrar(16)" role="button" class="link-underline-dark">
                    <img src="img/Carrousel/Mujer/Master2.jpg" alt="" class="img-fluid">
                    <p class="text-center text-light">Mujer</p>
                </div>
            </div>
        </div>
    </div>
    <!-- DIV COLLAPSE -->
    <div class="collapse" id="collapseExample">
        <!-- ROW 1 -->
        <div class="row mt-5 justify-content-evenly">
            <!-- CUADRADO 1 INFO -->
            <div id="cuadradoUno" class="col-xxl-6 col-lg-8 col-md-10 col-sm-12 bg-light rounded-3 m-2 p-2">
                <h1 class="text-center bg-warning rounded"></h1>
                <p class="mb-2"></p>
                <ul data-bs-theme="dark" class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="section1-tab" data-bs-toggle="tab" data-bs-target="#section1-tab-pane" type="button" role="tab" aria-controls="section1-tab-pane" aria-selected="true">Poomsaes
                            Obligatorios</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="section2-tab" data-bs-toggle="tab" data-bs-target="#section2-tab-pane" type="button" role="tab" aria-controls="section2-tab-pane" aria-selected="false">Metodo Competicion</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="section3-tab" data-bs-toggle="tab" data-bs-target="#section3-tab-pane" type="button" role="tab" aria-controls="section3-tab-pane" aria-selected="false">Sorteo Pumses</button>
                    </li>
                </ul>
                <div class="tab-content container" id="miTabla">
                    <div class="tab-pane fade show active" id="section1-tab-pane" role="tabpanel" aria-labelledby="section1-tab" tabindex="0">
                        <div class="container">
                            <p id="parrafo_primera_tab">

                            </p>
                            <ul id="tabla_primera_tab" class="list-group">

                            </ul>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="section2-tab-pane" role="tabpanel" aria-labelledby="section2-tab" tabindex="0">
                        <div class="container">
                            <p id="parrafo_segunda_tab">

                            </p>
                            <ul id="tabla_segunda_tab" class="list-group">

                            </ul>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="section3-tab-pane" role="tabpanel" aria-labelledby="section3-tab" tabindex="0">
                        <div class="container">
                            <p id="parrafo_tercera_tab">

                            </p>
                            <ul id="tabla_tercera_tab" class="list-group">

                            </ul>
                        </div>
                    </div>

                </div>
                </p>
            </div>
            <!-- CUADRADO 2 IMAGEN -->
            <div id="img_container" class="col-xxl-5 col-lg-8 col-md-10 col-sm-12 m-2 p-0 align-self-center">
                <img id="imgCuadradoDos" class="img-fluid rounded-3" src="" alt="">
            </div>
        </div>
        <!-- ROW 2 -->
        <div class="row justify-content-evenly">
            <!-- CUADRADO 3 TABLA -->
            <div class="col-lg-6 col-md-10 col-sm-12 bg-light rounded-3 m-2 pb-3">
                <div class="m-2">
                    <button class="btn btn-outline btn-primary" id="download-csv">
                        <i class="bi bi-arrow-bar-down"></i>
                        CSV</button>
                    <button class="btn btn-outline btn-primary" id="download-xlsx">
                        <i class="bi bi-arrow-bar-down"></i>
                        XLSX</button>
                    <button class="btn btn-outline btn-primary" id="download-pdf">
                        <i class="bi bi-arrow-bar-down"></i>
                        PDF</button>
                </div>
                <div id="example-table" class=""></div>
            </div>
            <!-- CUADRADO 4 PARRAFO EXPLICATIVO -->
            <div class="col-lg-5 col-md-10 col-sm-12 rounded-3 p-0 m-2" id="descripcionGanador">

            </div>
        </div>
    </div>

@endsection

@section('includes-foot')

<script src="{{asset('js/home/index.js')}}"></script>
<script src="{{asset('js/home/datos.js')}}"></script>
<script src="{{asset('js/home/tabla.js')}}"></script>
<script src="{{asset('librerias/flickity/flickity.pkgd.min.js')}}"></script>

@endsection