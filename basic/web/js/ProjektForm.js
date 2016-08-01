var ProjektForm = function () {
    var _ = this;
    _form = null;

   _.initAddUserAssignment = function() {

        var projektUsers = $( "#projekt-users" );
        var url = projektUsers.data('search-url');
        var addUserAssignmentUrl = projektUsers.data('add-user-assignment');

        projektUsers.autocomplete({
            source: url,
            minLength: 2,
            select: function( event, ui ) {

                if (ui.item) {
                    var data = {
                        'userId': ui.item.id
                    };
                    $.post(addUserAssignmentUrl, data, function() {
                        location.reload();
                    });
                }

                //console.log( ui.item ?
                //"Selected: " + ui.item.value + " aka " + ui.item.id :
                //"Nothing selected, input was " + this.value );
            }
        });
    }

    _.initRemoveUserAssignment = function() {

        $('.assigned-users .glyphicon-trash').click(function() {
            
            var removeUserAssignmentUrl = $(this).data('url');
            $.get(removeUserAssignmentUrl, function() {
                location.reload();
            });
        });
    }

    _.init = function () {
        var cnt = $('.projekt-form');
        _form = cnt.find('form');

        if (!_form) return;

        _.initAddUserAssignment();
        _.initRemoveUserAssignment();
    }

    _.init();
}