<?php

Route::resource('ethnicities', \Myrtle\Core\Ethnicities\Http\Controllers\Administrator\EthnicityController::class, ['except' => ['show']]);