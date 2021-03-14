   <!-- tratamento dos erros -->
            @if(count ($errors) >0)
            @foreach ($errors->all() as $error)
            <div class="col-md-12">
                  <p class="alert alert-warning" style="color: red;">{{$error}}</p>
            </div>
        
            @endforeach
            @endif

            @if(session()->has('message'))

            <p class="alert alert-info">{{session ('message')}}</p>

            @endif

            @if(session()->has('msg_del'))

            <p class="alert alert-danger">{{session ('msg_del')}}</p>

            @endif