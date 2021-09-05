@if ($availability == 'ok_new')
    OK NEW
@elseif ($availability == 'ok_former')
    OK FORM
@elseif ($availability == 'terminate')
    TERMINATE
@else
    NOT OK
@endif
