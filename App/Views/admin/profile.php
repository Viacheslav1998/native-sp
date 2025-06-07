<div class="custom-silver my-4 p-4 custom-height">
  <div class="row">
    <div class="col bg-dark mb-5 text-white">
      <h4 class="px-3 pt-2 mx-2">Профиль</h4>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4 text-center mb-5 ">
      <div class="person-imagen">
        <img src="/images/foneb.jpg" alt="Фото профиля" class="img-thumbnail">
        <form>
          <div class="form-group">
            <label class="custom-select-image" for="imagen">Поменять Аватар</label>
            <input type="file" class="form-control-file" id="imagen">
          </div>
        </form>
      </div>
    </div>
    <div class="col">
      <h3>Привет ! Пользователь</h3>
      везде поработать с auth 
      сессиями показать имя пользователя
      есть готовый  метод гет найм если его нет что то делать 
      переводить если нет пользователя по ролям
      <p style="font-weight: 100; font-size: 24px;" class="text-dark">Здесь ты сможешь изменит данные</p>
      <form>
        <div class="form-group pb-2">
          <label for="name">Имя</label>
          <input type="text" class="form-control" id="name" aria-describedby="name" placeholder="изменить имя">
          <small id="name" class="form-text text-muted">Поменяй имя если что то не так</small>
        </div>
        <div class="form-group pb-2">
          <label for="lastName">Фамилия</label>
          <input type="text" class="form-control" id="lastName" aria-describedby="lastName" placeholder="Изменить фамилию">
          <small id="lastName" class="form-text text-muted">Поменяй фамилю если что то не так</small>
        </div>
        <div class="form-group pb-2">
          <label for="Email">Почта</label>
          <input type="email" class="form-control" id="email" aria-describedby="email" placeholder="Изменить почту">
          <small id="Email" class="form-text text-muted">Поменяй почту если что то не так</small>
        </div>
        <div class="form-group pb-4">
          <label for="phone">Телефон</label>
          <input type="phone" class="form-control" id="phone" aria-describedby="phone" placeholder="Изменить номер телефона">
          <small id="phone" class="form-text text-muted">Поменяй номер если что то не так</small>
        </div>
        <button id="person-push" type="button" class="btn btn-dark">Изменить</button>
      </form>
      <div class="col mt-4">
        <p class="text-danger" style="font-weight: 300; font-size: 18px;">Изменение данных ограничено - только 3 раза</p>
      </div>
    </div>
  </div>
</div>