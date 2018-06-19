<?php

Route::get('leaves',[
    'uses' => 'api\apiLeaves@getAll'
]);