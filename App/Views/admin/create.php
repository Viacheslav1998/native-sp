<div class="custom-silver my-4 p-4">
  <p class="fs-2">Добавить событие</p>
  <div class="row">
    <form>
      <div class="col">
        <div class="mb-3">
          <label for="name" name="name" class="form-label text-secondary">Название события</label>
          <input class="form-control form-control-lg cs-grey" type="text" placeholder="напиши название события" aria-label=".form-control-lg" required>
          <div class="invalid-feedback">Не заполнен!</div>
        </div>
        <div class="mb-3">
          <label for="desk_mini" name="desk_mini" class="form-label text-secondary">Короткое описание</label>
          <input class="form-control form-control-lg cs-grey" type="text" placeholder="короткое описание" aria-label=".form-control-lg">
        </div>
        <div>
          <label for="event_type" class="form-label text-secondary">Выбери Событие</label>
          <select name="event_type" class="form-select form-select-lg mb-3 cs-grey" aria-label=".form-select-lg">
            <option selected>Выбор типа события:</option>
            <option value="1">Дневное</option>
            <option value="2">Ночное</option>
            <option value="3">...</option>
          </select>
        </div>
        <div>
          <label for="regional" class="form-label text-secondary">Выбери Регион</label>
          <select name="regional" class="form-select form-select-lg mb-3 cs-grey" aria-label=".form-select-lg">
            <option selected>Выбор Региона</option>
            <option value="1">Караганда</option>
            <option value="2">Астана</option>
            <option value="3">Алматы</option>
          </select>
        </div>
        <div>
        <label for="fullDesk" class="form-label text-secondary">Полное описание</label>
        <br>
        <div class="form-floating">
          <textarea rows="8" style="height: 100%;" name="fullDesk" class="form-control cs-grey" placeholder="Полное описание" id="fullDesk"></textarea>
          <label for="fullDesk">Полное описание твоего события...</label>
        </div>
        <br>
        </div>
        <div>
          <label for="file" class="form-label text-secondary">Выбери изображение</label>
          <input name="file" class="form-control form-control-lg" id="file" type="file">
        </div>
      </div>
      <br>
      <div style="text-align: right;">
        <button type="submit" class="btn btn-outline-success btn-lg">Создать</button>
      </div>
    </form>
  </div>
</div>