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
          <div class="row">
              <div class="col-8 offset-2">
                  <h4>From Entry Date</h4>
                  <form action="" method="post">
                      <div class="entry-form">
                          <div class="row">
                              <div class="col-lg-6 col-12">
                                  <div class="form-left">
                                      <div class="form-group row">
                                          <label for="inputEmail3" class="col-lg-2 col-form-label">From</label>
                                          <div class="col-lg-10">
                                              <input type="number" class="form-control" id="inputEmail3" placeholder="Over or Equal...">
                                              <button class="btn btn-primary mt-3" type="submit">Submit</button>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-lg-6 col-12">
                                  <div class="form-left">
                                      <div class="form-group row">
                                          <label for="inputEmail3" class="col-lg-2 col-form-label">To</label>
                                          <div class="col-lg-10">
                                              <input type="number" class="form-control" id="inputEmail3" placeholder="Under...">
                                              <button class="btn btn-outline mt-3" type="button">Clear</button>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </form>
              </div>
              <div class="col-12">
                  <div class="button-group mb-3 d-flex align-items-center">
                      <form action="">
                      <button type="button" class="btn btn-outline-secondary">Back</button>
                      <button type="button" class="btn btn-outline-success ml-3">PDF</button>
                      <div class="input-group ml-3">
                          <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon1">Email</span>
                          </div>
                          <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                      </div>
                      </form>
                  </div>

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
                      <tr>
                          <th scope="row">{{$staff->StaffID}}</th>
                          <td>{{$staff->Name}}</td>
                          <td>{{$staff->Email}}</td>
                          <td>{{$staff->Entry_Date}}</td>
                      </tr>
                          @endforeach
                      @endif
                      </tbody>
                  </table>

              </div>
          </div>
      </div>
    </body>
</html>
