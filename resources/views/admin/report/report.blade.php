<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->
  <title>测评报告</title>
  <script src="https://cdn.bootcss.com/echarts/3.5.4/echarts.min.js"></script>
  <script>
      window.Laravel = {!! json_encode([
          'csrfToken' => csrf_token(),
      ]) !!};
      window.echarts = echarts
  </script>

</head>
<body>
    <div id="app">
        <report-report></report-report>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- <script type="text/javascript" src="http://frank.s1.natapp.link/live/live-eva/public/js/app.js"></script> -->

</body>
</html>
