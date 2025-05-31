<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PDF</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-size: 14px;
            font-family: "Maven Pro", sans-serif;
            font-optical-sizing: auto;
            font-style: normal;
        }

        .title {
            font-size: 16px;
            font-weight: 600;
            border-bottom: 1px solid black;
        }

        hr {
            color: #0000004f;
            margin-top: 5px;
            margin-bottom: 5px
        }

        .table-bordered {
            padding: 10px;
            border: 1px solid #818589;
        }

        .table-bordered th {
            padding: 10px;
            border: 1px solid #818589;
        }

        .table-bordered td {
            padding: 10px;
            border: 1px solid #818589;
        }

        .table-bordered tr {
            padding: 10px;
            border: 1px solid #818589;
        }

        .add td {
            color: #36454F;
            text-transform: uppercase;
            font-weight: 600;
            font-size: 15px
        }

        .content {
            font-size: 14px
        }
    </style>
</head>

<body>

    <div class="container-fluid mt-5 mb-3">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="d-flex flex-row">
                        <img src="https://utcharitabletrust.com/assets/images/resources/logo.png" width="220"
                            height="60">
                        <div class="d-flex flex-column mt-3">
                            <span class="font-weight-bold title">Book Receipt</span>
                        </div>
                    </div>
                    <hr>
                    <div class="table-responsive p-2">
                        <table class="table table-borderless">
                            <tbody>
                                <tr class="add">
                                    <td>From: </td>
                                    <td>To: </td>
                                </tr>
                                <tr class="content">
                                    <td class="font-weight-bold">{{ $customer->name }}
                                        <br>Phone: {{ $customer->phone }}
                                        <br>Email: {{ $customer->email }}
                                        <br>Address: {{ $customer->address }}
                                    </td>
                                    <td class="font-weight-bold">UT Charitable Trust
                                        <br>Phone: +91 9377958582
                                        <br>Phone: +91 9377958582
                                        <br>Email: utctrust@gamil.com
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <div class="products p-2">
                        <table class="table table-bordered">
                            <tbody>
                                <tr class="add">
                                    <th scope="col">Sr. No</th>
                                    <th scope="col">Book Name</th>
                                    <th scope="col">Author</th>
                                    <th scope="col">Class</th>
                                    <th scope="col">UTBN</th>
                                </tr>
                                @foreach ($record as $key => $book)
                                    <tr class="content">
                                        <th scope="row">{{$key + 1}}</th>
                                        <td>{{$book['bookName']}}</td>
                                        <td>{{$book['author']}}</td>
                                        <td>{{$book['class']}}</td>
                                        <td>{{$book['utbn']}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <hr>
                    <div class="address p-2">
                        <table class="table table-borderless">
                            <tbody>
                                <tr class="add">
                                    <td>UT Charitable Address: </td>
                                </tr>
                                <tr class="content">
                                    <td> Shop.NO.05,
                                        <br> V-Raj Darshan,Samarwani
                                        <br> Silvassa, Dadra And Nagar
                                        <br> Haveli-396230
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="address p-2">
                        <table class="table table-borderless">
                            <tbody>
                                <tr class="add">
                                    <td>Note: </td>
                                </tr>
                                <tr class="content">
                                    <td> According to our library policy, a penalty is applied for lost or missing books
                                        to cover the replacement cost and processing fee.
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>
