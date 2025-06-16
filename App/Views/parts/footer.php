<footer>
 <div class="bg-dark text-white p-3">
  <div class="row">
    <div class="col m-1">
      <div class="logo-mini">
        <h6 class="text-warning">Hastle.</h6>
      </div>
      <div>
        <p>Выбранный город:<br><span class="fw-lighter">Караганда</span> </p>
      </div>
      <div class="fw-lighter">
        <p>Информация о сотрудничестве находится в шапке</p>
      </div>
      <?php  
        if (\App\Helpers\Auth::hasAnyRole(['admin', 'user'])): 
      ?>
      <div>
        <h4 class="fw-light">Для пользователей:</h4>
        <a href="/a4min/dashboard" class="btn btn-outline-warning">Управление</a>
      </div>
      <?php endif; ?>
      <div>
        <p>Некоторые ресурсы взяты: <a style="color: orange;" href="https://ru.freepik.com" target="_blank" rel="noopener noreferrer"><span>Freepik</span></a></p>
      </div>
    </div>
    <div class="col m-1 d-flex justify-content-center">
      <div>
        <div class="logo-mini">
          <h6 class="text-warning">Быстрая навигация:</h6>
        </div>
        <div>
          <ul class="faster-nav">
            <li><a href="">Ночные события</a></li>
            <li><a href="">Дневные события</a></li>
            <li><a href="">Специальные события</a></li>
          <?php  
            if (!\App\Helpers\Auth::hasAnyRole(['admin', 'user'])): 
          ?>
            <li><a href="/login">Вход</a></li>
            <li><a href="/register">Регистрация</a></li>
           <?php endif; ?>
          </ul>
        </div>
      </div>
    </div>
    <div class="col m-1 d-flex flex-row-reverse">
      <div>
        <div class="logo-mini">
          <h6 class="text-white">Больше - действий.</h6>
        </div>
        <div class="logo" style="height: 192px; width: 192px; background-color: orange;">
          <img src="/images/hastle.png">
        </div>
      </div>
    </div>
  </div>
 </div>
</footer>
