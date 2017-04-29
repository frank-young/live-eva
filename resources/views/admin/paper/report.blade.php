<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>问卷</title>
  <script>
      window.Laravel = {!! json_encode([
          'csrfToken' => csrf_token(),
      ]) !!};
  </script>
</head>
<body>
    <div id="app">
        <paper-report :report="{{ $paper }}"></paper-report>
    </div>
    <!-- <script type="text/javascript" src="http://frank.s1.natapp.link/live/live-eva/public/js/app.js"></script> -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
