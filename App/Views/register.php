<div id="modal" class="modal-box">
  <h2>Уведомление</h2>
  <ul id="modal-list"></ul>
  <button id="modal-close">Закрыть</button>
</div>
<div class="fone-r">
  <div class="decor"></div>
  <div class="row">
    <div class="col text-center text-white pt-4">
      <h1>Страница для Регистрации.</h1>
      <p>В этой системе ты сможешь реализовать свои события!</p>
      <i>Люди смогут, увидеть и понять кто создал событие, с какого оно города, кто его инициатор. <br> Но переживать не нужно, ведь очень важные конфиденциальные данные будут скрыты.</i>
    </div>
  </div>
  <div class="wrapper-form-register d-flex justify-content-center pt-4 pb-5">
    <div class="form-register p-5 m-4 shadow">
      <form id="form-register">
        <div class="form-group p-2 text-dark fw-bold">
          <label for="name" class="fs-5">Имя</label>
          <input type="text" class="form-control px-4 text-primary" id="name" placeholder="Введи свое имя">
        </div>
        <div class="form-group p-2 text-dark fw-bold">
          <label for="lastName" class="fs-5">Фамилия</label>
          <input type="text" class="form-control px-4 text-primary" id="lastName" placeholder="Введи свою фамилию">
        </div>
        <div class="form-group p-2 text-dark fw-bold">
          <label for="email" class="fs-5">Почта</label>
          <input type="email" class="form-control px-4 text-primary" id="email" placeholder="Введи свою почту">
        </div>
        <div class="form-group p-2 text-dark fw-bold">
          <label for="town" class="fs-5">Город</label>
          <select class="form-control fs-5 text-primary" id="town">
            <option>Караганда</option>
            <option>Алмата</option>
            <option>Астана</option>
            <option>Темиртау</option>
            <option>Атырау</option>
          </select>
        </div>
        <div class="form-group p-2 text-dark fw-bold">
          <label for="phone" class="fs-5">Телефон</label>
          <input type="text" class="form-control px-4 text-primary" id="phone" placeholder="Нужен твой номер телефона">
        </div>
        <div class="form-group p-2 text-dark fw-bold">
          <label for="password" class="fs-5">Пароль</label>
          <input type="password" class="form-control px-4 text-primary" id="password" placeholder="Введи свой пароль">
        </div>
        <div class="form-group p-2 text-dark fw-bold">
          <label for="passwordAgain" class="fs-5">Еще раз пароль</label>
          <input type="password" class="form-control px-4 text-primary" id="passwordAgain" placeholder="Нужно ввести пароль еще раз">
        </div>
        <button id="push" type="button" class="btn btn-dark m-2">Регистрация</button>
      </form>
    </div>
  </div>
  <div class="text-white text-center mb-5 fs-4">
    Если ты уже есть в системе просто заходи<br>
    <a href="/login" class="btn btn-warning m-2 fs-5">Вход</a>
  </div>
</div>