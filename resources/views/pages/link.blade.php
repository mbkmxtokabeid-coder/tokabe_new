@extends('pages.template')
{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

  <link rel="stylesheet" href="{{asset ('template/style.css')}}">

@section('content')

<section class="main-services">
    <div class="container">
        <div class="row">
            <h1 class="text-center mb-2">Stay Update With Us</h1>
        </div>

        <div class="icon d-flex align-items-center justify-content-center mb-2">
            <img style="max-height: 100px; max-width: 100px" src="{{ asset('images/LogoTKB.jpg') }}" alt="Logo">
        </div>

            <div class="col-md-3 mx-auto">
                <a href="https://tokabe.id/" class="text-decoration-none">
                    <div class="card text-center mb-4">
                        <div class="card-body">
                            <div class="mb-4">
                                <i class="fas fa-globe fa-lg"></i>
                            </div>
                            <p class="card-text">tokabe.id</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3 mx-auto">
                <a href="http://shopee.co.id/ikhtiar_berkah" class="text-decoration-none">
                    <div class="card text-center mb-4" style="background-color: #f6422d; color: #ffffff;">
                        <div class="card-body">
                            <div class="mb-4">
                                <i class="fas fa-shopping-bag"></i>
                            </div>
                            <p class="card-text">shopee </p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3 mx-auto">
                <a href="https://tokopedia.link/ikhtiarberkah10?utm_campaign=Shop-88174732-7704797-151123&utm_source=salinlink&utm_medium=share" class="text-decoration-none">
                    <div class="card text-center mb-4" style="background-color: #03ac0e; color: #ffffff;">
                        <div class="card-body">
                            <div class="mb-4">
                                <i class="fas fa-shopping-bag"></i>
                            </div>
                            <p class="card-text">tokopedia</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3 mx-auto">
                <a href="https://bit.ly/1IBTKB" class="text-decoration-none">
                    <div class="card text-center mb-4" style="background-color: #25D366; color: #ffffff;">
                        <div class="card-body">
                            <div class="mb-4">
                                <i class="fab fa-whatsapp fa-lg"></i>
                            </div>
                            <p class="card-text">Admin 1</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="row">
            <div class="col-md-3 mx-auto">
                <a href="https://bit.ly/2IBTKB" class="text-decoration-none">
                    <div class="card text-center mb-4" style="background-color: #25D366; color: #ffffff;">
                        <div class="card-body">
                            <div class="mb-4">
                                <i class="fab fa-whatsapp fa-lg"></i>
                            </div>
                            <p class="card-text">Admin 2</p>
                        </div>
                    </div>
                </a>
            </div>
            </div>

          <div class="row">
            <div class="col-md-3 mx-auto">
                <a href="https://bit.ly/3IBKTB" class="text-decoration-none">
                    <div class="card text-center mb-4" style="background-color: #25D366; color: #ffffff;">
                        <div class="card-body">
                            <div class="mb-4">
                                <i class="fab fa-whatsapp fa-lg"></i>
                            </div>
                            <p class="card-text">Admin 3</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>

           <!--<div class="row">-->
           <!-- <div class="col-md-3 mx-auto">-->
           <!--     <a href="mailto:ikhtiarberkah27@gmail.com" class="text-decoration-none">-->
           <!--         <div class="card text-center mb-4">-->
           <!--             <div class="card-body">-->
           <!--                 <div class="mb-4">-->
           <!--                     <i class="far fa-envelope fa-lg"></i>-->
           <!--                 </div>-->
           <!--                 <p class="card-text">ikhtiarberkah27@gmail.com</p>-->
           <!--             </div>-->
           <!--         </div>-->
           <!--     </a>-->
           <!-- </div>-->
           <!--</div>-->
           <div class="row">
            <div class="col-md-3 mx-auto">
                <a href="mailto:info@tokabe.id" class="text-decoration-none">
                    <div class="card text-center mb-4">
                        <div class="card-body">
                            <div class="mb-4">
                                <i class="far fa-envelope fa-lg"></i>
                            </div>
                            <p class="card-text">info@tokabe.id</p>
                        </div>
                    </div>
                </a>
            </div>
           </div>

            <div class="col-md-3 mx-auto">
                <a href="https://www.instagram.com/ib_ikhtiar_berkah/" class="text-decoration-none">
                    <div class="card text-center mb-4" style="background-color: #E4405F; color: #ffffff;">
                        <div class="card-body">
                            <div class="mb-4">
                                <i class="fab fa-instagram fa-lg"></i>
                            </div>
                            <p class="card-text">@ib_ikhtiar_berkah</p>
                        </div>
                    </div>
                </a>
            </div>

           <div class="row">
            <div class="col-md-3 mx-auto">
                <a href="https://www.instagram.com/ig.souvenir_medan/" class="text-decoration-none">
                    <div class="card text-center mb-4" style="background-color: #E4405F; color: #ffffff;">
                        <div class="card-body">
                            <div class="mb-4">
                                <i class="fab fa-instagram fa-lg"></i>
                            </div>
                            <p class="card-text">@ig.souvenir_medan</p>
                        </div>
                    </div>
                </a>
            </div>
           </div>

           <div class="row">
            <div class="col-md-3 mx-auto">
                <a href="https://www.instagram.com/ig.plakat/" class="text-decoration-none">
                    <div class="card text-center mb-4" style="background-color: #E4405F; color: #ffffff;">
                        <div class="card-body">
                            <div class="mb-4">
                                <i class="fab fa-instagram fa-lg"></i>
                            </div>
                            <p class="card-text">@ig.plakat</p>
                        </div>
                    </div>
                </a>
            </div>
           </div>

            <div class="row">
                <div class="col-md-3 mx-auto">
                    <a href="https://www.instagram.com/ig.laser.printuv/" class="text-decoration-none">
                        <div class="card text-center mb-4" style="background-color: #E4405F; color: #ffffff;">
                            <div class="card-body">
                                <div class="mb-4">
                                    <i class="fab fa-instagram fa-lg"></i>
                                </div>
                                <p class="card-text">@ig.laser.printuv</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

           <div class="row">
            <div class="col-md-3 mx-auto">
                <a href="https://www.instagram.com/ig.stempel_trodat/" class="text-decoration-none">
                    <div class="card text-center mb-4" style="background-color: #E4405F; color: #ffffff;">
                        <div class="card-body">
                            <div class="mb-4">
                                <i class="fab fa-instagram fa-lg"></i>
                            </div>
                            <p class="card-text">@ig.stempel_trodat</p>
                        </div>
                    </div>
                </a>
            </div>
           </div>
        </div>
    </div>
</section>

@endsection
