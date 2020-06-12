<div class="popup-add-fade">
    <div class="popup">
        <div class="popup-form">
            <form id="add-edit-form" method="post">
                <label for="popup-form__input-name">Наименование </label><input type="text" name="inputName" class="popup-form__input-name">
                <label for="popup-form__input-number">Телефон </label><input type="text" name="inputPhone" class="popup-form__input-number">
                <div class="popup-form__buttons-block">
                    <button type="submit" class="popup-form__add-button button">Записать</button>
                    <button class="popup-form__cancel-button button popup-close">Отмена</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="popup-edit-fade">
    <div class="popup">
        <div class="popup-form">
            <form id="edit-form" method="post">
                <input type="hidden" name="id" class="edit-id">
                <label for="popup-form__input-name">Наименование </label><input type="text" name="inputName" class="popup-form__input-name">
                <label for="popup-form__input-number">Телефон </label><input type="text" name="inputPhone" class="popup-form__input-number">
                <div class="popup-form__buttons-block">
                    <button type="submit" class="popup-form__add-button button">Записать</button>
                    <button class="popup-form__cancel-button button popup-close">Отмена</button>
                </div>
            </form>
        </div>
    </div>
</div>