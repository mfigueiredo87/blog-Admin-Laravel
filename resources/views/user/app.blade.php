<!DOCTYPE html>
<html lang="en">

<head>
@include('user/layouts/head')
</head>

<body>
<!-- header -->
  @include('user/layouts/header')
<!-- fim do header -->
   
<!-- criar a section. o show mostra a section -->
   @section('main-content')
   @show 
   <!-- fim do content -->

    <!-- include footer -->
    @include('user/layouts/footer')
</body>

</html>
