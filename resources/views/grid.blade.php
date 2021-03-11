<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">

    <!-- Bootstrap CSS ▢ -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Всем привет!</title>
  </head>
  <body>
    <div class="container" style="min-width: 100%;">
      <h3>Вычесления</h3>
      <div class="row">
        @foreach($Examples as $Example)
          <div class="col-3" style="height: 40px; font-size: 20px;">
            {{ $Example->display }}
          </div>
        @endforeach
      </div>
      @if( request()->input('comparisonOfNumbers') || request()->input('comparisonOfDevs') )
        <h3>Сравнение</h3>
        <div class="row">
        @for($i=0; $i<=(request()->input('comparison_count')-1);$i++)
          <?php
          //comparison_notNull
          $param1 = rand(request()->input('comparison_notNull')?1:0, request()->input('comparison_max'));
          $param2 = rand(request()->input('comparison_notNull')?1:0, request()->input('comparison_max'));

          if(request()->input('comparisonOfNumbers') && request()->input('comparisonOfDevs'))
            $operation = rand(1, 2);
          else if(!request()->input('comparisonOfNumbers') && request()->input('comparisonOfDevs'))
            $operation = rand(2, 2);
          else if(request()->input('comparisonOfNumbers') && !request()->input('comparisonOfDevs'))
            $operation = rand(1, 1);
          else
            $operation  = false;
          ?>
          <div class="col-3" style="height: 40px; font-size: 20px;">
            <?php
              $Operations  = null;
              if(request()->input('comparison_plus'))
                $Operations[] = 0;
              if(request()->input('comparison_minus'))
                $Operations[] = 1;
              if(request()->input('comparison_multiply'))
                $Operations[] = 2;
              if(request()->input('comparison_division'))
                $Operations[] = 3;
            ?>
            @if( $operation == 1 )
              {{ $param1 }} ▢ {{ $param2 }}
            @elseif( $operation ==2  && !is_null($Operations))
              {{ \App\Models\Example::getExample($Operations, $param1, request()->input('comparison_notNull')?1:0) }} ▢ {{ \App\Models\Example::getExample($Operations, $param2, request()->input('comparison_notNull')?1:0) }}
            @endif
          </div>
        @endfor
      </div>
      @endif
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
