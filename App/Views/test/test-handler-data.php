<div class="custom-silver my-4 p-4">
  <h1 class="fs-2 text-danger"><?php echo $title; ?></h1>
  <div class="row">
    <form id="testForm">
      <div class="col">
        <div class="mb-3">
          <input class="form-control form-control-lg cs-grey" name="id" type="hidden" required>
        </div>
        <div class="mb-3">
          <label for="name" name="name" class="form-label text-secondary">Название события</label>
          <input class="form-control form-control-lg cs-grey" type="text" placeholder="напиши название события" aria-label=".form-control-lg" required>
        </div>
        <div class="mb-3">
          <label for="mini_desk" name="mini_desk" class="form-label text-secondary">Короткое описание</label>
          <input class="form-control form-control-lg cs-grey" type="text" placeholder="короткое описание" aria-label=".form-control-lg" required>
        </div>
        <div>
          <label for="event_type" class="form-label text-secondary">Выбери Событие</label>
          <select name="event_type" class="form-select form-select-lg mb-3 cs-grey" aria-label=".form-select-lg" required>
            <option value="" selected disabled>Выбор типа события:</option>
            <option value="Дневное">Дневное</option>
            <option value="Ночное">Ночное</option>
            <option value="Городское">Городское</option>
          </select>
        </div>
        <div>
          <label for="regional" class="form-label text-secondary">Выбери Регион</label>
          <select name="regional" class="form-select form-select-lg mb-3 cs-grey" aria-label=".form-select-lg" required>
            <option value="" selected disabled>Выбор Региона</option>
            <option value="Караганда">Караганда</option>
            <option value="Астана">Астана</option>
            <option value="Алматы">Алматы</option>
          </select>
        </div>
        <div>
        <label for="full_desk" class="form-label text-secondary">Полное описание</label>
        <br>
        <div class="form-floating">
          <textarea rows="8" style="height: 100%;" name="full_desk" class="form-control cs-grey" placeholder="Полное описание" id="full_desk" required></textarea>
          <label for="full_desk">Полное описание твоего события...</label>
        </div>
        <br>
        </div>
        <div>
          <label for="file" class="form-label text-secondary">Выбери изображение(расширения картинок - .jpg, .jpeg, .png, .gif)</label>
          <input name="imageInput" id="imageInput" class="form-control form-control-lg" id="file" type="file" accept=".jpg, .jpeg, .png, .gif">
        </div>
      </div>
      <br>
      <div style="text-align: right;">
        <button type="submit" class="btn btn-outline-success btn-lg">Создать</button>
      </div><br>
    </form>

      <div class="col">
        <h2 class="text-success">
          форма отправки синхронных данных - не из инпутов
        </h2>
      </div>

    <!-- test form file -->
    <form id="formFile" style="background-color: black; margin-bottom: 5px; padding: 20px; color: white;" >
      <label for="test-file" style="font-size: 18px; font-weight: bold; color: orange;">текст получение данных картинки - путь картинки</label>
      <input type="file" name="file" id="file">
      <div style="text-align: right;">
        <button type="submit" class="btn btn-outline-danger btn-lg">Проверить получения изображение</button>
      </div>
      <br>
    </form>

    <!-- test form check static -->
    <form id="checkStatic" style="background-color: black; color: white; padding: 20px;">
      <label style="font-size: 18px; font-weight: bold;" >Данная форма пуста - она используется для проверки отправки или получения тестовых данных</label>
      <div style="text-align: right;">
        <button type="submit" class="btn btn-outline-success btn-lg">Получить статические данные</button>
      </div>
    </form>

  </div>

  <hr>

  <div class="row">
    <h2 class="text-danger">Форма отправки тестовых данных</h2>
    <form id="anotherForm">
      <div class="col">
        <div class="mb-3">
          <label for="name" class="form-label text-secondary">Название</label>
          <input class="form-control form-control-lg cs-grey" name="name" type="text" placeholder="название" aria-label=".form-control-lg" required>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label text-secondary">почта</label>
          <input class="form-control form-control-lg cs-grey" name="email" type="email" placeholder="почта" aria-label=".form-control-lg" required>
        </div>
        <div class="mb-3">
          <label for="title" class="form-label text-secondary">заголовок</label>
          <input class="form-control form-control-lg cs-grey" name="title" type="text" placeholder="заголовок" aria-label=".form-control-lg" required>
        </div>
        <div class="mb-3">
          <input class="form-control form-control-lg cs-grey" name="date_js" value="no-time" type="hidden" aria-label=".form-control-lg" required>
        </div>
        <label for="description" class="form-label text-secondary">Полное описание</label>
        <br>
        <div class="form-floating">
          <textarea rows="8" style="height: 100%;" name="description" class="form-control cs-grey" placeholder="Полное описание" id="full_desk" required></textarea>
          <label for="description">Полное описание...</label>
        </div>
        <div class="mb-3">
          <label for="assessment" class="form-label text-secondary">оценка</label>
          <select name="assessment" class="form-select form-select-lg mb-3 cs-grey" aria-label=".form-select-lg" required>
            <option value="" selected disabled>Выбор оценки:</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select>
        </div>
        <div style="text-align: right;">
          <button type="submit" class="btn btn-outline-success btn-lg">Отправка данных на сервер (сохранения)</button>
        </div>
      </div>
      
    </form>
  </div>
</div>