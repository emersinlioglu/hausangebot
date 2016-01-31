var DatenblattForm = function () {
    var _ = this;
    _form = null;
    
    _selectedFirma      = null;
    _selectedProjekt    = null;
    _selectedHaus       = null;

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
    }
    
    _.init();
}