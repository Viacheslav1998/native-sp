
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
      <form id="form-register" enctype="multipart/form-data">
        <div class="form-group p-2 text-dark fw-bold">
          <label for="inputName" class="fs-5">Твое имя</label>
          <input type="text" class="form-control px-4 text-primary" id="inputName" placeholder="Введи свое имя">
        </div>
        <div><button id="cl">pushtobutton</button></div>
        <div class="form-group p-2 text-dark fw-bold">
          <label for="inputFirstName" class="fs-5">Твоя фамилия</label>
          <input type="text" class="form-control px-4 text-primary" id="inputFirstName" placeholder="Введи свою фамилию">
        </div>
        <div class="form-group p-2 text-dark fw-bold">
          <label for="inputEmail" class="fs-5">Твоя почта</label>
          <input type="email" class="form-control px-4 text-primary" id="inputEmail" placeholder="Введи свою почту">
        </div>
        <div class="form-group p-2 text-dark fw-bold">
          <label for="selectTown" class="fs-5">Твой город</label>
          <select class="form-control fs-5 text-primary" id="selectTown">
            <option>Караганда</option>
            <option>Алмата</option>
            <option>Астана</option>
            <option>Темиртау</option>
            <option>Атырау</option>
          </select>
        </div>
        <div class="form-group p-2 text-dark fw-bold">
          <label for="inputPassword" class="fs-5">Твой Пароль</label>
          <input type="password" class="form-control px-4 text-primary" id="inputPassword" placeholder="Введи свой пароль">
        </div>
        <div class="form-group p-2 text-dark fw-bold">
          <label for="inputPasswordAgain" class="fs-5">Еще раз пароль</label>
          <input type="password" class="form-control px-4 text-primary" id="inputPasswordAgain" placeholder="Нужно ввести пароль еще раз">
        </div>
        <div class="form-group p-2 text-dark fw-bold">
          <label for="inputPhone" class="fs-5">Твой телефон</label>
          <input type="text" class="form-control px-4 text-primary" id="exampleInputPassword1" placeholder="Нужен твой номер телефона">
        </div>
        <div class="form-group p-2 text-dark fw-bold">
          <label for="images">Если нужно можно выбрать фотку или аву</label>
          <input type="file" class="form-control-file" id="images">
        </div>
        <button type="submit" class="btn btn-dark m-2">Регистрация</button>
      </form>
    </div>
  </div>
  <div class="text-white text-center mb-5 fs-4">
    Если ты уже есть в системе просто заходи<br>
    <a href="/login" class="btn btn-warning m-2 fs-5">Вход</a>
  </div>
</div>