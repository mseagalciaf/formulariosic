<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css')}}" rel="stylesheet">
    <title>Formulario</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body style="
    height : 100vh;
    background-repeat: no-repeat;
    background-image: radial-gradient(circle at 37.72% -19.64%, #ade5ff 0, #7dcefb 25%, #3cb5f2 50%, #009ce9 75%, #0085e0 100%);"
>
    
    <div class="container" style="padding: 25px;">
        <div class="card" style="box-shadow: 2px 5px 5px gray;">
            <div class="card-body container">
                <div class="col-12">
                    <form style="margin: 5px">
                        <div class="input-group">
                            <input type="search" name="search" class="form-control" placeholder="Buscar..." 
                            aria-label="Recipient's username with two button addons" aria-describedby="button-addon4">
                            <input placeholder="Fecha Desde" class="textbox-n" type="text" onfocus="(this.type='date')" name="startdate">
                            <input placeholder="Fecha Hasta" class="textbox-n" type="text" onfocus="(this.type='date')" name="enddate">
                            <div class="input-group-append" id="button-addon4">
                                <button class="btn btn-outline-primary" type="submit" >Buscar</button>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="col-12 table-responsive">
                    <table class="table table-hover ">
                        <thead style="background-color: #efefef;">
                            <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Edad</th>
                            <th scope="col">Celular</th>
                            <th scope="col">Ciudad</th>
                            <th scope="col">Fecha</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($forms as $form)
                            <tr>
                                <td scope="row">{{ $form->name}}</td>
                                <td>{{ $form->age}}</td>
                                <td>{{ $form->phone}}</td>
                                <td>{{ $form->city}}</td>
                                <td>{{ $form->created_at}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        
                    </table>
                    {{ $forms->links() }}

                </div>
            </div>
        </div>
    </div>

    <!-- Scripts bootstrap -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>