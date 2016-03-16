var DatenblattForm = function () {
    var _ = this;
    _form = null;
    
    _selectedFirma      = null;
    _selectedProjekt    = null;
    _selectedHaus       = null;

    /**
     * Init betrag validation
     * @param newContent
     */
    _.initBetragValidation = function(newContent) {
        // betrag validierung
        newContent.delegate('input[name*="betrag"]', 'change', function() {

            //yii.validation.number(this.value, [{"message": "Betrag muss eine Zahl sein."}], {"message": "Betrag muss eine Zahl sein."});

            var pattern = /^\s*[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?\s*$/;
            var msg = '';
            if (this.value && !pattern.test(this.value)) {
                var msg = 'Betrag muss eine Zahl sein.';
                $(this).closest('.form-group').addClass('has-error');
                $(this).closest('.form-group').removeClass('has-success');
            } else {
                $(this).closest('.form-group').addClass('has-success');
                $(this).closest('.form-group').removeClass('has-error');
            }
            $(this).next('.help-block').html(msg);

        });
    }

    /**
     * Init datepickers
     * @param panelId
     */
    _.initDatepickers = function(panelId) {
        // init datepickers
        _form.find('#' + panelId + ' .box-body').find('.input-group.date').each(function(index, value) {

            var inputGroup = $(value);
            var datecontrol_options = {
                "idSave": "", //"sonderwunsch-0-angebot_datum"
                "url":"\/index.php?r=datecontrol%2Fparse%2Fconvert",
                "type":"date",
                "saveFormat":"Y-m-d",
                "dispFormat":"d.m.Y",
                "saveTimezone":"Europe\/Berlin",
                "dispTimezone":"Europe\/Berlin",
                "asyncRequest":true,
                "language":"de",
                "dateSettings":{"days":["Sonntag","Montag","Dienstag","Mittwoch","Donnerstag","Freitag","Samstag","Sonntag"],
                    "daysShort":["Son","Mon","Die","Mit","Don","Fre","Sam","Son"],
                    "months":["Januar","Februar","März","April","Mai","Juni","Juli","August","September","Oktober","November","Dezember"],
                    "monthsShort":["Jan","Feb","Mär","Apr","Mai","Jun","Jul","Aug","Sep","Okt","Nov","Dez"],
                    "meridiem":["Vorm.","Nachm."]}
            };
            var kvDatepicker_options = {"autoclose":true,"format":"dd.mm.yyyy","language":"de"};
            var dateId = inputGroup.next('input[type="hidden"]').attr('id');
            datecontrol_options.idSave = dateId;
            inputGroup.find('.krajee-datepicker').datecontrol(datecontrol_options);
            if (inputGroup.find('.krajee-datepicker').data('kvDatepicker')) {
                inputGroup.find('.krajee-datepicker').kvDatepicker('destroy');
            }
            inputGroup.kvDatepicker(kvDatepicker_options);

        });
    }

    /**
     * Init maskmoney
     * @param panelId
     */
    _.initMaskmoney = function(panelId) {

        _form.find('#' + panelId + ' .box-body').find('input[name*="id-disp"]').each(function(index, elm) {

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
    }

    /**
     * init plus/minus icons
     * @param container
     */
    _.initPlusMinusIcons = function(container) {

        _cnt = _form;
        if (typeof container !== 'undefined') {
            _cnt = $(container);
        }

        _cnt.find('.add-button, .delete-button').click(function(e) {
            e.preventDefault();

            var elm         = $(this);
            var panelId     = elm.closest('.panel-collapse').attr('id');

            // POST Request
            $.post(elm.attr('href') , _form.serialize(), function(data) {

                $('.skin-blue.sidebar-mini').html($(data).find('.skin-blue.sidebar-mini').html());
                var newContent = $(data).find('#' + panelId + ' .box-body');

                // init plus minus icons
                _.initPlusMinusIcons(newContent);

                //// init betrag validation
                //_.initBetragValidation(newContent);

                // set html
                _form.find('#' + panelId + ' .box-body').replaceWith(newContent);

                // init datepickers
                _.initDatepickers(panelId);

                // init maskmoney
                _.initMaskmoney(panelId);

            });

            return false;
        });

    }

    /**
     * init autocomplete kunden
     */
    _.initAutocompleteKunden = function() {

        $('[name="Kaeufer[debitor_nr]"]')
            .keydown(function(e){
                if(e.which == 13) {
                    e.preventDefault();
                    e.stopPropagation();
                }
            })
            .autocomplete({
                source: "index.php?r=datenblatt/autocompletekunden",
                minLength: 1,
                select: function (event, ui) {

                    if (ui.item && ui.item.id) {
                        // item selected and has an id

                        console.log(ui.item);

                        //'anrede' => $kunde->anrede,
                        //'titel' => $kunde->titel,
                        //'vorname' => $kunde->vorname,
                        //'nachname' => $kunde->nachname,
                        //'email' => $kunde->email,
                        //'strasse' => $kunde->strasse,
                        //'hausnr' => $kunde->hausnr,
                        //'plz' => $kunde->plz,
                        //'ort' => $kunde->ort,
                        //'festnetz' => $kunde->festnetz,
                        //'handy' => $kunde->handy,

                        $('[name="Kaeufer[anrede]"]').val(ui.item.anrede);
                        $('[name="Kaeufer[titel]"]').val(ui.item.titel);
                        $('[name="Kaeufer[vorname]"]').val(ui.item.vorname);
                        $('[name="Kaeufer[nachname]"]').val(ui.item.nachname);
                        $('[name="Kaeufer[email]"]').val(ui.item.email);
                        $('[name="Kaeufer[strasse]"]').val(ui.item.strasse);
                        $('[name="Kaeufer[hausnr]"]').val(ui.item.hausnr);
                        $('[name="Kaeufer[plz]"]').val(ui.item.plz);
                        $('[name="Kaeufer[ort]"]').val(ui.item.ort);
                        $('[name="Kaeufer[festnetz]"]').val(ui.item.festnetz);
                        $('[name="Kaeufer[handy]"]').val(ui.item.handy);

                    }
                }
            });
    }

    /**
     *
     */
    _.initFirmaProjektHausDropdown = function() {

        _form.find('[name="Datenblatt[firma_id]"]').on('focus', function () {
            _selectedFirma = this.value;
        }).change(function() {
            //if (_selectedFirma !== this.value) {
                _form.find('[name="Datenblatt[projekt_id]"]').val('');
                _form.find('[name="Datenblatt[haus_id]"]').val('');
                //_form.submit();
                _form.find('[type="submit"]').click();
            //}
        });

        _form.find('[name="Datenblatt[projekt_id]"]').on('focus', function () {
            _selectedProjekt = this.value;
        }).change(function() {
            //if (_selectedProjekt !== this.value) {
                _form.find('[name="Datenblatt[haus_id]"]').val('');
                _form.find('[type="submit"]').click();
            //}
        });

        _form.find('[name="Datenblatt[haus_id]"]').on('focus', function () {
            _selectedHaus = this.value;
        }).change(function() {
            //if (_selectedHaus !== this.value) {
                _form.find('[type="submit"]').click();
            //}
        });
    }
    
    _.init = function() {
        _form = $('#datenblatt-form');
        
        if(!_form) return;
        
        _.initFirmaProjektHausDropdown();
        _.initAutocompleteKunden();

        _.initPlusMinusIcons();
    }
    
    _.init();
}