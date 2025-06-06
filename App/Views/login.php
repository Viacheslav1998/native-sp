
<div id="modal" class="modal-box">
  <h2>Уведомление</h2>
  <ul id="modal-list"></ul>
  <button id="modal-close">Закрыть</button>
</div>
<div class="fone">
  <div class="decor"></div>
  <div class="row">
    <div class="col text-center text-white pt-4">
      <h1>Страница для входа в систему.</h1>
      <p>Давай скорее - твои события уже ждут!</p>
    </div>
  </div>
  <div class="wrapper-form-login d-flex justify-content-center pt-4 pb-5">
    <div class="form-login p-5 mb-4 shadow">
      <form id="form-login" enctype="multipart/form-data">
        <div class="form-group p-2 text-success fw-bold">
          <label for="email" class="fs-5">Нужна твоя почта</label>
          <input id="email" type="email" class="form-control px-4 text-danger" aria-describedby="emailHelp" placeholder="Вводи свою почту">
        </div>
        <div class="form-group p-2 text-success fw-bold">
          <label for="password" class="fs-5">И Пароль</label>
          <input id="password" type="password" class="form-control px-4 text-danger" placeholder="Вводи свой пароль">
        </div>
        <div class="form-group form-check m-2 py-2">
          <input type="checkbox" class="form-check-input" id="checkbox">
          <label class="form-check-label text-black" for="checkbox">Запомнить меня</label>
        </div>
        <button id="push" type="button" class="btn btn-danger m-2">Зайти</button>
      </form>
    </div>
  </div>
  <div class="text-white text-center mb-5 fs-4">
    Если тебя ещё нет в системе то перейди и зарегистрируйся<br>
    <a href="/register" class="btn btn-warning m-2 fs-5">Регистрация</a>
  </div>
</div>