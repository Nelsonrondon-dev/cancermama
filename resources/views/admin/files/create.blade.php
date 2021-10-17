@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css" integrity="sha512-3g+prZHHfmnvE1HBLwUnVuunaPOob7dpksI7/v6UnF/rnKGwHf/GdEq9K7iEN7qTtW+S0iivTcGpeTBqqB04wA==" crossorigin="anonymous" />
@endsection

@section('content')

    <div class="" style="background: #ffafdc;padding-right: 1rem !important;" >
        <div class="row">
            <img src="{{asset('img/banner.png')}}" alt="" style="width: 70vw;background: #ffafdc;">
        </div>
        <div class="row justify-content-center" style="position: relative;top: 2vw;">
        
        <img src="{{asset('img/icono.png')}}" alt="" style="width: 4vw; ">

        </div>
    </div>

    <div class="container mt-5">


      

        <div class="row mt-5">
            <div class="col-12">
                <h1 style="text-align: center; color: rgb(255, 175, 220);font-weight: bold;">Efecto de Fotos</h1>
                <form  action="{{route('admin.files.store')}}"
                    method="POST"
                    class="dropzone mt-5 mb-5"
                    id="my-awesome-dropzone">
                </form>

            </div>
        </div>

        <div class="row">

                <div class="col-12">
                    <h2 style="text-align: center; color: rgb(255, 175, 220); font-weight: 900;font-size: 2.25rem;">Descarga tu foto aquí</h2>
                </div>

                <div id="nuevo" class="row row-cols-1 row-cols-md-3 m-3">

                <div id="muestra-1" class="col mb-4">

                  <div class="card">
                    <img src="{{asset('img/tipo-1.jpg')}}" class="card-img-top" alt="...">
                  </div>

                </div>

                <div class="col mb-4" id="muestra-2">

                  <div   class="card">
                    <img src="{{asset('img/tipo-2.jpg')}}" class="card-img-top" alt="...">
                  </div>

                </div>
             

              </div>


        </div>

    </div>


    <div class="container-fluid-sm"  >

        <div class="row justify-content-center" style="position: relative;top: 2vw;">
            <img src="{{asset('img/icono2.png')}}" alt="" style="width: 4vw; ">
        </div>

        <div class="row">
            <img src="{{asset('img/banner2.png')}}" alt="" style="width: 102vw;background: #ffafdc;">
        </div>

        <div class="row justify-content-center mb-5 mr-2 ml-2" >
            <img src="{{asset('img/logo-empresa.jpg')}}" alt="" style="width: 15vw;background: #ffafdc;"><br>

            <div class="col-12" style="text-align: center;">
                <div>BD Logo es una marca registrada de Becton, Dickinson and Company. El uso de este marco es responsabilidad de quien voluntariamente lo aplique.</div>
                
                <div style="font-weight: bold;">© 2021  BD. Todos los derechos reservados. A menos que se especique lo contrario, BD, el Logo BD y todas las demás marcas comerciales son propiedad de<br>
                    Becton Dickinson &amp; Company.
                </div>
            </div>
           
        </div>

    </div>
</div>



    
@endsection



@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js"></script>

    <script>
        Dropzone.options.myAwesomeDropzone = {
            headers:{
                'X-CSRF-TOKEN' : "{{csrf_token()}}"
            },
            paramName: "file",
            dictDefaultMessage: "Coloca una foto o imagen para empezar",
            acceptedFiles: "image/*",
            maxFilesize: 15,
            maxFiles: 4,

            success: function (file, response) {
                if (file.status = 'success'){
                    handleDropzoneFileUpload.handleSuccess(response);
                } else {
                    handleDropzoneFileUpload.handleError(response);
                }
            },
            error: function(file,response) {
                console.log(file);
                console.log(response);
                var message = response.errors.file[0];
                $(file.previewElement).find('.dz-error-message').text(message);
                $(file.previewElement).removeClass('dz-complete');
                $(file.previewElement).addClass('dz-error');
            }
        };
        var handleDropzoneFileUpload = {
            handleError: function (response) {
                console.log(response);
                alert('handleError');
            },
            handleSuccess: function (response){
    
                if ($('#muestra-1')[0]  ) {
                    $('#nuevo')[0].removeChild($('#muestra-1')[0]);
                    $('#nuevo')[0].removeChild($('#muestra-2')[0]);
                }
               
                $('#nuevo').append(
                    `<div class="col mb-4"><div class="card">
                    <img src="`+window.location.origin + '/storage/imagenes/'+'1-' +response +`" class="card-img-top" alt="...">
                    <div class="card-body">
                      <a href="`+window.location.origin + '/storage/imagenes/'+'1-' +response +`" class="btn btn-primary" download >Descargar ahora</a>
                    </div>
                     </div></div>`);

                     $('#nuevo').append(
                    `<div class="col mb-4"><div class="card">
                    <img src="`+window.location.origin + '/storage/imagenes/' + '2-' +response +`" class="card-img-top" alt="...">
                    <div class="card-body">
                      <a href="`+window.location.origin + '/storage/imagenes/'+'2-' +response +`" class="btn btn-primary" download >Descargar ahora</a>
                    </div>
                     </div></div>`);

                    
                   

                console.log(response);
            }
        }





    </script>
@endsection
