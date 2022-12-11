<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8" />
  <title></title>
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <meta property="og:title" content="" />
  <meta property="og:type" content="" />
  <meta property="og:url" content="" />
  <meta property="og:image" content="" />

  <link rel="manifest" href="site.webmanifest" />
  <link rel="apple-touch-icon" href="icon.png" />
  <!-- Place favicon.ico in the root directory -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous" />
  <link rel="stylesheet" href="{{asset('css/normalize.css')}}" />
  <link rel="stylesheet" href="{{asset('css/main.css')}}" />
  <script>
  delete window.document.referrer;
    window.document.__defineGetter__('referrer', function () {
        return "https://fiddle.jshell.net/";
    })
    </script>
  <meta name="theme-color" content="#fafafa" />
  @yield('styles')
    <style>
        a.dropdown-toggle{
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .form-group{
          margin-top: 15px;
        }
    </style>
</head>

<body>
  <div class="max-width-mobile">
    <div id="waveLoader" style="left: 0; top: 0; display: flex;" class="bg-light justify-content-center align-items-center vh-100 w-100 position-fixed">
      <div class="wavecontainer">
        <div class="wave"></div>
        <div class="wave"></div>
        <div class="wave"></div>
        <div class="wave"></div>
        <div class="wave"></div>
      </div>
    </div>