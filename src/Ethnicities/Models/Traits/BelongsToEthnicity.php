<?php

namespace Myrtle\Core\Ethnicities\Models\Traits;

use Myrtle\Ethnicities\Models\Ethnicity;

trait BelongsToEthnicity
{

	public function ethnicity()
	{
		return $this->belongsTo(Ethnicity::class);
	}
}