<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>WE Fashion</title>
    @vite(['resources/css/app.css','resources/js/app.js']) @stack("js")
  </head>

  <body>
    @include("common.navbar")
    <main></main>
    @include("common.footer")
  </body>
</html>