@extends('app')
@section('content')
    <h4>Вычисления</h4>
    <form id="generate" action="{{ route('generate::example') }}" method="post">
      @csrf
    </form>
    <div class="row">
      <div class="col-12 col-md-6">
        <label for="count" class="form-label">Количество примеров <i><b>примерно 100 на лист</b></i></label>
        <input type="number" class="form-control" name="example_count" id="count" placeholder="10" value=10 form="generate">
      </div>
      <div class="col-12 col-md-6">
        <label for="max" class="form-label">Максимальное число</label>
        <input type="number" class="form-control" name="example_max" id="max"  value=20 form="generate">
      </div>
    </div>
    <div class="row p-3">
      <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" id="plus" name="example_plus" checked form="generate">
        <label class="form-check-label" for="plus">Сложение? <i>(<b>2</b> + <b>7</b> = <b>...</b>)</i></label>
      </div>
      <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" id="minus" name="example_minus" checked form="generate">
        <label class="form-check-label" for="minus">Вычитание? <i>(<b>7</b> - <b>2</b> = <b>...</b>)</i></label>
      </div>
      <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" id="multiply" name="example_multiply"  form="generate">
        <label class="form-check-label" for="multiply">Умножение? <i>(<b>2</b> × <b>7</b> = <b>...</b>)</i></label>
      </div>
      <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" id="division" name="example_division" form="generate">
        <label class="form-check-label" for="division">Деление? <i>(<b>14</b> ÷ <b>7</b> = <b>...</b>)</i></label>
      </div>
      <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" id="itemWhy" name="example_itemWhy" checked form="generate">
        <label class="form-check-label" for="itemWhy">Какое число пропущено? <i>(<b>14</b> ÷ <b>...</b> = <b>7</b>)</i></label>
      </div>
      <hr>
      <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" id="notNull" name="example_notNull" form="generate">
        <label class="form-check-label" for="notNull">Убрать действия с нулём?</label>
      </div>
    </div>
    <hr>
    <h4>Сравнения </h4>
    <div class="row">
      <div class="col-12 col-md-6">
        <label for="comparison_count" class="form-label">Количество примеров <i><b>примерно 100 на лист</b></i></label>
        <input type="number" class="form-control" name="comparison_count" id="comparison_count" placeholder="10" value=10 form="generate">
      </div>
      <div class="col-12 col-md-6">
        <label for="comparison_max" class="form-label">Максимальное число</label>
        <input type="number" class="form-control"  name="comparison_max" id="comparison_max"  value=20 form="generate">
      </div>
    </div>
    <div class="row p-3">
      <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" id="comparisonOfNumbers" name="comparisonOfNumbers" form="generate">
        <label class="form-check-label" for="comparisonOfNumbers">Сравнение чисел? <i>(<b>14</b> ... <b>22</b>)</i></label>
      </div>
      <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" id="comparisonOfDevs" name="comparisonOfDevs" form="generate">
        <label class="form-check-label" for="comparisonOfDevs">Сравнение вычисления? <i>(<b>14 - 2</b> ... <b>22 ÷ 11</b>)</i></label>
      </div>
      <div style="padding-left: 40px;">
        <div class="form-check form-switch">
          <input class="form-check-input" type="checkbox" id="comparison_plus" name="comparison_plus" form="generate">
          <label class="form-check-label" for="comparison_plus">Сложение? <i>(<b>2</b> + <b>7</b>)</i></label>
        </div>
        <div class="form-check form-switch">
          <input class="form-check-input" type="checkbox" id="comparison_minus" name="comparison_minus" form="generate">
          <label class="form-check-label" for="comparison_minus">Вычитание? <i>(<b>7</b> - <b>2</b>)</i></label>
        </div>
        <div class="form-check form-switch">
          <input class="form-check-input" type="checkbox" id="comparison_multiply" name="comparison_multiply"  form="generate">
          <label class="form-check-label" for="comparison_multiply">Умножение? <i>(<b>2</b> × <b>7</b>)</i></label>
        </div>
        <div class="form-check form-switch">
          <input class="form-check-input" type="checkbox" id="comparison_division" name="comparison_division" form="generate">
          <label class="form-check-label" for="comparison_division">Деление? <i>(<b>14</b> ÷ <b>7</b>)</i></label>
        </div>
        <hr>
        <div class="form-check form-switch">
          <input class="form-check-input" type="checkbox" id="comparison_notNull" name="comparison_notNull" form="generate">
          <label class="form-check-label" for="comparison_notNull">Убрать действия с нулём?</label>
        </div>
      </div>
    </div>
    <div class="row p-3">
      <button type="submit" class="btn btn-primary" form="generate">Создать примеры</button>
    </div>
@endsection
