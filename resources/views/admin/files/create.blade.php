@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css" integrity="sha512-3g+prZHHfmnvE1HBLwUnVuunaPOob7dpksI7/v6UnF/rnKGwHf/GdEq9K7iEN7qTtW+S0iivTcGpeTBqqB04wA==" crossorigin="anonymous" />
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Subir imagenes</h1>
                

                <form action="{{route('admin.files.store')}}"
                    method="POST"
                    class="dropzone"
                    id="my-awesome-dropzone">
                </form>





            </div>
        </div>

        <div class="row">






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

    
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js"></script>

    <script>
        Dropzone.options.myAwesomeDropzone = {
            headers:{
                'X-CSRF-TOKEN' : "{{csrf_token()}}"
            },
            paramName: "file",
            dictDefaultMessage: "Arrastre una imagen al recuadro para subirlo",
            acceptedFiles: "image/*",
            maxFilesize: 2,
            maxFiles: 4,

            success: function (file, response) {
                if (file.status = 'success'){
                    handleDropzoneFileUpload.handleSuccess(response);
                } else {
                    handleDropzoneFileUpload.handleError(response);
                }
            },
            error: function(file,response) {
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