<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS ▢ -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Всем привет!</title>
  </head>
  <body class="p-5">
    <h1>Всем привет!</h1>
    <form id="generate" action="{{ route('generate::example') }}" method="post">
      @csrf
    </form>
    <div class="row">
      <div class="col">
        <label for="count" class="form-label">Количество примеров</label>
        <input type="number" class="form-control" name="example_count" id="count" placeholder="100" value=100 form="generate">
      </div>
      <div class="col">
        <label for="max" class="form-label">Максимальное число</label>
        <input type="number" class="form-control" name="example_max" id="max"  value=20 form="generate">
      </div>
    </div>
    <div class="row p-3">
      <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" id="plus" name="example_plus" checked form="generate">
        <label class="form-check-label" for="plus">Сложение?</label>
      </div>
      <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" id="minus" name="example_minus" checked form="generate">
        <label class="form-check-label" for="minus">Вычитание?</label>
      </div>
      <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" id="multiply" name="example_multiply"  form="generate">
        <label class="form-check-label" for="multiply">Умножение?</label>
      </div>
      <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" id="division" name="example_division" form="generate">
        <label class="form-check-label" for="division">Деление?</label>
      </div>
      <hr>
      <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" id="itemWhy" name="example_itemWhy" checked form="generate">
        <label class="form-check-label" for="itemWhy">Какое число пропущено?</label>
      </div>
      <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" id="notNull" name="example_notNull" form="generate">
        <label class="form-check-label" for="notNull">Исключить действия с нулём?</label>
      </div>
    </div>
    <div class="row p-3">
      <button type="submit" class="btn btn-primary" form="generate">Создать примеры</button>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
  </body>
  <!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(73223356, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        ecommerce:"dataLayer"
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/73223356" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</html>
