<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<!-- import CSS -->
<link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-chalk/index.css">
<!-- import JavaScript -->
<script src="https://unpkg.com/element-ui/lib/index.js"></script>
    <title>Vue App</title>
  </head>

    <body>
        <div id="headerRenamed">
            <h2>@{{message}}</h2>
        </div>
        <div id="app-6">
            Name:<input v-model="name">
            Gender:<input v-model="gender">
            City:<input v-model="city">
            <button v-on:click="search">Search</button>
            <br>
            <table>
                <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th> 
                    <th>Current Job Title</th>
                    <th>Current Company</th>
                    <th>Gender</th>
                    <th>City</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="row in data">
                        <td>@{{ row.firstname }}</td>
                        <td>@{{ row.lastname }}</td>
                        <td>@{{ row.current_job_title }}</td>
                        <td>@{{ row.current_company.name }}</td>
                        <td>@{{ row.gender }}</td>
                        <td>@{{ row.location }}</td>
                </tr>
            </tbody>
            </table>
        </div>
        <script
      src="https://code.jquery.com/jquery-3.5.1.min.js"
      integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
      crossorigin="anonymous"></script>
        <script type='text/javascript' src='./app.js'></script>
        <link rel="stylesheet" href="{{ URL::asset('./app.js') }}">

  </body>
</html>
