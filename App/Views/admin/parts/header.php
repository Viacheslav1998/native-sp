<header>
  <div class="row">
    <b>ADM-HUSTLE.</b>
    <img class="size size-head" src="/images/wp.jpg">
  </div>
  <div class="menu custom-silver">
    <div class="row p-3">
      <div class="col-xl-4 col-sm-6 my-2 text-center">
        <a href="/a4min/dashboard" class=" d-flex align-items-center justify-content-center btn btn-outline-dark w-100 h-100 py-4">Главная</a>
      </div>
      <div class="col-xl-4 col-sm-6 my-2 text-center">
        <a href="/a4min/form-regular-event" class="d-flex align-items-center justify-content-center btn btn-outline-dark w-100 h-100 py-4">Добавить простое событие</a>
      </div>
      <div class="col-xl-4 col-sm-6 my-2 text-center">
        <a href="/a4min/form-main-event" class="d-flex align-items-center justify-content-center btn btn-outline-dark w-100 h-100 py-4">Добавить главное событие</a>
      </div>
      
      <?php if(\App\Helpers\Auth::hasRole('admin')): ?>
        <div class="col-xl-4 col-sm-6 my-2 text-center">
          <a href="/a4min/events" class="d-flex align-items-center justify-content-center btn btn-outline-dark w-100 h-100 py-4">Управление простыми событиями</a>
        </div>
      <?php endif; ?>

      <?php if(\App\Helpers\Auth::hasRole('admin')): ?>
        <div class="col-xl-4 col-sm-6 my-2 text-center">
          <a href="/a4min/main-events" class="d-flex align-items-center justify-content-center btn btn-outline-dark w-100 h-100 py-4">Управление главными событиями</a>
        </div>
      <?php endif; ?>

      <?php if(\App\Helpers\Auth::hasRole('admin')): ?>
        <div class="col-xl-4 col-sm-6 my-2 text-center">
          <a href="/a4min/persons" class="d-flex align-items-center justify-content-center btn btn-outline-dark w-100 h-100 py-4">Управление пользователями</a>
        </div>
      <?php endif; ?>

      <?php if(\App\Helpers\Auth::hasRole('user')): ?>
        <div class="col-xl-4 col-sm-6 my-2 text-center">
          <a href="/a4min/profile" class="d-flex align-items-center justify-content-center btn btn-outline-dark w-100 h-100 py-4">Профиль</a>
        </div>      
      <?php endif; ?>

    </div>
  </div>
</header>