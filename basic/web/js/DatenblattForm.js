var DatenblattForm = function () {
    var _ = this;
    _form = null;
    
    _selectedFirma      = null;
    _selectedProjekt    = null;
    _selectedHaus       = null;


    _.initPlusMinusIcons = function(container) {

        _cnt = _form;
        if (typeof container !== 'undefined') {
            _cnt = $(container);
            //console.log('should not');
        }

        _cnt.find('.add-button, .delete-button').click(function(e) {
            e.preventDefault();

            var elm         = $(this);
            var panelId     = elm.closest('.panel-collapse').attr('id');
            //var url         = _form.attr('action');
            var url         = elm.attr('href');

            //$.post(url, function(data) {
            //
            //    console.log($(data).find('#' + panelId + ' .box-body'));
            //    var newContent = $(data).find('#' + panelId + ' .box-body');
            //    _.initPlusMinusIcons(newContent);
            //    _form.find('#' + panelId + ' .box-body').replaceWith(newContent);
            //});

            $.ajax({
                type: "POST",
                url: url,
                data: _form.serialize(),
                success: function() {

                    $.ajax({
                        type: "GET",
                        url: _form.attr('action'),
                        success: function(data) {
                            console.log(data);
console.log($(data).find('.skin-blue.sidebar-mini').html());
                            $('.skin-blue.sidebar-mini').html($(data).find('.skin-blue.sidebar-mini').html());
                            ////console.log($(data).find('#' + panelId + ' .box-body'));
                            //var newContent = $(data).find('#' + panelId + ' .box-body');
                            //_.initPlusMinusIcons(newContent);
                            //
                            //
                            //
                            //
                            //
                            //_form.find('#' + panelId + ' .box-body').replaceWith(newContent);
                        }
                    });

                },
                //dataType: 'html'
            });

            return false;
        });

    }

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