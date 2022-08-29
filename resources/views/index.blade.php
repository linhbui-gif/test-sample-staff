<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body class="antialiased">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
    <div class="container">
        <form action="" method="post">
            @csrf
            <div class="row">
                <div class="col-8 offset-2">
                    <h4>From Entry Date</h4>

                    <div class="entry-form">
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="form-left">
                                    <div class="form-group row">
                                        <label for="from_date" class="col-lg-2 col-form-label">From</label>
                                        <div class="col-lg-10">
                                            <input type="number" class="form-control" id="from_date" name="from_date" value="{{$from_date}}" placeholder="Over or Equal...">
                                            <button class="btn btn-primary mt-3" type="submit">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-left">
                                    <div class="form-group row">
                                        <label for="to_date" class="col-lg-2 col-form-label">To</label>
                                        <div class="col-lg-10">
                                            <input type="number" class="form-control" id="to_date" name="to_date" value="{{$to_date}}" placeholder="Under...">
                                            <button class="btn btn-outline mt-3" type="button" id="clear">Clear</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="button-group mb-3 ">
                        <!-- <form action="" class="d-flex align-items-center" method="post"> -->
                        <button type="submit" id="btn-back" class="btn btn-outline-secondary">Back</button>
                        <button type="button" id="btn-pdf" class="btn btn-outline-success ml-3" onClick="demoFromHTML()">PDF</button>
                        <div class="input-group ml-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Email</span>
                            </div>
                            <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" name="email" value="{{$email}}">
                        </div>
                        <!-- </form> -->
                    </div>
                    <div id="formHtml">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Entry Date</th>
                                    <th scope="col">Day Of Week</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($tblStaff))
                                @foreach($tblStaff as $k => $staff)
                                <?php $dayOfWeekConvert = date('l', strtotime($staff->Entry_Date)); ?>
                                <tr>
                                    <th scope="row">{{$staff->StaffID}}</th>
                                    <td>{{$staff->Name}}</td>
                                    <td>{{$staff->Email}}</td>
                                    <td>{{$staff->Entry_Date}}</td>
                                    <td>{{dayOfWeekJp($dayOfWeekConvert)}}</td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </form>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
        <script>
            $('#clear').on('click', function() {
                $('#from_date').val('');
                $('#to_date').val('');
            })

            function demoFromHTML() {
                var pdf = new jsPDF('p', 'pt', 'letter');
                source = $('#formHtml')[0];
                specialElementHandlers = {
                    '#bypassme': function(element, renderer) {
                        return true
                    }
                };
                margins = {
                    top: 80,
                    bottom: 60,
                    left: 40,
                    width: 522
                };
                pdf.fromHTML(
                    source, // HTML string or DOM elem ref.
                    margins.left, // x coord
                    margins.top, { // y coord
                        'width': margins.width, // max width of content on PDF
                        'elementHandlers': specialElementHandlers
                    },

                    function(dispose) {
                        pdf.save('nsv_test.pdf');
                    }, margins);
            }
        </script>
    </div>
</body>

</html>