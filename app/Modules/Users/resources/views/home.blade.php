<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    <a href="{{route('user.logout')}}">Logout</a>
    <section style="background-color: #eee;">
        <div class="container py-5">
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-md-12 col-lg-4 mb-4 mb-lg-0">
                        <div class="card">
                            <div class="d-flex justify-content-between p-3">
                                <p class="lead mb-0">{{ $product->name }}</p>
                                <div class="bg-info rounded-circle d-flex align-items-center justify-content-center shadow-1-strong"
                                    style="width: 35px; height: 35px;">
                                    <p class="text-white mb-0 small">x4</p>
                                </div>
                            </div>
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Products/4.webp"
                                class="card-img-top" alt="product image" />
                            <div class="card-body">
                                <div class="d-flex justify-content-between ">
                                    <h5 class="mb-0">Category: {{ $product->category->name }}</h5>
                                    <h5 class="text-dark mb-0">Price:  ${{ $product->price }}</h5>

                                </div>
                                <br>
                                @if ($product->description != '')
                                <div class="d-flex justify-content-between ">
                                    <p class="mb-0"> Description: {{ $product->description }}</p>
                                </div>
                                @endif
                               
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</body>

</html>
