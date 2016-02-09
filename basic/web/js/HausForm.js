var HausForm = function () {
    var _ = this;
    _form = null;
    
    _selectedFirma      = null;
    _selectedProjekt    = null;
    _selectedHaus       = null;

    _.initPlusMinusIcons = function(container) {

        _cnt = _form;
        if (typeof container !== 'undefined') {
            _cnt = $(container);
        }

        _cnt.find('.add-button, .delete-button').click(function(e) {
            e.preventDefault();

            var elm         = $(this);
            var container   = elm.closest('.container');
            var containerId   = elm.closest('.container').attr('id');

            // POST Request
            $.post(elm.attr('href') , _form.serialize(), function(data) {

                container.html($(data).find('#' + containerId).html());

                // init plus minus icons
                _.initPlusMinusIcons(container);

//                container.find('#' + containerId).delegate('input[name*="betrag"]', 'change', function() {
//
//                    console.log('val: ' + this.value);
//                    //yii.validation.number(this.value, [{"message": "Betrag muss eine Zahl sein."}], {"message": "Betrag muss eine Zahl sein."});
//
//                    var pattern = /^\s*[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?\s*$/;
//                    var msg = '';
//                    if (this.value && !pattern.test(this.value)) {
//                        var msg = 'Betrag muss eine Zahl sein.';
//                        $(this).closest('.form-group').addClass('has-error');
//                        $(this).closest('.form-group').removeClass('has-success');
//                    } else {
//                        $(this).closest('.form-group').addClass('has-success');
//                        $(this).closest('.form-group').removeClass('has-error');
//                    }
//                    $(this).next('.help-block').html(msg);
//
//                });

//                _form.find('#' + panelId + ' .box-body').replaceWith(newContent);
                 container.find('.input-group.date').each(function(index, value) {

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
console.log(datecontrol_options);
                });

            });

            return false;
        });

    }

    _.init = function() {
        _form = $('.haus-form form');
        console.log('init');
        console.log(_form);
        if(!_form) return;
        
        _.initPlusMinusIcons();
    }
    
    _.init();
}