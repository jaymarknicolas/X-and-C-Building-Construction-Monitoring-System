<!DOCTYPE html>
<html lang="en">

<head>


    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <meta name="description" content="Fee Bootstrap Admin Theme with Webpack and Laravel-Mix" />
    <meta name="keywords"
        content="bootstrap, admin theme, admin dashboard, jquery, webpack, laravel-mix, template, responsive" />
    <meta name="author" content="siQuang - Simon Nguyen" />

    <title>X and C Building Construction | Login</title>

    <link rel="stylesheet" href="assets/css/siqtheme.css">

    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
    <link rel="stylesheet" href="assets/vendors/bootstrap-select/bootstrap-select.min.css">
</head>

<body class="theme-light">

    <div class="container mt-5">
        <div class="row d-flex justify-content-center my-5">
            <!-- BOF Validation Feedback -->
            <div class="col-sm-5">
                <div class="card mb-3">
                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="card-header uppercase">
                            <div class="caption d-flex flex-column align-items-center">
                                <img loading="lazy" src="{{ asset('assets/img/favicon.png') }}"
                                    class="w-25 h-25 img-fluid" alt="Constra">
                                <h3 class="fw-bold tex-dark text-center">X and C Building Construction
                                </h3>

                            </div>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="form-group row">
                                    <div class="input-group col">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ti-email"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="email"
                                            placeholder="Email Address" value="{{ session('email') }}" required>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="input-group col">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ti-lock"></i></span>
                                        </div>
                                        <input type="password" class="form-control" name="password"
                                            placeholder="Password" required>
                                    </div>
                                </div>
                                <p class="text-danger">{{ session('error') }}</p>

                            </li>
                        </ul>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary"><i class="ti-new-window"></i> Login</button>
                        </div>
                    </form>


                </div>
            </div>
            <!-- EOF Validation Feedback -->
        </div>
    </div>

    <script src="assets/scripts/siqtheme.js"></script>
    <script src="assets/vendors/bootstrap-select/bootstrap-select.min.js"></script>
    <script src="assets/scripts/pages/fm_control.js"></script>
</body>

</html>
