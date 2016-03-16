var HausForm = function () {
    var _ = this;
    _form = null;

    _selectedFirma = null;
    _selectedProjekt = null;
    _selectedHaus = null;

    _.initFirmaDropdown = function () {

        _form.find('[name="Haus[firma_id]"]').change(function () {
            //if (_selectedFirma !== this.value) {
            //_form.find('[name="Haus[projekt_id]"]').val('');
            //_form.find('[name="chooseFirma"]').click();

            var url = '?r=haus%2Fprojekte&firmaId=' + $(this).val();
            var projectSelect = _form.find('[name="Haus[projekt_id]"]');
            $.ajax({
                url: url,
                success: function (options) {
                    projectSelect.empty();
                    $.each(options, function (index, option) {
                        $option = $("<option></option>")
                            .attr("value", option.value)
                            .text(option.text);
                        projectSelect.append($option);
                    });
                }
            });

            //}
        });
        _form.find('[name="Haus[projekt_id]"]').change(function () {
            _form.find('[name="chooseFirma"]').click();

        });
    }

    /**
     * init datepickers
     * @param container
     */
    _.initDatepickers = function(container) {
        // init datepickers
        container.find('.input-group.date').each(function (index, value) {

            var inputGroup = $(value);
            var datecontrol_options = {
                "idSave": "", //"sonderwunsch-0-angebot_datum"
                "url": "\/index.php?r=datecontrol%2Fparse%2Fconvert",
                "type": "date",
                "saveFormat": "Y-m-d",
                "dispFormat": "d.m.Y",
                "saveTimezone": "Europe\/Berlin",
                "dispTimezone": "Europe\/Berlin",
                "asyncRequest": true,
                "language": "de",
                "dateSettings": {
                    "days": ["Sonntag", "Montag", "Dienstag", "Mittwoch", "Donnerstag", "Freitag", "Samstag", "Sonntag"],
                    "daysShort": ["Son", "Mon", "Die", "Mit", "Don", "Fre", "Sam", "Son"],
                    "months": ["Januar", "Februar", "März", "April", "Mai", "Juni", "Juli", "August", "September", "Oktober", "November", "Dezember"],
                    "monthsShort": ["Jan", "Feb", "Mär", "Apr", "Mai", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Dez"],
                    "meridiem": ["Vorm.", "Nachm."]
                }
            };
            var kvDatepicker_options = {"autoclose": true, "format": "dd.mm.yyyy", "language": "de"};
            var dateId = inputGroup.next('input[type="hidden"]').attr('id');
            datecontrol_options.idSave = dateId;
            inputGroup.find('.krajee-datepicker').datecontrol(datecontrol_options);
            if (inputGroup.find('.krajee-datepicker').data('kvDatepicker')) {
                inputGroup.find('.krajee-datepicker').kvDatepicker('destroy');
            }
            inputGroup.kvDatepicker(kvDatepicker_options);
        });
    }

    _.initPlusMinusIcons = function (container) {

        _cnt = _form;
        if (typeof container !== 'undefined') {
            _cnt = $(container);
        }

        _cnt.find('.add-button, .delete-button').click(function (e) {
            e.preventDefault();

            var elm = $(this);
            var container = elm.closest('.container');
            var containerId = elm.closest('.container').attr('id');

            // POST Request
            $.post(elm.attr('href'), _form.serialize(), function (data) {

                // set html
                container.html($(data).find('#' + containerId).html());

                // init plus minus icons
                _.initPlusMinusIcons(container);

                _.initDatepickers(container);

                // init money widget
                container.find('input[name*="kaufpreis-id-disp"]').each(function(i, elm) {

                    var inputDisplay = $(elm);
                    var input = inputDisplay.next();
                    var maskMoneyConfig = {"decimal":",","thousands":"."};

                    inputDisplay.maskMoney(maskMoneyConfig);
                    var val = parseFloat(input.val());
                    inputDisplay.maskMoney('mask', val);
                    inputDisplay.on('change', function () {
                        var numDecimal = inputDisplay.maskMoney('unmasked')[0];
                        input.val(numDecimal);
                        input.trigger('change');
                    });
                });

            });

            return false;
        });

    }

    _.init = function () {
        _form = $('.haus-form form');

        if (!_form) return;

        _.initPlusMinusIcons();
        _.initFirmaDropdown();
    }

    _.init();
}