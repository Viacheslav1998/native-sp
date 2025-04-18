<div class="custom-silver my-4 p-4">
  <p class="fs-2">Страница тестов</p>
  <div class="row">
    <form id="formEvent">
      <div class="col">
      <div class="mb-3">
          <input class="form-control form-control-lg cs-grey" name="id" type="hidden" required>
        </div>
        <div class="mb-3">
          <label for="name" name="name" class="form-label text-secondary">Название события</label>
          <input class="form-control form-control-lg cs-grey " type="text" placeholder="напиши название события" aria-label=".form-control-lg" required>
        </div>
        <div class="mb-3">
          <label for="desk_mini" name="desk_mini" class="form-label text-secondary">Короткое описание</label>
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
        <label for="fullDesk" class="form-label text-secondary">Полное описание</label>
        <br>
        <div class="form-floating">
          <textarea rows="8" style="height: 100%;" name="fullDesk" class="form-control cs-grey" placeholder="Полное описание" id="fullDesk" required></textarea>
          <label for="fullDesk">Полное описание твоего события...</label>
        </div>
        <br>
        </div>
        <div>
          <label for="file" class="form-label text-secondary">Выбери изображение(расширения картинок - .jpg, .jpeg, .png, .gif)</label>
          <input name="file" class="form-control form-control-lg" id="file" type="file" accept=".jpg, .jpeg, .png, .gif">
        </div>
      </div>
      <br>
      <div style="text-align: right;">
        <button type="submit" class="btn btn-outline-success btn-lg">Создать</button>
      </div>
    </form>
  </div>
</div>